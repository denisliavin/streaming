@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.reviews.index') }}">Отзывы</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Создание отзыва</li>
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
                        <form action="{{ route('admin.reviews.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="order_id">Номер заказа</label>
                                        <input-order-id value="{{ old('order_id') }}"></input-order-id>
                                        @error('order_id')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="order_id">Рейтинг</label>
                                        <input-number
                                            name="rating"
                                            max="5"
                                            value="{{ old('rating') }}"
                                        ></input-number>
                                        @error('rating')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input name="email" value="{{ old('email') }}" type="email" class="form-control" id="email">
                                        @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="text">Текст</label>
                                        <textarea name="text" class="form-control" id="text">{{ old('text') }}</textarea>
                                        @error('text')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="text">Лоцация</label>
                                        <select name="location" class="form-control" id="status">
                                            <option value="{{ $review_location_review }}" @if(old('location') == $review_location_review) selected @endif>/reviews</option>
                                            <option value="{{ $review_location_rastorzhenie_braka }}" @if(old('location') == $review_location_rastorzhenie_braka) selected @endif>/rastorzhenie-braka</option>
                                        </select>
                                        @error('location')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="order_id">Sort</label>
                                        <input name="sort" value="{{ old('sort') }}" type="number" class="form-control" id="sort">
                                        @error('sort')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="order_id">Дата</label>
                                        <input name="date" value="{{ old('date') }}" type="date" class="form-control" id="date">
                                        @error('date')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="text">Статус</label>
                                        <select name="status" class="form-control" id="status">
                                            <option value="" @if(!old('status')) selected @endif>Off</option>
                                            <option value="1" @if(old('status')) selected @endif>On</option>
                                        </select>
                                        @error('status')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="is_public">Разрешить публикацию отзыва</label>
                                        <select name="is_public" class="form-control" id="is_public">
                                            <option value="" @if(!old('is_public')) selected @endif>Нет</option>
                                            <option value="1" @if(old('is_public')) selected @endif>Да</option>
                                        </select>
                                        @error('status')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Name</label>
                                        <input name="name" value="{{ old('name') }}" type="text" class="form-control" id="name">
                                        @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="text_after_name">Text after name</label>
                                        <input name="text_after_name" value="{{ old('text_after_name') }}" type="text" class="form-control" id="text_after_name">
                                        @error('text_after_name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="file">Document</label>
                                        <input type="file" class="form-control-file" id="file" name="file">
                                        @error('file')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="document_name">Document name</label>
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
@endsection
