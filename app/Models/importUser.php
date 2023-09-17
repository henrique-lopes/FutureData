<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class importUser extends Model
{
    use HasFactory;
    protected $table = 'importada_usuarios';
    protected $guarded = [];
}
