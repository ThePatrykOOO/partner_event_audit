<?php


namespace App\Repositories;

interface CrudRepository
{
    public function index();

    public function show(int $id);

    public function store(array $data);

    public function update(array $data, int $id);

    public function delete(int $id);
}
