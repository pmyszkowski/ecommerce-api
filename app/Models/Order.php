<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const STATUS_ACTIVE  = 'active';
    const STATUS_INACTIVE = 'inactive';

    const STATUS_PAID    = 'paid';
    const STATUS_UNPAID  = 'unpaid';

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'status' => self::STATUS_INACTIVE,
        'payment_status' => self::STATUS_UNPAID,
    ];

    protected $fillable = [
        'user_id',
        'total_price',
        'payment_status'
    ];

    public function user() {
        return $this->belongsTo( User::class );
    }

}
