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
    }

    public function show($id){
        return response()->json(['data'=> $this->partyService->show($id)]);
    }

    public function create()
    {
        return view('parties.create');
    }


    public function store(Request $request)
    {
        $data= new Party();
        $data->name = $request->get('name');
        $data->photo = $request->get('photo');
        $data->save();
        echo '<script>alert("Fiesta creada"), window.location.href ="/djHome" </script>';
    }

    public function destroy($id)
     {
        $data = Party::find($id);
        $data->delete();
        echo '<script>alert("Fiesta eliminada"), window.location.href ="/djHome" </script>';
    }

    public function edit($id) {
        $party = Party::find($id);
        return view('parties.edit')->with('party',$party);
    }
    public function update(Request $request, $id)
    {
        $data = Party::find($id);
        $data->name = $request->get('name');
        $data->photo = $request->get('photo');
        $data->save();
        echo '<script>alert("Fiesta modificada"), window.location.href ="/djHome" </script>';
    }
}  