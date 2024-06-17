<?php

namespace App\Repositories;
use App\Models\Resource;

class ResourceRepository
{
    public function findAll()
    {
        return Resource::all();
    }

    public function findById(string $id)
    {
        return Resource::findOrFail($id);
    }

    public function save(array $data)
    {
        return Resource::create($data);
    }

    public function update(string $id, array $data)
    {
        $school = Resource::findOrFail($id);
        $school->update($data);
        return $school;
    }

    public function delete(string $id)
    {
        $school = Resource::findOrFail($id);
        $school->delete();
        return $school;
    }
}
