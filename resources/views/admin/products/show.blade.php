@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <input class="form-control" id="name" name="name" value="{{ $item->name }}" disabled />
                </div>

                <div class="form-group">
                    <label for="description">{{ __('Description') }}</label>
                    <textarea class="form-control" id="description" disabled>{{ $item->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="price">{{ __('Price') }}</label>
                    <input class="form-control" id="price" value="{{ $item->price }}" disabled />
                </div>

                <div class="form-group">
                    <label for="user">{{ __('User') }}</label>
                    <input class="form-control" id="user" value="{{ $item->user->name }}" disabled />
                </div>

            </div>
        </div>
    </div>
@endsection
