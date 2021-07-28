<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Computer extends Model

{

 use SoftDeletes;
 protected $fillable=['model','brand','date_of_manufacture','ram','processor','display',
 'accessories','warranty','description','storage','battery_capacity'];

}
