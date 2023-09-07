<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller{
    protected UserService $userService;

    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    public function show(User $user): JsonResponse{
        return response()->json($user);
    }

    public function store(Request $request): JsonResponse{
        return $this->userService->storeUserInDB($request);
    }
}
