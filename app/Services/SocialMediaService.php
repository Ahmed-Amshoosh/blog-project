<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;


class SocialMediaService
{
    public function getYouTubeSubscribers($apiKey, $channelId)
    {
        $response = Http::get("https://www.googleapis.com/youtube/v3/channels", [
            'part' => 'statistics',
            'id' => $channelId,
            'key' => $apiKey,
        ]);

        return $response->json()['items'][0]['statistics']['subscriberCount'] ?? 0;
    }

    public function getFacebookFollowers($accessToken, $pageId)
    {
        $response = Http::get("https://graph.facebook.com/{$pageId}", [
            'fields' => 'followers_count',
            'access_token' => $accessToken,
        ]);

        return $response->json()['followers_count'] ?? 0;
    }

    public function getInstagramFollowers($accessToken, $userId)
    {
        $response = Http::get("https://graph.instagram.com/{$userId}", [
            'fields' => 'followers_count',
            'access_token' => $accessToken,
        ]);

        return $response->json()['followers_count'] ?? 0;
    }

    public function getTwitterFollowers($bearerToken, $username)
    {
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$bearerToken}"
        ])->get("https://api.twitter.com/2/users/by/username/{$username}");

        $userId = $response->json()['data']['id'] ?? null;

        if ($userId) {
            $response = Http::withHeaders([
                'Authorization' => "Bearer {$bearerToken}"
            ])->get("https://api.twitter.com/2/users/{$userId}", [
                'user.fields' => 'public_metrics'
            ]);

            return $response->json()['data']['public_metrics']['followers_count'] ?? 0;
        }

        return 0;
    }
}
