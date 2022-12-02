<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Providers\Roles\RoleService;
use App\Providers\RoleServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Role;

class RoleController extends Controller
{
    private $roleService;
    public function __construct(RoleServiceProvider $roleService){
        $this->roleService = $roleService;
    }

    public function index()
    {
        $roles = Role::all();
        return view('role', compact('roles'));
    }

    public function show($id){
        return response()->json(['data'=> $this->roleService->show($id)]);
    }
    public function create()
    {
        return view('roles.create');
    }
    public function store(Request $request){
        $data= new Role();
        $data->name = $request->get('name');
        $data->save();
        echo '<script>alert("Role Creado con Éxito"), window.location.href ="/homeAdmin" </script>';
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


