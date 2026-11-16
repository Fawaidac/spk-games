<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LandingController extends Controller
{
    /**
     * Menampilkan Landing Page GameMatch.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Semua genre untuk chip filter preferensi (Langkah 1)
        $genres = Genre::orderBy('name')->get();

        // ── Langkah 2: Pilih Game Favorit Sebagai Basis Referensi Vektor ──
        // Filter & pagination khusus untuk grid pemilihan game referensi
        $refSearch = $request->query('ref_search');
        $refGenre  = $request->query('ref_genre');

        $refQuery = Game::with('genres');

        if (!empty($refSearch)) {
            $refQuery->where(function ($q) use ($refSearch) {
                $q->where('title', 'like', "%{$refSearch}%")
                  ->orWhere('developers', 'like', "%{$refSearch}%");
            });
        }

        if (!empty($refGenre) && $refGenre !== 'all') {
            $refQuery->whereHas('genres', function ($q) use ($refGenre) {
                $q->where('genres.slug', $refGenre)
                  ->orWhere('genres.name', $refGenre);
            });
        }

        // 8 game per halaman, diurutkan berdasarkan popularitas
        $refGames = $refQuery->orderByDesc('total_reviews')
                             ->orderByDesc('rating')
                             ->paginate(8, ['*'], 'ref_page')
                             ->withQueryString()
                             ->fragment('preferensi-section');

        // Statistik dinamis untuk hero section
        $totalGames = Game::count();
        $totalDimensions = $this->getMatrixDimensions();

        return view('landing.index', compact(
            'genres',
            'refGames',
            'refSearch',
            'refGenre',
            'totalGames',
            'totalDimensions',
        ));
    }

    /**
     * Baca dimensi fitur vektor dari file cache matriks recsys jika ada.
     */
    protected function getMatrixDimensions(): int
    {
        $cachePath = storage_path('app/recsys_matrix.json');
        if (File::exists($cachePath)) {
            try {
                $data = json_decode(File::get($cachePath), true);
                return (int) ($data['metadata']['total_dimensions'] ?? 516);
            } catch (\Throwable) {
                // fallback
            }
        }
        return 516;
    }
}
