<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\System\Admin\CreateSystemUserRequest;
use App\Http\Requests\Admin\System\Admin\UpdateSystemUserRequest;
use App\Http\Requests\Admin\User\CreateCashUserRequest;
use App\Http\Requests\Admin\User\CreateUserRequest;
use App\Http\Requests\Admin\User\UpdateCashUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use App\Models\Category;
use App\Models\Club;
use App\Models\College;
use App\Models\Doctor;
use App\Models\Folder;
use App\Models\InsuranceCompany;
use App\Models\Interest;
use App\Models\School;
use App\Models\State;
use App\Models\User;
use App\Services\Admin\Images\UploadImageService;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Throwable;
use function view;
use Illuminate\Support\Facades\Auth;

class CashUsersController extends Controller
{
    /**
     * List All Users
     *
     * LiveWire Component in Blade File
     *
     * @return Application|Factory|View
     *
     */
    public function index()
    {
        return view('admin-panel.cash-users.index');
    }


    public function show($user_id)
    {
        $user = User::query()->with('archives')->find($user_id);
        $states = State::query()->get();
        $insuranceCompanies = InsuranceCompany::query()->get();

        return view('admin-panel.cash-users.show', compact('user', 'states', 'insuranceCompanies'));
    }


    /**
     * Show create Form
     *
     * @return Application|Factory|View
     *
     */
    public function create()
    {
        $states = State::query()->get();
        $doctors = Doctor::query()->get();
        $insuranceCompanies = InsuranceCompany::query()->get();
        $categories = Category::query()->whereIn('parent_id', [49, 32])->get();

        return view('admin-panel.cash-users.create', compact('states', 'doctors', 'categories', 'insuranceCompanies'));
    }

    /**
     * Save New User in System
     *
     * @return RedirectResponse
     *
     * @throws Throwable
     */
    public function store(CreateCashUserRequest $request, UploadImageService $uploadImageService)
    {
        $this->ajaxValidationCheck($request); // Check Ajax Request

        $validated = $request->safe(); // return only validate Data From Form Request

        if ($request['image']) {
            $image = $uploadImageService->execute('system/users', $validated['image']);
            $validated = $request->safe()->merge(['image' => $image]);
        }

        $user = User::create($validated->all());


        return to_route('admin.cash-users.index')->with('successful_message', trans('admin/messages.users.created'));
    }

    /**
     * Show Edit Form
     *
     * @return Application|Factory|View
     *
     */
    public function edit($systemUserId)
    {
        $user = User::query()->where('id', $systemUserId)->first();
        $states = State::query()->get();
        $doctors = Doctor::query()->get();
        $categories = Category::query()->whereIn('parent_id', [49, 32])->get();


        return view('admin-panel.cash-users.edit', compact('user', 'categories', 'states', 'doctors'));
    }


    /**
     * Update System User
     *
     * @return RedirectResponse
     *
     */
    public function update(UpdateCashUserRequest $request, UploadImageService $uploadImageService)
    {
        $this->ajaxValidationCheck($request); // Check Ajax Request

        $validated = ($request->safe()); // return only validate Data From Form Request

        if ($request['image']) {
            $image = $uploadImageService->execute('system/users', $validated['image']);
            $validated = $request->safe()->merge(['image' => $image]);
        }

        $user = User::where('id', $validated['user_id'])->first();
        $user->update($validated->except(['user_id']));

        return to_route('admin.cash-users.index')->with('successful_message', trans('admin/messages.users.updated'));
    }

}
