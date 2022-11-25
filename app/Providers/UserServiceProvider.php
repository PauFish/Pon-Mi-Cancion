<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\UserRepository;
use Illuminate\Support\Collection;
use App\Models\User;

class UserServiceProvider extends ServiceProvider
{
    private $UserRepository;
    public function __construct(UserRepository $UserRepository){
        $this->UserRepository = $UserRepository;
    }

    public function show ($id){
        return $this->UserRepository->showOneUser($id);
    }

    public function index(): Collection
    {
        return $this->UserRepository->showUsers();
    }

    public function delete($id){
        return $this->UserRepository->deleteUser($id);
    }

    public function update($id, $updatedUser){
        return $this->UserRepository->updateUser($id, $updatedUser);
    }

    public function store($newUser):User
    
    {
        return $this->UserRepository->createUser($newUser);
    }
}
