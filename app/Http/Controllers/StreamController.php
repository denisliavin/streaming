<?php

namespace App\Http\Controllers;

use App\Helpers\StreamHelper;
use App\Http\Requests\HomeIndexRequest;
use App\Http\Requests\StreamStoreRequest;
use App\UseCases\StreamService;
use Throwable;

class StreamController extends Controller
{
    public $helper;
    public $service;

    public function __construct(StreamHelper $helper, StreamService $service)
    {
        $this->helper = $helper;
        $this->service = $service;
    }

    public function create()
    {
        try {
            $vars = $this->helper->getCreateVars();
        } catch (Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return view('stream.create', $vars);
    }

    public function store(StreamStoreRequest $request)
    {
        try {
            $this->service->store($request);
        } catch (Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('home')->with('success', "Success created");
    }

    public function show($stream)
    {
        try {
            $vars = $this->helper->getShowVars($stream);
        } catch (Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return view('stream.show', $vars);
    }
}
