<?php

namespace App\Http\Controllers;

use App\Http\Requests\SongRequest;
use App\Providers\SongServiceProvider;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Song;


class SongController extends Controller
{
    private $songService;
    public function __construct(SongServiceProvider $songService)
    {
        $this->songService = $songService;
    }

    public function index()
    {
        $songs = Song::all();
        return view('song', compact('songs'));
    }

    public function create()
    {
        return view('songs.create');
    }

    public function store(Request $request)
    {
        $data = new Song();

        $data->title = $request->get('title');
        $data->artist = $request->get('artist');
        $data->vote = $request->get('vote');

        $data->save();
        echo '<script>alert("Canción creada"), window.location.href ="/djSong" </script>';
    }

    public function destroy($id)
    {
        $data = Song::find($id);

        $data->delete();
        echo '<script>alert("Canción eliminada"), window.location.href ="/djSong" </script>';
    }

    public function edit($id)
    {
        $song = Song::find($id);

        return view('songs.edit')->with('song', $song);
    }


    public function update(Request $request, $id)
    {
        $data = Song::find($id);

        $data->title = $request->get('title');
        $data->artist = $request->get('artist');
        $data->vote = $request->get('vote');

        $data->save();
        echo '<script>alert("Canción modificada"), window.location.href ="/djSong" </script>';
    }

    public function show($id)
    { {
            //incrementa en 1 al votar
            Song::find($id)->increment('vote');

            echo '<script>alert("Canción Votada Con Éxito"), window.location.href ="/userSong" </script>';
        }
    }

}
