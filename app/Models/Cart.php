<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'carts';
    protected $fillable = [
        'product_id',
        'price',
    ];

    public function stores()
    {
        return $this->belongsToMany('App\Models\Store');
    }

}
