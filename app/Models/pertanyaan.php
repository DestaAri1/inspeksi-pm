<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pertanyaan extends Model
{
    use HasFactory;

    protected $table = 'pertanyaans';

    protected $fillable = [
        'komponen',
        'kondisi',
        'regulasi',
        'nama_peralatan'
    ];

    public function jawabans()
    {
        return $this->hasMany(Jawaban::class, 'id_pertanyaan');
    }
}
