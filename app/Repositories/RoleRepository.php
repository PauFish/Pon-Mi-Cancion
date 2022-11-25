<?php

namespace App\Repositories;

use App\Models\Role;

class RoleRepository{
   public function __construct(Role $model){
    $this->model = $model;
   }

   public function createRole(array $newRole){
    return Role::create($newRole);
  }

  public function updateRole($id, array $updatedRole){
    return Role::whereId($id)->update( $updatedRole);
  }

  public function deleteRole($id){
    return Role::whereId($id)->delete();
  }

  public function showOneRole($id){
    return Role::whereId($id)->get();
  }

  public function showRoles(){
    return Role::all();
  }


}