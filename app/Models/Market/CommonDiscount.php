<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommonDiscount extends Model
{
    protected $table = 'common_discount';

    use HasFactory , SoftDeletes;

    protected $fillable = [ 'title' , 'percentage' , 'discount_ceiling' , 'minimal_order_amount' , 'start_date' , 'end_date' , 'status' ];
}
