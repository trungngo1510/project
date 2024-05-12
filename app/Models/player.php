<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class player extends Model
{
    use HasFactory;
    protected $table='Player2';
    public $primaryKey ='id';
    public $timestamps = false;
    protected $fillable = ['name','age','national','position','salary'];

}