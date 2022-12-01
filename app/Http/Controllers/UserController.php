<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use App\Providers\UserServiceProvider;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;


class UserController extends Controller
{
    private $userService;
    public function __construct(UserServiceProvider $userService){
        $this->userService = $userService;
    }

    public function index(){
    //$songs = collect(data_get(app()->make(Song::class)->list(),'data'));
    $songs = User::all();


    return view('user', compact('users'));
}
   /* public function index(){

        //guardamos todos los datos de los usuarios en la variable $users
        //$users = User::all();
        //return view('home',compact('users'));
        
        return response()->json([ 'data'=> $this->userService->index()]);
    }*/

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
/*
    public function update(UserRequest $request, $id){
        $data = $request->validated();
        $title = $data['title'];
        $artist = $data['artist'];
        $this->userService->update($id, [$title, $artist]);
        return "Usuario actualizado con exito";
    }*/

    public function edit($id) {
        $user = User::find($id);
        return view('users.edit')->with('user',$user);
    }


    public function update(Request $request, $id){
        
        $data = User::find($id);

        $data->name = $request->get('name');
        $data->email = $request->get('email');
        $data->password = $request->get('password');
        $data->phone = $request->get('phone');
        $data->type = $request->get('type');

        $data->save();
        echo '<script>alert("Usuario Modificado Con Éxito"), window.location.href ="/homeAdmin" </script>';
        //return redirect('/user');
    }
}
