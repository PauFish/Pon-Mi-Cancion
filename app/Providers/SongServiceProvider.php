<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\SongRepository;
use Illuminate\Support\Collection;
use App\Models\Song;


class SongServiceProvider extends ServiceProvider
{
    private $songRepository;
    public function __construct(SongRepository $songRepository){
        $this->songRepository = $songRepository;
    }

    public function show ($id){
        return $this->songRepository->showOneSong($id);
    }

    public function index(): Collection
    {
        return $this->songRepository->showSongs();
    }

    public function delete($id){
        return $this->songRepository->deleteSong($id);
    }

    public function update($id, $updatedSong){
        return $this->songRepository->updateSong($id, $updatedSong);
    }

    public function store($newSong):Song
    
    {
        return $this->songRepository->createSong($newSong);
    }
}
