# Spotify Charts API

This is a PHP wrapper for spotifycharts.com

## Requirements
* PHP ^7.4|^8.0

## Installation
Install it using [Composer](https://getcomposer.org/):

```sh
composer require pouler/spotify-charts-api
```

## Spotify login
You can obtain an access token by using the SpotifyLogin class, this dependency can be installed by using:

```sh
composer require pouler/spotify-login
```

For more information about this project see: https://github.com/PouleR/spotify-login

## Example usage

```php
<?php declare(strict_types=1);

require 'vendor/autoload.php';

$httpClient = new \Symfony\Component\HttpClient\CurlHttpClient();
$apiClient = new \PouleR\SpotifyChartsAPI\SpotifyChartsAPIClient($httpClient);
$spotifyApi = new \PouleR\SpotifyChartsAPI\SpotifyChartsAPI($apiClient);
$spotifyApi->setAccessToken('access.token');

$charts = $spotifyApi->getRegionalTopSongs('nl', 'weekly');

echo $result->getDisplayChart()->getChartMetadata()->getReadableTitle() . PHP_EOL;

foreach ($charts->getEntries() as $entry) {
    echo $entry->getChartEntryData()->getCurrentRank() . ' --> ' . $entry->getTrackMetadata()->getTrackName() . PHP_EOL;
}
```