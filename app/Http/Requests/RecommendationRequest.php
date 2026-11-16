<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecommendationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'game_ids'   => ['required', 'array', 'min:1', 'max:50'],
            'game_ids.*' => ['required', 'integer', 'exists:games,id'],
            'genres'     => ['nullable', 'array', 'max:30'],
            'genres.*'   => ['nullable', 'string', 'max:100'],
            'top_n'      => ['nullable', 'integer', 'in:5,10,20'],
        ];
    }

    /**
     * Custom error messages in Bahasa Indonesia.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'game_ids.required' => 'Minimal pilih 1 game favorit sebagai basis rekomendasi.',
            'game_ids.min'      => 'Minimal pilih 1 game favorit sebagai basis rekomendasi.',
            'game_ids.*.exists' => 'Game favorit yang dipilih tidak ditemukan di database.',
            'top_n.in'          => 'Jumlah rekomendasi harus 5, 10, atau 20.',
        ];
    }
}

