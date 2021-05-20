<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';

    protected $fillable = [
        'name',
        'currency',
        'is_show'
    ];

    public function scopeGetCurrency($query)
    {
        return $query->select('currency')->orderBy('currency', 'asc')->distinct();
    }
}
