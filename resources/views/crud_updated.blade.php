@extends('layouts.app')
@section('content')
    <form action="{{ url('crud_update') }}" method="POST">
        @csrf
        <h1>Update Details</h1>
        <input type="text" hidden name="id" value="{{ $item->id }}">
        <div class="form-group col-sm-6">
            <label>Enter Product Name</label>
            <input type="text" name="product" class="form-control" value="{{ $item->product }}" required>
        </div>
        <div class="form-group col-sm-6">
            <label>Enter Amount</label>
            <input type="number" name="amount" class="form-control" value="{{ $item->amount }}" required>
        </div>
        <div class="form-group col-sm-6">
            <label>Select Mode</label>
            <select class="form-control" name="mode" required>
                @foreach ($income_list as $data)
                    @if ($data->id == $item->mode)
                        <option value="{{ $data->id }}" selected>{{ $data->name }}</option>
                    @else
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success ml-3">UPDATE</button>
    </form>
@endsection
