<?php
namespace App\UseCases;

use App\Entity\Stream;
use Illuminate\Http\Response;

class StreamService
{
    public function store($request)
    {
        $guzzle = new \GuzzleHttp\Client();
        $params = [
            'streamId' => time(),
            'name' => $request->name,
            'description' => $request->description,
        ];

        $response = $guzzle->post(config("system.server") . '/LiveApp/rest/v2/broadcasts/create', [
            \GuzzleHttp\RequestOptions::JSON => $params
        ]);

        if ($response->getStatusCode() == Response::HTTP_OK) {
            $data = json_decode($response->getBody()->getContents());
            Stream::createObj($request, $data->streamId, auth()->user()->id);
        }
    }
}
