<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use App\Models\incomes;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $income_list = incomes::get();
        $crud_list = crud::join('incomes', 'incomes.id', '=', 'cruds.mode')
            ->select('cruds.*', 'incomes.name as income_name')
            ->get();

        return view('crud')->with('income_list', $income_list)->with('crud_list', $crud_list);
    }

    public function store(Request $req)
    {
        $data = new Crud;
        $data->product = $req->product;
        $data->amount = $req->amount;
        $data->mode = $req->mode;
        $data->save();
        return redirect('crud')->with('msg', 'Product added successfully');
    }

    public function destroy($id)
    {
        $del = Crud::find($id);
        $del->delete();
        return redirect('crud')->with('msg', 'Item Deleted Successfully');
    }

    public function update($id)
    {
        $item = Crud::find($id);
        $income_list = incomes::get();
        return view('crud_updated', ['item' => $item])->with('income_list', $income_list);
    }
    public function crud_updated(request $req)
    {
        $item = Crud::find($req->id);
        if ($item) {
            $item->product = $req->product;
            $item->amount = $req->amount;
            $item->mode = $req->mode;
            $item->save();
        } else {
            return redirect('crud')->with('msg', 'Id Not Found');
        }
        return redirect('crud')->with('msg', 'Product Updated Successfully');
    }
}
