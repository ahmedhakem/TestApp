<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'FirstName',
        'LastName',
        'Shop',
        'Company',
        'Email',
        'Phone'
    ];

    public function Shop()
    {
        return $this->belongsTo('App\Shop');
    }
}
