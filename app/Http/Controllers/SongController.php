<?php

namespace App\Http\Controllers;
use App\Http\Requests\SongRequest;
use App\Providers\SongServiceProvider;
use Illuminate\Http\Response;
use Illuminate\Http\Request;


class SongController extends Controller
{
    private $songService;
    public function __construct(SongServiceProvider $songService){
        $this->songService = $songService;
    }

    public function index(){
        return response()->json([ 'data'=> $this->songService->index()]);
    }

    public function show($id){
        return response()->json(['data'=> $this->songService->show($id)]);
    }

    public function store(SongRequest $request){
        $data = $request->validated();
        $title = $data['title'];
        $artist = $data['artist'];
        $result = $this->songService->store([$title, $artist]);
        return 'Cancion creada con exito';
       
    }

    public function destroy($id) {
        $this->songService->delete($id);
        return 'Cancion eliminada con exito';
    }

    public function update(SongRequest $request, $id){
        $data = $request->validated();
        $title = $data['title'];
        $artist = $data['artist'];
        $this->songService->update($id,[$title, $artist]);
        return "Cancion actualizada con exito";
    }
}
