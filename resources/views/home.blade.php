@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('admin.users.index') }}" class="btn btn-success">{{ __('Go to users') }}</a>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-success">{{ __('Go to products') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
