<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Check if the order is shipped.
     *
     * @return bool
     */
    public function isShipped()
    {
        return $this->status === 'shipped';
    }
}
