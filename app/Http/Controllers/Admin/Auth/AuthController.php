<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;
use function view;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show Login Form
     *
     * @return Application|Factory|View
     *
     */
    public function showLoginForm()
    {
        return view('admin-panel.auth.login');
    }

    /**
     * Authenticate User
     *
     * @param Request $data
     * @return RedirectResponse
     *
     */
    public function authenticate(Request $data)
    {
        $this->validateLogin($data);

        if (Auth::guard('admin')->attempt([$this->username($data) => $data['username'], 'password' => $data['password']], (bool)$data['remember_me'])) {
            if (Auth::guard('admin')->user()->status == 0) {
                Auth::guard('admin')->logout();
                throw ValidationException::withMessages(['password' => trans('message.auth.login.account_not_active')]);

            }

            return redirect()->route('admin.dashboard.home');
        }

        throw ValidationException::withMessages(['password' => trans('message.auth.login.wrong_password')]);
    }


    /**
     * Validate the user login request.
     *
     * @param Request $data
     * @return void
     *
     */
    protected function validateLogin(Request $data)
    {
        $data->validate([
            'username' => 'required|exists:admins,' . $this->username($data),
            'password' => 'required|min:6'
        ]);
    }


    /**
     * Check if UserName is Email or Mobile
     *
     * @return string
     *
     */
    public function username($data)
    {
        return (filter_var($data['username'], FILTER_VALIDATE_EMAIL)) ? 'email' : 'mobile';
    }


    /**
     * Check if UserName is Email or Mobile
     *
     * @return Application|RedirectResponse|Redirector
     *
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
