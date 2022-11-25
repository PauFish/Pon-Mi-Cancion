<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Providers\Roles\RoleService;
use App\Providers\RoleServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoleController extends Controller
{
    private $roleService;
    public function __construct(RoleServiceProvider $roleService){
        $this->roleService = $roleService;
    }

    public function index(){
        return response()->json([ 'data'=> $this->roleService->index()]);
    }

    public function show($id){
        return response()->json(['data'=> $this->roleService->show($id)]);
    }

    public function store(RoleRequest $request){
        $data = $request->validated();
        $name = $data['name'];
        $result = $this->roleService->store($name);
        return 'Role creado con exito';
       
    }

    public function destroy($id) {
        $this->roleService->delete($id);
        return 'Role eliminado con exito';
    }

    public function update(RoleRequest $request, $id){
        $data = $request->validated();
        $name = ['name'];
        $this->roleService->update($id, $name);
        return "Role actualizado con exito";
    }
}


