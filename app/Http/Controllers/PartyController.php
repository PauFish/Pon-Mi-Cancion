<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartyRequest;
use App\Providers\PartyServiceProvider;
use App\Models\Party;
use Illuminate\Http\Response;
use Illuminate\Http\Request;


class PartyController extends Controller
{
    private $partyService;
    public function __construct(PartyServiceProvider $partyService){
        $this->partyService = $partyService;
    }

    public function index(){
        $parties = collect(data_get(app()->make(Party::class)->list(),'data'));
        
        return view('home', compact('parties'));
        //guardamos todos los datos de los usuarios en la variable $users
        //$parties = Party::all();

        //return view('home',compact('parties'));

        //return response()->json([ 'data'=> $this->partyService->index()]);
    }

    public function show($id){
        return response()->json(['data'=> $this->partyService->show($id)]);
    }

    public function store(PartyRequest $request) 
        {
       $data = $request->validated();
        $name = $data['name'];
        $photo = ['photo'];
        $result = $this->partyService->store([$name,$photo]);
        return 'Party creada con exito';
        
       
    }




    public function destroy($id) {
        $this->partyService->delete($id);
        return 'Party eliminada con exito';
    }

    public function update(PartyRequest $request, $id){
        $data = $request->validated();
        $name = ['name'];
        $photo = ['photo'];
        $this->partyService->update($id, [$name, $photo]);
        return "Party actualizada con exito";
    }
}