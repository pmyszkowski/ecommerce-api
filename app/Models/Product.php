<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'active'
    ];

    public function getFormattedPriceAttribute() {
        return number_format($this->price / 100, 2 );
    }

    public function scopeActive($query) {
        return $query->where('active', 1);
    }

}
