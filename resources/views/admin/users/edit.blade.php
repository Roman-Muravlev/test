@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('admin.users.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ $item->name }}">
                    </div>

                    <div class="form-group">
                        <label for="email">{{ __('Email') }}</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ $item->email }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                {{ __('Change password:') }}

                <form action="{{ route('admin.users.changePassword', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="oldPassword">{{ __('Old password') }}</label>
                        <input type="password" class="form-control" id="oldPassword" placeholder="Old password" name="old_password">
                    </div>

                    <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    </div>

                    <div class="form-group">
                        <label for="passwordConfirmation">{{ __('Password Confirmation') }}</label>
                        <input type="password" class="form-control" id="passwordConfirmation" placeholder="Password confirmation" name="password_confirmation">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
