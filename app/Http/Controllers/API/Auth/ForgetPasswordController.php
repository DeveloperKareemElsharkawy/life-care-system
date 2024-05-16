<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\Auth\VerifyCodeRequest;
use App\Http\Requests\API\Auth\SendResetCodeRequest;
use App\Models\User;
use App\Notifications\SendForgetPasswordCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForgetPasswordController extends BaseController
{
    public function sendResetCode(SendResetCodeRequest $request)
    {
        $user = User::query()->where($request['type'], $request['username'])->first();

        $reset_code = $this->generateResetCode();

        DB::table('password_resets')
            ->updateOrInsert(
                ['email' => $user->email, 'mobile' => $user->mobile],
                ['code' => 9999, 'created_at' => now()]
            );

        //$user->notify(new SendForgetPasswordCode($reset_code));

        if ($request['type'] == 'email') {
//            $user->notify(new SendForgetPasswordCode($reset_code));
        } else {
//            $user->notify(new SendForgetPasswordCode($reset_code, 'sms'));
        }
        return $this->respondMessage(trans('message.auth.forget_password.send_code'));

    }


    function generateResetCode()
    {
        return mt_rand(0, 8) . mt_rand(1, 9) . mt_rand(10, 90);
    }

    public function verifyResetCode(VerifyCodeRequest $request){
        return $this->respondMessage(trans('message.auth.forget_password.valid_code'));

    }
}
