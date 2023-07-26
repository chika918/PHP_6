<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Tweet extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $guarded = ['id'];

    public static $rules = [
        'body' => 'required',
    ];
}
