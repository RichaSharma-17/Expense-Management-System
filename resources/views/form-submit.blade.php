
@extends('layouts.app')
@section('content')
@if ($msg = Session::get('msg'))
        <div class="alert alert-success">
            <p>{{ $msg }}</p>
        </div>
    @endif
    <form class="row align-items-center ml-5" action="{{ url('form-submit') }}" method="POST">
        @csrf
        <div class="col-auto">
            <input type="text" class="form-control" name="item" placeholder="Add Item">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">ADD</button>
        </div>
    </form>

    <table class="table table-light table-striped col-sm-6 m-5 border">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Item</th>
                <th scope="col">Edit Item</th>
                <th scope="col">Delete Item</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $data)
                <tr>
                    <th scope="row">{{ $data->id }}</th>
                    <td>{{ $data->item }}</td>
                    <td>
                      <a href="{{ url('update', $data->id) }}" class="btn btn-success">Edit</a>
                    </td>
                    <td>
                        <form action="{{ url('delete-item', $data->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to DELETE?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
