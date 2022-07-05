<?php

namespace App\Helpers;

use App\Entity\Stream;
use Illuminate\Http\Response;

class HomeHelper
{
    public function getIndexVars($request)
    {
        $page = $request->page ? : 0;
        $guzzle = new \GuzzleHttp\Client();
        $items = [];

        $response = $guzzle->get(config("system.server") . '/LiveApp/rest/v2/broadcasts/list/' . $page . '/50');

        if ($response->getStatusCode() == Response::HTTP_OK) {
            $items = json_decode($response->getBody()->getContents());
            $this->attachImage($items);
        }

        return [
            'items' => $items
        ];
    }

    public function attachImage(&$items)
    {
        $streams = Stream::query()->with('image')->get();

        foreach ($items as $item) {
            $stream = $streams->firstWhere('i_stream', $item->streamId);
            $item->image = null;

            if ($stream && $stream->image) {
                $item->image = $stream->getImagePath();
            }
        }
    }
}
