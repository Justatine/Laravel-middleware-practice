<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $fillable = [
        'idno',
        'name',
        'email',
        'password',
        'usertype'
    ];
    
    protected $primaryKey = 'id';
    public $guarded = ['id'];
}
