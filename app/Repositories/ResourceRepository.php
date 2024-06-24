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
        $resource = Resource::findOrFail($id);
        $resource->update($data);
        return $resource;
    }

    public function delete(string $id)
    {
        $resource = Resource::findOrFail($id);
        $resource->delete();
        return $resource;
    }
}
