<?php

namespace App\Helpers;

use App\Entity\Stream;
use Illuminate\Http\Response;

class StreamHelper
{
    public function getCreateVars()
    {
        return [];
    }

    public function getShowVars($i_straem)
    {
        $guzzle = new \GuzzleHttp\Client();
        $stream = null;

        $response = $guzzle->get(config("system.server") . '/LiveApp/rest/v2/broadcasts/' . $i_straem);

        if ($response->getStatusCode() == Response::HTTP_OK) {
            $stream = json_decode($response->getBody()->getContents());
            $this->attachData($stream, $i_straem);
        }

        return [
            'stream' => $stream
        ];
    }



    public function attachData($stream, $i_straem)
    {
        $streamBd = Stream::where('i_stream', $i_straem)->with('image', 'user')->first();

        $stream->image = null;
        $stream->userName = null;

        if ($streamBd && $streamBd->image) {
            $stream->image = $streamBd->getImagePath();
        }

        if ($streamBd && $streamBd->user) {
            $stream->userName = $streamBd->user->name;
        }
    }
}
