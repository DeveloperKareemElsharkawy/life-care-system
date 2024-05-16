<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFavorite\Traits\Favoriteable;

class Worker extends Model
{
    use HasFactory, Favoriteable;

    protected $fillable = [
        'name',
        'dob',
        'age',
        'experience',
        'gender',
        'marital_status',
        'no_of_children',
        'religion',
        'nationality_id',
        'place_of_birth',
        'living_town',
        'category_id',
        'passport_number',
        'release_date',
        'expiry_date',
        'place_of_issue',
        'scientific_degree',
        'languages',
        'height',
        'weight',
        'skin_colour',
        'salary',
        'contract_full',
        'face_image',
        'worker_image',
        'status',
        'video_url',
        'employment_status',
        'location_status'
    ];

    /**
     * The accessors Saved in Database
     *
     * @var array
     */
    protected $casts = [
        'experience' => 'integer',
        'no_of_children' => 'integer',
        'salary' => 'integer',
        'languages' => 'array',
    ];

    public function scopeWithFilters($query, $request)
    {
        return
            $query
                ->when($request['age_from'], function ($query) use ($request) {
                    $query->where('age', '>=', $request['age_from']);
                })
                ->when($request['age_from'], function ($query) use ($request) {
                    $query->where('age', '<=', $request['age_to']);
                })
                ->when($request['religion'], function ($query) use ($request) {
                    $query->where('religion', $request['religion']);
                })
                ->when($request['category_id'], function ($query) use ($request) {
                    $query->where('category_id', $request['category_id']);
                })
                ->when($request['nationality_id'], function ($query) use ($request) {
                    $query->where('nationality_id', $request['nationality_id']);
                })
                ->when($request['gender'], function ($query) use ($request) {
                    $query->where('gender', $request['gender']);
                })
                ->when($request['marital_status'], function ($query) use ($request) {
                    $query->where('marital_status', $request['marital_status']);
                })
                ->when($request['keyword'], function ($query) use ($request) {
                    $keyword = $request['keyword'];
                    $query->where('name', 'like', '%' . $keyword . '%');
                });
    }


    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['faceImageUrl', 'workerImageUrl'];


    public function additional_skills(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function job(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id')->withDefault([
            'name' => ' ',
        ]);
    }

    public function nationality(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Nationality::class, 'nationality_id')->withDefault([
            'name' => ' ',
        ]);
    }

    public function orders(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function archives(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(WorkerArchives::class);
    }

    /**
     * Appends Admin Image Url
     *
     */
    public function getFaceImageUrlAttribute(): string
    {
        return asset('storage/' . $this->face_image);
    }

    /**
     * Appends Admin Image Url
     *
     */
    public function getWorkerImageUrlAttribute(): string
    {
        return asset('storage/' . $this->worker_image);
    }

    public function workerExperience(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(WorkerExperience::class, 'worker_id');
    }

}
