<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        try {
            $users = $this->userRepository->findAll();
            return view('users.index', compact('users'));
        } catch (\Exception $e) {
            dd($e->getMessage());
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function create()
    {
        try {
            $roles = Role::all();
            return view('users.create', compact('roles'));
        } catch (\Exception $e) {
            dd($e->getMessage());
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function store(UserRequest $request)
    {
        try {
            $data = $request->all();
            $this->userRepository->save($data);
            return Redirect::route('users.index')->with('success', 'User created successfully');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show(string $id)
    {
        try {
            $user = $this->userRepository->findById($id);
            return view('users.show', compact('user'));
        } catch (\Exception $e) {
            dd($e->getMessage());
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit(string $id)
    {
        try {
            $roles = Role::all();
            $user = $this->userRepository->findById($id);
            return view('users.edit', compact('user', 'roles'));
        } catch (\Exception $e) {
            dd($e->getMessage());
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(UserRequest $request, string $id)
    {
        try {
            $data = $request->all();
            $this->userRepository->update($id, $data);
            return Redirect::route('users.index')->with('success', 'User updated successfully');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(string $id)
    {
        try {
            $this->userRepository->delete($id);
            return Redirect::route('users.index')->with('success', 'User deleted successfully');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
