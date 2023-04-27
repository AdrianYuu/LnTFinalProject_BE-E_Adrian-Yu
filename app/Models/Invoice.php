<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';
    
    protected $fillable = [
        'name',
        'address',
        'postal_code',
        'no_invoice',
        'total_price',
    ];
}
