<?php

namespace App\Services;

use App\Models\User;
use App\Services\EmailService\EmailService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class UserService{
    protected EmailService $emailService;

    public function __construct(EmailService $emailService){
        $this->emailService = $emailService;
    }

    public function storeUserInDB(Request $request): JsonResponse{
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required',
            'date_of_birth' => 'required|date_format:Y-m-d'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 401);
        }

        $dateOfBirth = $request->get('date_of_birth');

        $dateOfBirth = Carbon::createFromFormat("Y-m-d", $dateOfBirth);

        $age = $dateOfBirth->diffInYears(Carbon::now());

        if($age < 18){
            return response()->json([
                "msg" => "age should be greater than 18"
            ], 402);
        }

        $user = User::query()->create($request->all());

        $this->sendUserWelcomeEmail($user->id);

        return response()->json($user, 201);
    }

    protected function sendUserWelcomeEmail($userId): void {
        $user = User::query()->find($userId);

        $this->emailService->sendTextEmail($user->email, "Welcome", "Hope you will have a good time");

        $user->is_welcome_email_sent = true;

        $user->save();
    }
}
