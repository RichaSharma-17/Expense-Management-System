<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\items;
use App\Models\Item;
use Auth;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('form-submit')->with('list', item::all());
    }

    public function store(Request $req)
    {
        $data = new Item;
        $data->item = $req->item;
        $data->save();
        return redirect('form-submit')->with('msg', 'Item Added Successfully');
    }
    public function destroy($id)
    {
        $del = item::find($id);
        $del->delete();
        return redirect('form-submit')->with('msg', 'Item Deleted Successfully');
    }
    public function update($id)
    {
        $data = item::find($id);
        return view('update', ['data' => $data]);
    }
    public function updating(Request $req)
    {
        $data = item::find($req->id);
        if ($data) {
            $data->item = $req->item;
            $data->save();
        } else {
            return redirect('form-submit')->with('msg', 'ID NOT FOUND');
        }
        return redirect('form-submit')->with('msg', 'Data Updated Successfully');
    }
}
