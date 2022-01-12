# Spotify Charts API

This is a PHP wrapper for spotifycharts.com

## Requirements
* PHP ^7.4|^8.0

## Installation
Install it using [Composer](https://getcomposer.org/):

```sh
composer require pouler/spotify-charts-api
```


## Example usage
```php
<?php declare(strict_types=1);

require 'vendor/autoload.php';

$httpClient = new \Symfony\Component\HttpClient\CurlHttpClient();
$client = new \PouleR\SpotifyChartsAPI\SpotifyChartsAPIClient($httpClient);
$loginClient = new \PouleR\SpotifyLogin\SpotifyLoginClient($httpClient);
$spotifyLogin = new \PouleR\SpotifyLogin\SpotifyLogin($loginClient);
$spotifyApi = new \PouleR\SpotifyChartsAPI\SpotifyChartsAPI($client, $spotifyLogin);

$spotifyLogin->setClientId('clientId');
$spotifyLogin->setDeviceId('deviceId');

// Log in and get the access token
$token = $spotifyLogin->login('email@address.com','password');
$spotifyApi->setAccessToken($token->getAccessToken());

$charts = $spotifyApi->getRegionalTopSongs('nl', 'weekly');

echo $result->getDisplayChart()->getChartMetadata()->getReadableTitle() . PHP_EOL;

foreach ($charts->getEntries() as $entry) {
    echo $entry->getChartEntryData()->getCurrentRank() . ' --> ' . $entry->getTrackMetadata()->getTrackName() . PHP_EOL;
}
```