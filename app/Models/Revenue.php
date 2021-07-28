<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    use HasFactory;
    protected $table = ['date','amount','account','customer','description','category',
    'reccuring','payment_method','reference','attachment'];
}
