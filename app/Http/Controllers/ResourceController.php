<?php

namespace App\Http\Controllers;

use App\Exceptions\ItemNotFound;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResourceRequest;
use App\Models\Log;
use App\Repositories\ResourceRepository;
use Illuminate\Support\Facades\Redirect;

class ResourceController extends Controller
{
    protected $resourceRepository;
    public function __construct(ResourceRepository $resourceRepository)
    {
        $this->resourceRepository = $resourceRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resources = $this->resourceRepository->findAll();
        return view('resources.index', compact('resources'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('resources.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ResourceRequest $request)
    {
        $data = $request->all();
        $this->resourceRepository->save($data);
        return Redirect::route('resources.index')->with('success', 'resource created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $number)
    {
        $resource = $this->resourceRepository->findById($number);
        return view('resources.show', compact('resource'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $number)
    {
        $resource = $this->resourceRepository->findById($number);
        return view('resources.edit', compact('resource'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ResourceRequest $request, string $number)
    {

        $data = $request->all();
        $this->resourceRepository->update($number, $data);
        return Redirect::route('resources.index')->with('success', 'resource updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $number)
    {
        $this->resourceRepository->delete($number);
        return Redirect::route('resources.index')->with('success', 'resource deleted successfully');
    }
}
