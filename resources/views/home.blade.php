@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h2>Total Income : {{ $itotal }}</h2>
            </div>
            <div class="col-sm-6">
                <h2>Total Expense : {{ $etotal }}</h2>
            </div>
        </div>
        <hr>
        @if ($msg = Session::get('msg'))
            <div class="alert alert-success">
                <p>{{ $msg }}</p>
            </div>
        @endif
        <form class="mt-5" action="{{ url('home') }}" method="POST">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2" for="name">Name</label>
                <input type="text" class="form-control col-sm-4" id="name" name="name" placeholder="Add Item" required>
            </div>
            <div class="row">
                <div class="form-check col-sm-2">
                    <input class="form-check-input" type="radio" name="mode" id="income" value="income" required>
                    <label class="form-check-label" for="income">
                        Income
                    </label>
                </div>
                <div class="form-check col-sm-10">
                    <input class="form-check-input" type="radio" name="mode" id="expense" value="expense" required> 
                    <label class="form-check-label" for="expense">
                        Expense
                    </label>
                </div>
            </div>
            <div class="form-group mt-3 row">
                <label class="col-sm-2" for="amount">Amount</label>
                <input type="number" class="form-control col-sm-4" id="amount" name="amount" placeholder="Enter Amount" required>
            </div>
            <div class="form-group mt-3 row">
                <label class="col-sm-2" for="date">Date</label>
                <input type="date" class="form-control col-sm-4" name="date" id="date" required>
            </div>
            <div class="form-group mt-3 row">
                <label class="col-sm-2" for="note">Note</label>
                <input type="text" class="form-control col-sm-4" name="note" id="note" required>
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
    </div>
    </form>
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-6">
                <h2>Income list</h2>
                <table class="table table-bordered table-striped ">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Date</th>
                            <th scope="col">Note</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($income_list as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->amount }}</td>
                                <td>{{ $item->date }}</td>
                                <td>{{ $item->note }}</td>
                                <td>
                                    <a href="{{ url('edit/' . $item->id . '/2') }}" class="btn btn-success">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ url('delete-income', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-sm-6">
                <h2>Expense list</h2>

                <table class="table table-striped text-center table-bordered ">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Date</th>
                            <th scope="col">Note</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($expense_list as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->amount }}</td>
                                <td>{{ $item->date }}</td>
                                <td>{{ $item->note }}</td>
                                <td>
                                    <a href="{{ url('edit/' . $item->id . '/1') }}" class="btn btn-success">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ url('delete-expense', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
