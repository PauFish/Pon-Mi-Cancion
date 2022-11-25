<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\RoleRepository;
use Illuminate\Support\Collection;
use App\Models\Role;


class RoleServiceProvider extends ServiceProvider
{
    private $roleRepository;

    public function __construct(RoleRepository $roleRepository){
        $this->roleRepository = $roleRepository;
    }

    public function show ($id){
        return $this->roleRepository->showOneRole($id);
    }

    public function index(): Collection
    {
        return $this->roleRepository->showRoles();
    }

    public function delete($id){
        return $this->roleRepository->deleteRole($id);
    }

    public function update($id, $updatedRole){
        return $this->roleRepository->updateRole($id, $updatedRole);
    }

    public function store($newRole):Role
    
    {
        return $this->roleRepository->createRole($newRole);
    }

}
