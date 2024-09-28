<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use function config;

class UrlShortnerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'url' => ['required', 'url'],
        ];
    }

    public function passedValidation(): void
    {
        $shortenedUrl = Str::random(8);

        $fullShortenedUrl = config('app.url') . '/' . $shortenedUrl;

        $this->merge([
            'user_id' => auth()->id(),
            'short_url' => $fullShortenedUrl,
        ]);
    }

    /**
     * Override validated method to include custom merged data.
     * @param  null  $key
     * @param  null  $default
     */
    public function validated($key = null, $default = null): array
    {
        return array_merge(parent::validated(), [
            'user_id' => $this->user_id,
            'short_url' => $this->short_url,
        ]);
    }
}
