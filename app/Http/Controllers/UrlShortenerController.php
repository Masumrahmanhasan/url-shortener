<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlShortnerRequest;
use App\Models\ShortUrl;
use App\Services\UrlShortnerService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UrlShortenerController extends Controller
{
    /**
     * The URL shortener service instance.
     *
     * @var UrlShortnerService
     */
    protected UrlShortnerService $urlShortnerService;

    /**
     * Create a new controller instance.
     *
     * @param UrlShortnerService $urlShortnerService The URL shortener service used to handle URL operations.
     */
    public function __construct(UrlShortnerService $urlShortnerService)
    {
        $this->urlShortnerService = $urlShortnerService;
    }

    /**
     * Display the user's shortened URLs.
     *
     * Retrieves a paginated list of URLs created by the authenticated user and displays them on the dashboard view.
     *
     * @return View The view displaying the list of user's URLs.
     */
    public function index(): View
    {
        $urls = $this->urlShortnerService->getUserUrls(auth()->id());
        return view('dashboard', compact('urls'));
    }

    /**
     * Shorten a given URL and store it in the database.
     *
     * This method accepts a validated URL request, generates a unique short URL using the service,
     * and then redirects the user back to the previous page.
     *
     * @param UrlShortnerRequest $request The validated request containing the original URL to be shortened.
     * @return RedirectResponse A redirect back to the previous page.
     */
    public function shorten(UrlShortnerRequest $request): RedirectResponse
    {
        $this->urlShortnerService->generateShortUrl($request->input('url'));
        return redirect()->back();
    }

    /**
     * Redirect to the original URL associated with a given short URL.
     *
     * This method increments the click count for the specified short URL and then redirects the user
     * to the original URL.
     *
     * @param ShortUrl $shortUrl The ShortUrl model instance containing the short URL.
     * @return RedirectResponse A redirect to the original URL.
     */
    public function redirect(ShortUrl $shortUrl): RedirectResponse
    {
        $originalUrl = $this->urlShortnerService->getOriginalUrlAndIncrementClick($shortUrl);
        return redirect()->away($originalUrl);
    }
}
