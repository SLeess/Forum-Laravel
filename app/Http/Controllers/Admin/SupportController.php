<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupportRequest;
use App\Models\Admin\Support;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class SupportController extends Controller
{
    public function index(Support $support){
        $supports = Support::all();

        return view("admin.support.index", compact('supports'));
    }

    public function show(string|int $id){
        //Support::find($id);
        //Support::where('id', $id)->first();
        //Support::where('id', '!=', $id)->first();
        $support = $this->EncontrarOuVoltar($id);

        return view('admin/support/show', compact('support'));
    }

    public function create(){

        return view("admin/support/create");
    }

    public function store(StoreUpdateSupportRequest $request, Support $support){
        // $data = $request->all();
        $data = $request->validated();
        $support = $support->create($data);

        // return redirect('/')->with('msg', 'Novo suporte cadastrado!');
        return redirect()->route('supports.index')->with('msg', 'Novo suporte cadastrado!');
    }

    public function edit(string|int $id, Support $support){
        $support = $support->where('id', $id)->first();
        if(!$support){
            return back();
        }

        return view('admin/support.edit', compact('support'));
    }

    public function update(StoreUpdateSupportRequest $request, string|int $id, Support $support){
        $support = $this->EncontrarOuVoltar($id);

        // Método pouco prático para models com muitos atributos
        // $support->subject = $request->subject;
        // $support->body = $request->body;
        // $support->save();

        // $support->update($request->only(['subject', 'body']));
        $support->update($request->validated());

        return redirect()->route('supports.index');
    }

    public function destroy(string|int $id){
        $support = $this->EncontrarOuVoltar($id);
        $support->delete();
        return redirect()->route('supports.index');
    }

    private function EncontrarOuVoltar(string|int $id){
        $support = Support::find($id);
        if(!$support)
            return back();

        return $support;
    }
}
