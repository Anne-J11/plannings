<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // GET /users
    public function index()
    {
        return response()->json(User::all());
    }

    // POST /users
    public function store(CreateUserRequest $request)
    {
        $user = User::create($request->validated());

        return response()->json($user, 201);
    }

    // GET /users/{id}
    public function show(User $user)
    {
        return response()->json($user);
    }

    // DELETE /users/{id}
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(null);
    }

    // PUT /users/{id}
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        return response()->json($user);
    }
}
