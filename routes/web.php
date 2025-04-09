<?php 

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use OhMyBrew\BasicShopifyAPI;

Route::get('/', function () {
    return 'Welcome to your Shopify App!';
});

Route::get('/auth', function (Request $request) {
    $shop = 'tasohi-new.myshopify.com';
    $apiKey = env('SHOPIFY_API_KEY');
    $scopes = env('SHOPIFY_SCOPES');
    $redirectUri = urlencode(env('SHOPIFY_REDIRECT_URI'));

    $installUrl = "https://{$shop}/admin/oauth/authorize?client_id={$apiKey}&scope={$scopes}&redirect_uri={$redirectUri}";

    return redirect($installUrl);
});

Route::get('/auth/callback', function (Request $request) {
    return 'OAuth callback received! You can now use the API.';
});
