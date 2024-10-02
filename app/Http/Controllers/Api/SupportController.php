<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Admin\Support;
use Illuminate\Http\Response;
use App\Services\SupportService;
use App\Http\Controllers\Controller;
use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Http\Resources\SupportResource;
use App\Http\Requests\StoreUpdateSupportRequest;

class SupportController extends Controller
{

    public function __construct(protected SupportService $service){}

    /**
     * Display a listing of the resource.
     */
    public function index(StoreUpdateSupportRequest $request){
        // -----------------Poderia ser-----------------
        // $supports = Support::paginate();

        // return SupportResource::collection($supports);

        // -----------------Deixando mais completo-----------------

        $supports = $this->service->paginate(
            page: $request->get("page",1),
            totalPerPage: $request->get("per_page", 10),
            filter: $request->filter
        );
// 
        //como converter array para collections e passar no método para voltar como arraay no SupportResource
        return SupportResource::collection($supports->items())
                                    ->additional([
                                        "meta" => [
                                            "total" => $supports->total(),
                                            "is_first_page" => $supports->isFirstPage(),
                                            "is_last_page" => $supports->isLastPage(),
                                            "current_page" => $supports->currentPage(),
                                            "next_page" => $supports->getNumberNextPage(),
                                            "previous_page" => $supports->getNumberPreviousPage()
                                        ]
                                    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateSupportRequest $request)
    {
        $support = $this->service->new(
            CreateSupportDTO::makefromRequest($request)
        );

        return new SupportResource($support);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!$support = $this->service->findOne($id)){
            return response()->json(["error"=> "Not Found"], Response::HTTP_NOT_FOUND);
        }

        return new SupportResource($support);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateSupportRequest $request, string $id)
    {
        if(!$support = $this->service->update(UpdateSupportDTO::makefromRequest($request, $id))){
            return response()->json([
                "error", "Not Found"
            ], Response::HTTP_NOT_FOUND);
        }

        return new SupportResource($support);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(!$support = $this->service->findOne($id)){
            return response()->json([
                "error" => "Not Found"
            ], Response::HTTP_NOT_FOUND);
        }

        $this->service->delete($id);

        return response()->json([
        ], Response::HTTP_NO_CONTENT);
    }
}
