<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\expenses;
use App\Models\Home;
use App\Models\incomes;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $itotal = incomes::where('userid', '=', Auth::user()->id)->sum('amount');
        $etotal = expenses::where('userid', '=', Auth::user()->id)->sum('amount');
        $income_list = incomes::where('userid', '=', Auth::user()->id)->get();
        $expense_list = expenses::where('userid', '=', Auth::user()->id)->get();
        return view('home')->with('income_list', $income_list)->with('itotal', $itotal)->with('etotal', $etotal)->with('expense_list', $expense_list);
    }
    public function store(Request $request)
    {
        if ($request->mode == 'income') {
            $income = new incomes;
            $income->name = $request->name;
            $income->amount = $request->amount;
            $income->note = $request->note;
            $income->userid = Auth::user()->id;
            $income->date = $request->date;
            $income->save();
        } else {
            $expense = new expenses;
            $expense->name = $request->name;
            $expense->amount = $request->amount;
            $expense->note = $request->note;
            $expense->userid = Auth::user()->id;
            $expense->date = $request->date;
            $expense->save();
        }
        return redirect('home')->with('msg', 'Data added successfully');
    }
    public function destroy($id)
    {
        $del = incomes::find($id);
        $del->delete();
        return redirect('home');
    }
    public function destroy_expense($id)
    {
        $del = expenses::find($id);
        $del->delete();
        return redirect('home');
    }
    public function edit($id, $type)
    {
        if ($type == 2) {
            $data = incomes::find($id);
            return view('edit', ['data' => $data, 'type' => $type]);
        } else {
            $data = expenses::find($id);
            return view('edit', ['data' => $data, 'type' => $type]);
        }
    }
    public function update_expense(Request $req)
    {
        $data = expenses::find($req->id);
        if ($data) {
            $data->name = $req->name;
            $data->amount = $req->amount;
            $data->date = $req->date;
            $data->note = $req->note;
            $data->save();
        } else {
            return redirect('home')->with('msg', 'ID NOT FOUND');
        }
        return redirect('home')->with('msg', 'Data Updated Successfully');
    }
    public function update_income(Request $req)
    {
        $data = incomes::find($req->id);
        if ($data) {
            $data->name = $req->name;
            $data->amount = $req->amount;
            $data->date = $req->date;
            $data->note = $req->note;
            $data->save();
        } else {
            return redirect('home')->with('msg', 'ID NOT FOUND');
        }
        return redirect('home')->with('msg', 'Data Updated Successfully');
    }
}
