<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\PartyRepository;
use Illuminate\Support\Collection;
use App\Models\Party;

class PartyServiceProvider extends ServiceProvider
{ private $partyRepository;
    public function __construct(PartyRepository $partyRepository){
        $this->partyRepository = $partyRepository;
    }

    public function show ($id){
        return $this->partyRepository->showOneParty($id);
    }

    public function index(): Collection
    {
        return $this->partyRepository->showPartys();
    }

    public function delete($id){
        return $this->partyRepository->deleteParty($id);
    }

    public function update($id, $updatedParty){
        return $this->partyRepository->updateParty($id, $updatedParty);
    }

    public function store($newParty):Party
    
    {
        return $this->partyRepository->createParty($newParty);
    }
}
