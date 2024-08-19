<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catatan extends Model
{
    use HasFactory;

    protected $table = 'catatans';

    protected $fillable = [
        'catatan',
        'user_id',
        'id_peralatan',
    ];
}
