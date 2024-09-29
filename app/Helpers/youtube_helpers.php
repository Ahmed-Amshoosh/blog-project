<?php

if (!function_exists('getYoutubeEmbedUrl')) {
    function getYoutubeEmbedUrl($url)
    {
        $parsed_url = parse_url($url);
        parse_str($parsed_url['query'], $params);

        $video_id = $params['v'];
        return "https://www.youtube.com/embed/$video_id";
    }
}

if (!function_exists('getYoutubeId')) {
    function getYoutubeId($url)
    {
        $parsed_url = parse_url($url);
        parse_str($parsed_url['query'], $params);

        return $params['v'];
    }
}
