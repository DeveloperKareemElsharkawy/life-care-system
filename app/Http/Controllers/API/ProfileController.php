<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\User\CreateFolderRequest;
use App\Http\Requests\API\User\DeleteFolderRequest;
use App\Http\Requests\API\User\UpdatePasswordRequest;
use App\Http\Requests\API\User\UpdateProfileRequest;
use App\Http\Resources\API\User\FolderResource;
use App\Http\Resources\API\User\UserFolderResource;
use App\Http\Resources\API\User\UserResource;
use App\Models\Folder;
use App\Services\Admin\Images\UploadImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function getProfile()
    {
        return $this->respondData(new UserResource(auth('api')->user()));
    }

    public function updateProfile(UpdateProfileRequest $request, UploadImageService $uploadImageService)
    {
        $user = auth('api')->user();

        if ($request['image']) {
            $image = $uploadImageService->execute('system/users', $request['image']);
            $request = $request->safe()->merge(['image' => $image]);
        }

        $user->update($request->all());

        return $this->respondData(new UserResource($user));
    }

    public function updatePassword(UpdatePasswordRequest $request): \Illuminate\Http\JsonResponse
    {
        $user = auth('api')->user();

        $user->update(['password' => $request['password']]);

        return $this->respondMessage('تم تغيير كلمه المرور بنجاح');
    }


    public function myFolders(): \Illuminate\Http\JsonResponse
    {

        $user = auth('api')->user();

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



        $folders = Folder::query()->where('user_id', $user->id)->get();

        return $this->respondData(FolderResource::collection($folders));
    }

    public function createFolder(CreateFolderRequest $request): \Illuminate\Http\JsonResponse
    {
        $user = auth('api')->user();

        $folder = Folder::query()->firstOrCreate([
            'name_ar' => $request->name,
            'name_en' => $request->name,
            'user_id' => $user->id,
        ], [
            'folder_type' => 'other',
        ]);

        return $this->respondData(new UserFolderResource($folder));
    }

    public function deleteFolder(DeleteFolderRequest $request): \Illuminate\Http\JsonResponse
    {
        $user = auth('api')->user();

        $folder = Folder::query()->where('user_id', $user->id)->where('id', $request->folder_id)->first();


        if (in_array($folder->folder_type, ['personal', 'invite']) || count($folder->piles) > 0) {
            return $this->respondError('لا يمكن مسح هذا الفولدر');
        }

        $folder->delete();

        return $this->respondMessage('تم مسح الفولدر');
    }

}
