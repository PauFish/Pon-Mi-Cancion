<?php

namespace App\Repositories;

use App\Models\Song;

class SongRepository{
   public function __construct(Song $model){
    $this->model = $model;
   }

   public function createSong(array $newSong){
    return Song::create($newSong);
  }

  public function updateSong($id, array $updatedSong){
    return Song::whereId($id)->update( $updatedSong);
  }

  public function deleteSong($id){
    return Song::whereId($id)->delete();
  }

  public function showOneSong($id){
    return Song::whereId($id)->get();
  }

  public function showSongs(){
    return Song::all();
  }


}
