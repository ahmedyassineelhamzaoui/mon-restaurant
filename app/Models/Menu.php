<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table='menus';
    protected $fillable=[
        'id',
        'menu_name',
        'menu_price',
        'menu_picture',
        'menu_description',  
    ];
}
