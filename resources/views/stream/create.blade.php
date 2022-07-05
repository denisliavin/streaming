@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create sream</li>
                        </ol>
                    </nav>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('streams.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input name="name" value="{{ old('name') }}" type="text" class="form-control" id="name">
                                            @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <input name="description" value="{{ old('description') }}" type="text" class="form-control" id="description">
                                            @error('description')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="document_name">Preview</label>
                                            <input name="document_name" value="{{ old('document_name') }}" type="text" class="form-control" id="document_name">
                                            @error('document_name')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-success float-right">Создать</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div>
@endsection
