<?php

namespace App\Repositories;

interface BaseRepository
{
    public function save(array $data);
    public function update(array $data, $id);
    public function findAll();
    public function findById($id);
    public function delete($id);
}
