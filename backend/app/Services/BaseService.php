<?php

namespace App\Services;

interface BaseService
{
    public function save(array $data);
    public function update(array $data, $id);
    public function findAll();
    public function findById($id);
    public function delete($id);
}
