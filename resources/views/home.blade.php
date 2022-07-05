@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-4">
        @auth
            <a href="{{ route("streams.create") }}" class="btn btn-success btn-sm float-right">Add</a>
        @endauth
        <h2>Streams</h2>
    </div>
    <div class="row">
        @forelse($items as $item)
            <div class="col-2 mb-2">
                <div class="card">
{{--                    <img class="card-img-top" src="..." alt="Card image cap">--}}
                    <div class="card-body">
                        <a href="{{ route("streams.show", ['stream' => $item->streamId]) }}" class="card-title">{{ $item->name ? : 'no name'}}</a>
                        @if($item->description)
                            <p class="card-text">{{ $item->description }}</p>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col">
                <h2>No results</h2>
            </div>
        @endforelse
    </div>
</div>
@endsection
