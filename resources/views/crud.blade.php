@extends('layouts.app')
@section('content')
    @if ($msg = Session::get('msg'))
        <div class="alert alert-success">
            <p>{{ $msg }}</p>
        </div>
    @endif
    <div class="container"></div>
    <form action="{{ url('crud') }}" method="post">
        @csrf
        <div class="form-group col-sm-6">
            <label>Enter Product Name</label>
            <input type="text" name="product" class="form-control" placeholder="Food" required>
        </div>
        <div class="form-group col-sm-6">
            <label>Enter Amount</label>
            <input type="number" name="amount" class="form-control" placeholder="100" required>
        </div>
        <div class="form-group col-sm-6">
            <label>Select Mode</label>
            <select class="form-control" name="mode" required>
                <option selected disabled>Select item</option>
                @foreach ($income_list as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success ml-3">Submit</button>
    </form>

    <table class="table table-striped col-sm-8">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Product</th>
                <th scope="col">Amount</th>
                <th scope="col">Mode</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($crud_list as $item)

                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->product }}</td>
                    <td>{{ $item->amount }}</td>
                    <td>{{ $item->income_name }}</td>
                    <td><a href="update/{{ $item->id }}" class="btn btn-success">Edit</a></td>
                    <td>
                        <form action="{{ url('del', $item->id) }}"
                            onsubmit="return confirm('Are you sure you want to Delete?')" method="POST">
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
