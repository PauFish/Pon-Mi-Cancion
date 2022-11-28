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

    public function create()
    {
        return view('parties.create');
    }

    /*
    public function store(PartyRequest $request) 
        {
       $data = $request->validated();
        $name = $data['name'];
        $photo = $data['photo'];
        $result = $this->partyService->store([$name,$photo]);
        return redirect('/home'); 
       
    }
    */

    public function store(Request $request)
    {
        $data= new Party();

        $data->name = $request->get('name');
        $data->photo = $request->get('photo');

        $data->save();
        
         return redirect('/home');
    }

    public function destroy($id) {
        $this->partyService->delete($id);
        return 'Party eliminada con exito';
    }

    public function edit($id) {
        $party = Party::find($id);
        return view('parties.edit')->with('party',$party);
    }
    public function update(Request $request, $id){
       /* $data = $request->validated();
        $name = ['name'];
        $photo = ['photo'];
        $this->partyService->update($id, [$name, $photo]);
        return "Party actualizada con exito";*/

        $data = Party::find($id);

        $data->name = $request->get('name');
        $data->photo = $request->get('photo');

        $data->save();
        
         return redirect('/home');
    }
}  