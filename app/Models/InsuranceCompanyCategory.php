<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceCompanyCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'insurance_company_id',
        'main_category_id',
        'category_id',
        'discount_price_value',
        'discount_percentage_value',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function mainCategory(){
        return $this->belongsTo(Category::class,'main_category_id');
    }
}
