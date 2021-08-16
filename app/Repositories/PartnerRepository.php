<?php


namespace App\Repositories;


use App\Models\Partner;


class PartnerRepository implements CrudRepository
{

    public function index()
    {
        return Partner::all();
    }

    public function show(int $id)
    {
        return Partner::query()->findOrFail($id);
    }

    public function store(array $data)
    {
        $partner = new Partner($data);
        $partner->save();
        return $partner;
    }

    public function update(array $data, int $id)
    {
        Partner::query()->findOrFail($id)->update($data);
    }

    public function delete(int $id)
    {
        Partner::query()->findOrFail($id)->delete();
    }
}
