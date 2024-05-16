<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Notifications\SendNotificationRequest;
use App\Models\OrderItem;
use App\Models\User;
use App\Notifications\MessageNotification;
use App\Notifications\OrderStatusNotification;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Validation\ValidationException;
use function view;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show Login Form
     *
     * @return Application|Factory|View
     *
     */
    public function home()
    {




        return view('admin-panel.dashboard.home');
    }

    /**
     * Show Login Form
     *
     * @return Application|Factory|View
     *
     */
    public function notifications()
    {
        $notifications = DatabaseNotification::selectRaw("data,DATE_FORMAT(created_at, '%Y-%m-%e') date")->get();

        $notifications = collect($notifications)->groupBy('date');

        DatabaseNotification::query()->update(['read_at' => now()]);
        return view('admin-panel.dashboard.notifications', compact('notifications'));
    }

    /**
     * Show Login Form
     *
     * @return RedirectResponse
     *
     */
    public function notificationsForm()
    {
        $clients = User::query()->get();
        return view('admin-panel.dashboard.notifications-form', compact('clients'));
    }

    /**
     * Show Login Form
     *
     * @return RedirectResponse
     *
     */
    public function sendNotifications(SendNotificationRequest $request)
    {
        $this->ajaxValidationCheck($request);

        if ($request->has('clients')) {
            $clients = User::query()->whereIn('id', $request->get('clients'))->get();
        } else {
            $clients = User::query()->get();
        }

        foreach ($clients as $client) {
            $client->notify(new MessageNotification($request->get('title'), $request->get('details')));
        }

        return redirect()->back()->with('successful_message', 'Notifications sent successfully');
    }

    /**
     * LogOut
     *
     * @return RedirectResponse
     *
     */
    public function logout()
    {
        Auth::logout();
        return to_route('admin.login.form');
    }

    public function setLocale($locale = null)
    {
        app()->setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
