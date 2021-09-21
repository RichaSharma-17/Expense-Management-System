@extends('layouts.app')
<div class="container">
    <h1>Update Details</h1>
    <form class="mt-5" action="{{ url('edit-expense') }}" method="POST">
        @csrf
        <div class="form-group row">
            <label class="col-sm-2" for="name">Name</label>
            <input type="text" class="form-control col-sm-4" name="name" value="{{$data['name']}}">
        </div>

        <div class="form-group mt-3 row">
            <label class="col-sm-2" for="amount">Amount</label>
            <input type="number" class="form-control col-sm-4" name="amount" value="{{$data['amount']}}">
        </div>
        <div class="form-group mt-3 row">
            <label class="col-sm-2" for="date">Date</label>
            <input type="date" class="form-control col-sm-4" name="date" value="{{$data['date']}}">
        </div>
        <div class="form-group mt-3 row">
            <label class="col-sm-2" for="note">Note</label>
            <input type="text" class="form-control col-sm-4" name="note" value="{{$data['note']}}">
        </div>
        <button class="btn btn-primary" type="submit">Update</button>
</div>
</form>
</div>
