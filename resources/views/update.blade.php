
@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Update Items</h1>
        <form class="mt-5" action="{{ url('updating') }}" method="POST">
            @csrf
            <input type="text" hidden name="id" value="{{ $data->id }}">
            <div class="col-sm-4">
                <input type="text" class="form-control" name="item" value="{{ $data->item }}" placeholder="Add Item">
            </div>
            <button class="btn btn-primary m-3" type="submit">Update</button>
    </div>
    </form>
    </div>
@endsection
