<?php

namespace App\Models;

use Eloquent;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Passport\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;
use Laravel\Sanctum\PersonalAccessToken;
use Overtrue\LaravelFavorite\Traits\Favoriter;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int $status
 * @property string|null $mobile
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection|Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read Collection|Role[] $roles
 * @property-read int|null $roles_count
 * @property-read Collection|PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User orWherePermissionIs($permission = '')
 * @method static \Illuminate\Database\Eloquent\Builder|User orWhereRoleIs($role = '', $team = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDoesntHavePermission()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDoesntHaveRole()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePermissionIs($permission = '', $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleIs($role = '', $team = null, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin Eloquent
 */
class User extends Authenticatable
{
    use LaratrustUserTrait, HasApiTokens, HasFactory, Notifiable, Favoriter;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'doctor_id',
        'phone',
        'phone_2',
        'image',
        'status',
        'password',
        'state_id',
        'birth_date',
        'age',
        'referral',
        'address',
        'gender',
        'marital_status',
        'referral_desc',
        'contract_type',
        'payment_type',
        'examination_price',

        'examination_price_discount',
        'examination_price_before_discount',

        'insurance_company_id',
        'examination_notes',
        'consultant_name',
        'examination_date',
        'receipt_number',
        'referral_doctor_id',

        'doctor_examination_percentage',
        'category_id',
        'company_examination_price',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['imageUrl','referralFrom'];




    // Define an accessor for the age attribute
    public function getReferralFromAttribute()
    {
        // Calculate age based on birth_date
        return trans('admin/datatable.'.$this->referral);
    }


    /**
     * Override Password and encrypt it.
     *
     * @var array<string, string>
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }


    /**
     * Appends Admin Image Url
     *
     */
    public function getImageUrlAttribute($value): string
    {
        $imageUrl = asset('storage/' . $this->image);

        // Check if the image exists at the given URL
        if (!file_exists(public_path($imageUrl))) {
            // If the image doesn't exist or is not a valid image, provide a default image URL
            // Replace 'path_to_default_image' with your default image path
            return asset('storage/default-user.jpg');
        }

        return $imageUrl;
    }


    public function state(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(State::class)->withDefault([
            'name' => ''
        ]);
    }

    public function orders(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Order::class);
    }


    public function archives(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(UserArchive::class);
    }

    public function colleges()
    {
        return $this->belongsToMany(College::class);
    }

    public function user_schools()
    {
        return $this->belongsToMany(School::class, 'school_user');
    }

    public function user_interests()
    {
        return $this->belongsToMany(Interest::class, 'interest_user');
    }

    public function user_clubs()
    {
        return $this->belongsToMany(Interest::class, 'club_user');
    }

    public function folders()
    {
        return $this->hasMany(Folder::class, 'user_id');
    }

    public function piles()
    {
        return $this->belongsToMany(Pile::class, 'pile_users');
    }


    public function insurance_company(): BelongsTo
    {
        return $this->belongsTo(InsuranceCompany::class);
    }


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
