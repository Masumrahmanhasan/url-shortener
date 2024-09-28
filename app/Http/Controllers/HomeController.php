<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use function compact;

class HomeController extends Controller
{
    public function __invoke()
    {
        $urls = ShortUrl::query()->get();
        return view('welcome', compact('urls'));
    }
}
