<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use App\Providers\UserServiceProvider;
use Illuminate\Http\Response;

class UserController extends Controller
{
    private $userService;
    public function __construct(UserServiceProvider $userService){
        $this->userService = $userService;
    }

    public function index(){
        return response()->json([ 'data'=> $this->userService->index()]);
    }

    public function show($id){
        return response()->json(['data'=> $this->userService->show($id)]);
    }

    public function store(UserRequest $request){
        $data = $request->validated();
        
        $name = $data['name'];
        $password = $data['password'];
        $email = $data['email'];
        $phone = $data['phone'];
        $role_id = $data['role_id'];

        $result = $this->userService->store([$name, $password, $email, $phone, $role_id ]);
        return 'Usuario creado con exito';
       
    }

    public function destroy($id) {
        $this->userService->delete($id);
        return 'Usuario eliminado con exito';
    }

    public function update(UserRequest $request, $id){
        $data = $request->validated();
        $title = $data['title'];
        $artist = $data['artist'];
        $this->userService->update($id, [$title, $artist]);
        return "Usuario actualizado con exito";
    }
}
