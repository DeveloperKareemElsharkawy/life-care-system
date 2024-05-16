<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\API\BaseController;
use App\Http\Requests\API\Auth\ResetPasswordRequest;
use App\Http\Resources\API\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends BaseController
{
    public function setNewPassword(ResetPasswordRequest $request)
    {
        $user = User::query()->where($request['type'], $request['username'])->first();

        if (!$user) {
            return $this->respondError(trans('message.auth.user.not_found'));
        }

        $user->update(['password' => $request['password']]);

        \DB::table('password_resets')->where('email', $user->email)->delete();

        return $this->respondData([
            'user' => new UserResource($user),
            'token' => $user->createToken(env('APP_NAME', 'Passport Token'))->accessToken
        ], Response::HTTP_OK, trans('message.auth.user.password_reset'));
    }
}
