@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('admin.products.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ $item->name }}">
                    </div>

                    <div class="form-group">
                        <label for="description">{{ __('Description') }}</label>
                        <textarea class="form-control" id="description" placeholder="Enter description" name="description">{{ $item->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="price">{{ __('Price') }}</label>
                        <input type="number" class="form-control" id="price" placeholder="Price" name="price" value="{{ $item->price }}">
                    </div>

                    <div class="form-group">
                        <label for="user">{{ __('User') }}</label>
                        <select class="form-control" id="user" name="user_id">
                            @foreach($users as $key => $user)
                                <option value="{{ $key }}" @if($key == $item->user_id) selected @endif>{{ $user }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
