<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Support;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support){
        $supports = Support::all();

        return view("admin.support.index", compact('supports'));
    }

    public function create(){

        return view("admin/support/create");
    }

    public function store(Request $request){
        $support = new Support();
        $support->subject = $request->subject;
        $support->status = $request->status;
        $support->body = $request->body;
        // dd($request->all());
        $support->save();

        return redirect('/')->with('msg', 'Novo suporte cadastrado!');
    }
}
