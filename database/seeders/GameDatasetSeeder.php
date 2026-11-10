<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;
use App\Models\Genre;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class GameDatasetSeeder extends Seeder
{
    public function run(): void
    {
        $filePath = storage_path('app/games_clean.csv');

        if (!file_exists($filePath)) {
            $this->command->error('File games_clean.csv tidak ditemukan di storage/app/');
            return;
        }

        $file = fopen($filePath, 'r');
        if ($file === false) {
            $this->command->error('Gagal membuka file games_clean.csv');
            return;
        }

        // 1. Tambahkan parameter delimiter (',') dan enclosure ('"') agar CSV terpecah dengan benar
        $header = fgetcsv($file, 0, ',', '"');
        if (!$header) {
            $this->command->error('Header CSV tidak terbaca');
            fclose($file);
            return;
        }

        // Hapus karakter BOM / spasi tersembunyi jika ada pada header
        $header = array_map(function($item) {
            return trim(preg_replace('/\x{FEFF}/u', '', $item));
        }, $header);

        $headerCount = count($header);

        DB::beginTransaction();
        try {
            while (($row = fgetcsv($file, 0, ',', '"')) !== false) {
                // Skip baris kosong
                if (empty($row) || $row === [null] || count($row) < 2) {
                    continue;
                }

                // Jika jumlah kolom tidak pas, lewatkan agar tidak error
                if (count($row) !== $headerCount) {
                    continue;
                }

                // Gabungkan header dengan isi data
                $data = array_combine($header, $row);

                // Parse Steam App ID jika ada
                $steamAppId = isset($data['steam_app_id']) && is_numeric($data['steam_app_id']) 
                    ? (int) $data['steam_app_id'] 
                    : null;

                // 2. Insert Game dengan pemetaan nama kolom dari CSV yang tepat
                $game = Game::create([
                    'steam_app_id' => $steamAppId,
                    'title'        => $data['title'] ?? 'Untitled',
                    'description'  => $data['description'] ?? '',
                    'rating'       => (float) ($data['rating'] ?? 0),
                    'total_reviews'=> isset($data['total_reviews']) ? (int) $data['total_reviews'] : 0,
                    'price'        => isset($data['price']) ? (float) $data['price'] : 0,
                    'release_date' => isset($data['release_date']) && !empty($data['release_date'])
                                        ? date('Y-m-d', strtotime($data['release_date']))
                                        : (isset($data['release_year']) && is_numeric($data['release_year']) ? $data['release_year'] . '-01-01' : null),
                    'developers'   => $data['developers'] ?? $data['developer'] ?? null,
                    'publishers'   => $data['publishers'] ?? $data['publisher'] ?? null,
                    'image_url'    => $data['image_url'] ?? null,
                    'platform'     => $data['platform'] ?? 'PC',
                ]);

                // 3. Attach Genres
                $genreString = $data['genres'] ?? $data['genre'] ?? '';
                if (!empty($genreString)) {
                    $genres = array_map('trim', explode(',', $genreString));
                    foreach ($genres as $genreName) {
                        if (empty($genreName)) continue;
                        $genre = Genre::firstOrCreate(
                            ['name' => $genreName],
                            ['slug' => Str::slug($genreName), 'is_main' => true]
                        );
                        $game->genres()->attach($genre->id);
                    }
                }

                // 4. Attach Tags
                $tagString = $data['tags'] ?? '';
                if (!empty($tagString)) {
                    $tags = array_map('trim', explode(',', $tagString));
                    foreach ($tags as $tagName) {
                        if (empty($tagName)) continue;
                        $tag = Tag::firstOrCreate(['name' => $tagName]);
                        $game->tags()->attach($tag->id);
                    }
                }
            }

            DB::commit();
            $this->command->info('Dataset game berhasil di-import tanpa NULL!');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->command->error('Gagal mengimpor dataset: ' . $e->getMessage());
        } finally {
            fclose($file);
        }
    }
}