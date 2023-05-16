<?php

namespace App\Helpers;

use Google_Client;
use Google_Service_YouTube;

class YouTubeHelper
{
    public static function getVideoThumbnail($videoUrl)
    {
        $videoId = self::getVideoIdFromUrl($videoUrl);
        if ($videoId) {
            $client = new Google_Client();
            $client->setDeveloperKey(config('services.youtube.api_key'));
            $youtube = new Google_Service_YouTube($client);

            $videos = $youtube->videos->listVideos('snippet', ['id' => $videoId]);
            if (count($videos) > 0) {
                $thumbnailUrl = $videos[0]['snippet']['thumbnails']['default']['url'];
                return $thumbnailUrl;
            }
        }

        return null;
    }

    private static function getVideoIdFromUrl($url)
    {
        $pattern = '/(?:https?:\/\/(?:www\.)?youtube\.com\/watch\?v=|https?:\/\/youtu.be\/)([a-zA-Z0-9_-]{11})/';
        preg_match($pattern, $url, $matches);
        if (isset($matches[1])) {
            return $matches[1];
        }

        return null;
    }
}
