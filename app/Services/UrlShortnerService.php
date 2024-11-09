<?php

namespace App\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;
use App\Models\ShortUrl;

class UrlShortnerService
{
    /**
     * The length of the generated short URL string.
     */
    private const SHORT_URL_LENGTH = 6;

    /**
     * Retrieve a paginated list of URLs for a specified user.
     *
     * @param int $userId The ID of the user for whom to retrieve URLs.
     * @param int $perPage The number of URLs to display per page.
     * @return LengthAwarePaginator A paginated collection of the user's URLs.
     */
    public function getUserUrls(int $userId, int $perPage = 10): LengthAwarePaginator
    {
        return ShortUrl::query()
            ->where('user_id', $userId)
            ->paginate($perPage);
    }

    /**
     * Generate a unique short URL for a given original URL.
     *
     * This method creates a random short URL and ensures its uniqueness by checking
     * existing records in the database. If a conflict is found, it retries with a new string.
     *
     * @param string $url The original URL to be shortened.
     * @return ShortUrl The newly created ShortUrl model instance containing the short URL.
     */
    public function generateShortUrl(string $url): ShortUrl
    {
        do {
            $shortUrl = Str::random(self::SHORT_URL_LENGTH);
        } while (ShortUrl::query()
            ->where('short_url', $shortUrl)
            ->exists()
        );

        return ShortUrl::query()->create([
            'url' => $url,
            'short_url' => $shortUrl,
            'user_id' => auth()->id(),
        ]);
    }

    /**
     * Increment the click count for the short URL and retrieve the original URL.
     *
     * This method updates the click count for the provided short URL record
     * and returns the associated original URL.
     *
     * @param ShortUrl $shortUrl The ShortUrl model instance to increment clicks for.
     * @return string The original URL associated with the short URL.
     */
    public function getOriginalUrlAndIncrementClick(ShortUrl $shortUrl): string
    {
        $shortUrl->increment('click');
        return $shortUrl->url;
    }
}
