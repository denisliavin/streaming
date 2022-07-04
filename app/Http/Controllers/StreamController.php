<?php

namespace App\Http\Controllers;

use App\Helpers\HomeHelper;
use App\Http\Requests\HomeIndexRequest;
use App\Http\Requests\StreamStoreRequest;
use Throwable;

class StreamController extends Controller
{
    public $helper;

    public function __construct(HomeHelper $helper)
    {
        $this->helper = $helper;
    }

    public function create(HomeIndexRequest $request)
    {
        try {
            $vars = $this->helper->getIndexVars($request);
        } catch (Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return view('home', $vars);
    }

    public function store(StreamStoreRequest $request)
    {
        try {
            $vars = $this->helper->getIndexVars($request);
        } catch (Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return view('home', $vars);
    }
}
