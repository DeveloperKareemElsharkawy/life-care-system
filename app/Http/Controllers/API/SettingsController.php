<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Settings\ContactRequest;
use App\Http\Resources\API\Settings\AppContactDataResource;
use App\Http\Resources\API\Settings\AppSocialsLinksResource;
use App\Models\AppSetting;
use App\Models\Contact;
use App\Models\Page;
use App\Models\User;
use App\Notifications\OrderStatusNotification;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Notification;

class SettingsController extends BaseController
{

    public function __construct()
    {
        $this->middleware('auth:api')->only('myNotifications','readNotifications');
    }

    /**
     * @param ContactRequest $request
     * @return JsonResponse
     * @throws ValidationException
     * @throws Exception
     */
    public function contact(ContactRequest $request)
    {
        Contact::query()->create($request->validated());
        return $this->respondMessage('Contact created successfully');
    }

    /**
     * @return JsonResponse
     */
    public function socialsLinks()
    {
        $settings = settings()->group('app')->all();

        return $this->respondData(
            new  AppSocialsLinksResource($settings)
        );
    }

    /**
     * @return JsonResponse
     */
    public function myNotifications()
    {
        $notifications = auth('api')->user()->notifications->map(function ($notification, $key) {
            return [
                'id' => $key + 1,
                'badge' => ($notification->data)[0]['badge'],
                'body' => ($notification->data)[0]['body'],
                'read_at' => $notification->read_at,
                'created_at' => $notification->created_at->format('Y-m-d'),
            ];
        })->toArray();

        return $this->respondData($notifications);

    }

    /**
     * @return JsonResponse
     */
    public function readNotifications()
    {
        auth('api')->user()->unreadNotifications->markAsRead();

        return $this->respondMessage('Notifications read successfully');
    }


    /**
     * @return JsonResponse
     */
    public function aboutUs()
    {
        $page = Page::query()->where('slug', 'about-us')->first();

        if (!$page) {
            return $this->respondError('Page not found');
        }

        $images = [];

        foreach (json_decode($page->images) as $key => $image) {
            $images[] = asset('storage/' . $image);
        }

        return $this->respondData([
            'images' => $images,
            'content' => $page->content,
        ]);
    }

    /**
     * @return JsonResponse
     */
    public function termsConditions()
    {
        $page = Page::query()->where('slug', 'terms-conditions')->first();

        if (!$page) {
            return $this->respondError('Page not found');
        }

        return $this->respondData($page->content);
    }


    /**
     * @return JsonResponse
     */
    public function contactInfo()
    {
        return $this->respondData([
            'company' => settings()->group('app')->get('company'),
            'email' => settings()->group('app')->get('email'),
            'mobile' => settings()->group('app')->get('mobile'),
            'longitude' => floatval(settings()->group('app')->get('longitude')),
            'latitude' => floatval(settings()->group('app')->get('latitude')),
            'address' => settings()->group('app')->get('address'),

        ]);
    }

}
