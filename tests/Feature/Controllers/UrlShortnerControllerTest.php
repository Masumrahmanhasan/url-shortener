<?php

use App\Models\ShortUrl;
use App\Models\User;
use App\Services\UrlShortnerService;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
});

it('displays paginated URLs for authenticated user', function () {
    ShortUrl::factory()->count(15)->for($this->user)->create();

    $response = $this->get(route('dashboard'));

    $response->assertStatus(200);
    $response->assertViewHas('urls');
});

it('shortens a URL and redirects back', function () {
    $url = 'https://example.com';

    $service = mock(UrlShortnerService::class);
    $this->app->instance(UrlShortnerService::class, $service);

    $service->shouldReceive('generateShortUrl')->once()->with($url);

    $response = $this->post(route('shorten'), ['url' => $url]);

    $response->assertRedirect();
});

it('redirects to the original URL and increments click count', function () {
    $user = User::factory()->create();

    // Create a ShortUrl for the user with an initial click count of 0
    $shortUrl = ShortUrl::factory()->create([
        'url' => 'https://example.com',
        'click' => 0,
        'user_id' => $user->id, // Ensure the user_id is set for model binding
    ]);


    // Ensure the initial click count is 0
    expect($shortUrl->click)->toBe(0);

    // Perform the redirection request, passing the short_url's raw value as a parameter
    $response = $this->get(route('redirect', ['short_url' => $shortUrl]));

    // Assert that the response is a redirect to the original URL
    $response->assertRedirect('https://example.com');

    // Assert that the click count is incremented by 1
    $shortUrl->refresh(); // Refresh the model to get the latest database value
    expect($shortUrl->click)->toBe(1);
});
