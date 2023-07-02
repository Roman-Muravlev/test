@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary">{{ __('Create') }}</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('admin.users.index') }}" method="GET">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search" name="search">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Date from" name="date_from">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Date to" name="date_to">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead class="bg-dark">
                    <tr>
                        <th scope="col">{{ __('ID') }}</th>
                        <th scope="col">{{ __('Name') }}</th>
                        <th scope="col">{{ __('Email') }}</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <a href="{{ route('admin.users.show', $item->id) }}" class="btn btn-success">{{ __('Show') }}</a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $item->id) }}" class="btn btn-warning">{{ __('Edit') }}</a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.users.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $data->links('pagination::bootstrap-4') }}
    </div>

@endsection
