<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository{
   public function __construct(User $model){
    $this->model = $model;
   }

   public function createUser(array $newUser){
    return User::create($newUser);
  }

  public function updateUser($id, array $updatedUser){
    return User::whereId($id)->update( $updatedUser);
  }

  public function deleteUser($id){
    return User::whereId($id)->delete();
  }

  public function showOneUser($id){
    return User::whereId($id)->get();
  }

  public function showUsers(){
    return User::all();
  }


}