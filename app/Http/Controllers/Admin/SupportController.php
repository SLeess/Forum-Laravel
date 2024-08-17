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
}
