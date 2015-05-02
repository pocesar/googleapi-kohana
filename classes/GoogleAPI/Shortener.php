<?php

class GoogleAPI_Shortener extends Google_Service_Urlshortener {

    public static function factory(GClient $client)
    {
        return new GShortener($client);
    }

    function shortenUrl($longUrl) {
        $url = new Google_Service_Urlshortener_Url();
        $url->longUrl = $longUrl;

        return $this->url->insert($url);
    }

}