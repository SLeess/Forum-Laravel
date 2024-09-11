<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Support;
use App\Services\SupportService;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\returnSelf;
use App\Http\Requests\StoreUpdateSupportRequest;
use App\DTO\Supports\{CreateSupportDTO,UpdateSupportDTO};

class SupportController extends Controller
{

    //laravel trabalha com a injeção de dependencias e o php 8 com a promoção de atributos
    public function __construct(protected SupportService $service){

    }

    public function index(Request $request){
        $supports = $this->service->paginate(
                                             page: $request->get("page", 1),
                                             totalPerPage: $request->get("per_page", 9),
                                             filter: $request->filter);//Support::all();

        $filters = ['filter' => $request->get('filter', '')];
        return view("admin.support.index", compact('supports', 'filters'));
    }

    public function show(string|int $id){
        if(!$support = $this->service->findOne($id))
            return back();
        return view('admin/support/show', compact('support'));
    }

    public function create(){

        return view("admin/support/create");
    }

    public function store(StoreUpdateSupportRequest $request, Support $support){
        /*
          $data = $request->all();
        */
        /*
          $data = $request->validated();
          $support = $support->create($data);
        */

                            //I make a static method that can return his own type to a new object
        $this->service->new(CreateSupportDTO::makeFromRequest($request));
            //bad ´pratice
        /* return redirect('/')->with('msg', 'Novo suporte cadastrado!');*/
        return redirect()->route('supports.index')->with('msg', 'Novo suporte cadastrado!');
    }

    public function edit(string|int $id){//, Support $support){
        $support = $this->service->findOne($id);//$support->where('id', $id)->first();
        if(!$support){
            return back();
        }

        return view('admin/support.edit', compact('support'));
    }

    public function update(StoreUpdateSupportRequest $request, string|int $id, Support $support){
        //$support = $this->EncontrarOuVoltar($id);

        // Método pouco prático para models com muitos atributos
        // $support->subject = $request->subject;
        // $support->body = $request->body;
        // $support->save();

        // $support->update($request->only(['subject', 'body']));
        // dd("teste");
        $support = $this->service->update(UpdateSupportDTO::makeFromRequest($request));

        if(!$support)
            return back();

        //return redirect()->route('supports.show', $support->id);
        return redirect()->route('supports.index');
    }

    public function destroy(string|int $id){
        $this->service->delete($id);

        return redirect()->route('supports.index');
    }
}
