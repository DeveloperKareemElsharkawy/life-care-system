<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\API\BaseController;
use App\Http\Requests\API\Auth\LoginRequest;
use App\Http\Requests\API\Auth\RegisterRequest;
use App\Http\Requests\API\Auth\SocialAuthRequest;
use App\Http\Resources\API\Location\StateResource;
use App\Http\Resources\API\User\UserResource;
use App\Models\Folder;
use App\Models\Religion;
use App\Models\User;
use App\Services\Admin\Images\UploadImageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class  AuthController extends BaseController
{
    /**
     * Validate the user login request.
     *
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $user = User::query()->where($request['type'], $request['username'])->first();

        if ($user && Hash::check($request['password'], $user['password'])) {

            return $this->respondData([
                'user' => new UserResource($user),
                'token' => $user->createToken(env('APP_NAME', 'Passport Token'))->accessToken
            ]);
        }


        // Create or update a personal folder
        Folder::query()->firstOrCreate([
            'name_ar' => 'الخاص',
            'name_en' => 'personal',
            'user_id' => $user->id,
        ], [
            'folder_type' => 'personal',
        ]);

        // Create or update an invites folder
        Folder::query()->firstOrCreate([
            'name_ar' => 'الدعوات',
            'name_en' => 'invites',
            'user_id' => $user->id,
        ], [
            'folder_type' => 'invite',
        ]);
        throw ValidationException::withMessages(['password' => trans('message.auth.login.wrong_password')]);
    }

    /**
     * Social Auth
     *
     * @param SocialAuthRequest $request
     * @return JsonResponse
     */
    public function socialAuth(SocialAuthRequest $request)
    {
        $user = User::query()
            ->where('social_id', $request['social_id'])
            ->orWhere('email', $request['email'])
            ->orWhere('mobile', $request['mobile'])
            ->first();

        if ($user) {
            return $this->respondData([
                'user' => new UserResource($user),
                'token' => $user->createToken(env('APP_NAME', 'Passport Token'))->accessToken
            ]);
        } else {
            $user = User::query()->create($request->validated());
            return $this->respondData([
                'user' => new UserResource($user),
                'token' => $user->createToken(env('APP_NAME', 'Passport Token'))->accessToken
            ]);
        }


    }


    /**
     * Validate the user login request.
     *
     * @param RegisterRequest $request
     * @param UploadImageService $uploadImageService
     * @return JsonResponse
     */
    public function register(RegisterRequest $request, UploadImageService $uploadImageService)
    {
        if ($request['image']) {
            $image = $uploadImageService->execute('users', $request['image']);
            $request = $request->safe()->merge(['image' => $image]);
        }

        $user = User::query()->create($request->all());

        // Create or update a personal folder
        Folder::query()->firstOrCreate([
            'name_ar' => 'الخاص',
            'name_en' => 'personal',
            'user_id' => $user->id,
        ], [
            'folder_type' => 'personal',
        ]);

        // Create or update an invites folder
        Folder::query()->firstOrCreate([
            'name_ar' => 'الدعوات',
            'name_en' => 'invites',
            'user_id' => $user->id,
        ], [
            'folder_type' => 'invite',
        ]);

        return $this->respondData([
            'user' => new UserResource($user),
            'token' => $user->createToken(env('APP_NAME', 'Passport Token'))->accessToken
        ]);
    }


    /**
     * Update Fcm Token
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function logOut(Request $request)
    {
        if (!auth('api')->user()) {
            return $this->respondError(trans('message.auth.unauthenticated'), 401);
        }

        $token = auth('api')->user()->token();
        $token->revoke();

        return $this->respondMessage(trans('message.auth.logout'));
    }

    /**
     * Update Fcm Token
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function states()
    {
        return $this->respondData(StateResource::collection(
            \App\Models\State::query()->get()
        ));
    }


    /**
     * Update Fcm Token
     *
     */
    public function religions()
    {
        return $this->respondData(
            Religion::query()->select('id', 'name')->get()
        );
    }
}
