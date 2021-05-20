<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyConverterRate extends Model
{
    use HasFactory;

    protected $table = 'currency_converter_rates';

    protected $fillable = [
        'day',
        'query',
        'rates',
        'limit'
    ];
}
