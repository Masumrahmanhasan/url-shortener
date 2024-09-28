<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlShortnerRequest;
use App\Models\ShortUrl;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UrlShortenerController extends Controller
{
    public function index(): View
    {
        $urls = ShortUrl::query()->where('user_id', auth()->id())->paginate(10);
        return view('dashboard', compact('urls'));
    }

    public function shorten(UrlShortnerRequest $request): RedirectResponse
    {
        ShortUrl::query()->create($request->validated());
        return redirect()->back();
    }

    public function redirect(ShortUrl $shortUrl): RedirectResponse
    {
        $shortUrl->increment('click');
        return redirect()->away($shortUrl->url);
    }
}
