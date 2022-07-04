<?php

namespace App\Helpers;

use Illuminate\Http\Response;

class StreamHelper
{
    public function getIndexVars($request)
    {
        $page = $request->page ? : 0;
        $guzzle = new \GuzzleHttp\Client();
        $items = [];

        $response = $guzzle->get(config("system.server") . '/LiveApp/rest/v2/broadcasts/list/' . $page . '/50');

        if ($response->getStatusCode() == Response::HTTP_OK) {
            $items = json_decode($response->getBody()->getContents());
        }

        return [
            'items' => $items
        ];
    }
}
