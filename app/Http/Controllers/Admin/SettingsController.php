<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SettingsController extends Controller
{

    public function adminIndex()
    {
        $settings = settings()->group('admin')->all();

        return view('admin-panel.settings.admin', compact('settings'));
    }

    public function saveAdminSettings()
    {
        $data = request()->except('_token');

        foreach ($data as $key => $value) { // remove Old Settings from DB
            Settings()->remove($key);
        }

        Settings()->group('admin')->set($data);

        return redirect()->back()->with('successful_message', 'تم حفظ الإعدادات بنجاح');
    }

    public function appIndex()
    {
        $settings = settings()->group('app')->all();

        return view('admin-panel.settings.app', compact('settings'));
    }

    public function saveAppSettings()
    {
        $data = request()->except('_token');

        foreach ($data as $key => $value) { // remove Old Settings from DB
            Settings()->remove($key);
        }

        Settings()->group('app')->set($data);

         return redirect()->back()->with('successful_message', 'تم حفظ الإعدادات بنجاح');
    }

}
