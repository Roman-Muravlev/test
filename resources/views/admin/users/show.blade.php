@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <input class="form-control" id="name" name="name" value="{{ $item->name }}" disabled>
                </div>

                <div class="form-group">
                    <label for="email">{{ __('Email') }}</label>
                    <input class="form-control" id="email" name="email" value="{{ $item->email }}" disabled>
                </div>
            </div>
        </div>
    </div>
@endsection
