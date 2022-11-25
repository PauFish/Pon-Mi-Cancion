<?php

namespace App\Repositories;

use App\Models\Party;

class PartyRepository{
   public function __construct(Party $model){
    $this->model = $model;
   }

   public function createParty(array $newParty){
    return Party::create($newParty);
  }

  public function updateParty($id, array $updatedParty){
    return Party::whereId($id)->update( $updatedParty);
  }

  public function deleteParty($id){
    return Party::whereId($id)->delete();
  }

  public function showOneParty($id){
    return Party::whereId($id)->get();
  }

  public function showPartys(){
    return Party::all();
  }


}