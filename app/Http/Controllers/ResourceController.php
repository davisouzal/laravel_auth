<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResourceRequest;
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
        try{
            $resources = $this->resourceRepository->findAll();
            return view('resources.index', compact('resources'));
        } catch (\Exception $e) {
            dd($e->getMessage());
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            // substituir por repository de escolas e usuários
            return view('resources.create');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ResourceRequest $request)
    {
        try {
            $data = $request->all();
            $this->resourceRepository->save($data);
            return Redirect::route('resources.index')->with('success', 'resource created successfully');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $number)
    {
        try {
            $resource = $this->resourceRepository->findById($number);
            return view('resources.show', compact('resource'));
        } catch (\Exception $e) {
            dd($e->getMessage());
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $number)
    {
        try {
            $resource = $this->resourceRepository->findById($number);
            return view('resources.edit', compact('resource'));
        } catch (\Exception $e) {
            dd($e->getMessage());
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ResourceRequest $request, string $number)
    {
        try {
            $data = $request->all();
            $this->resourceRepository->update($number, $data);
            return Redirect::route('resources.index')->with('success', 'resource updated successfully');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $number)
    {
        try {
            $this->resourceRepository->delete($number);
            return Redirect::route('resourcees.index')->with('success', 'resource deleted successfully');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
