<?php

namespace App\Api;

class WoofApi extends BaseApi
{
    public function __construct()
    {
        parent::__construct(env('WOOF_API_URL'));
    }

    public function getDogImage(): string
    {
        $endpoint = '/woof.json';
        $response = $this->call('GET', $endpoint);
        try {
            $contents = json_decode($response->getBody()->getContents());
            $url = $contents->url;
            if (!$this->isValidImage($url)) {
                return $this->getDogImage();
            }
            return $url;
        } catch (\Exception $e) {
            throw new \Exception('Woof API Error');
        }
    }

    public function isValidImage($url): bool
    {
        $validExts = ['jpg', 'jpeg', 'png', 'gif'];
        $ext = strtolower(pathinfo($url, PATHINFO_EXTENSION));
        return in_array($ext, $validExts);
    }
}
