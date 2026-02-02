<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;

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

    // GET /users/{user}
    public function show(User $user)
    {
        return response()->json($user);
    }

    // DELETE /users/{user}
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }

    // PUT/PATCH /users/{user}
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        return response()->json($user);
    }
}