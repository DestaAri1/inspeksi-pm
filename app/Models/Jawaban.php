<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;

    protected $table = 'jawabans';

    protected $fillable = [
        'jawaban',
        'keterangan',
        'images',
        'id_pertanyaan',
        'id_peralatan'
    ];

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class, 'id_pertanyaan');
    }

    public function peralatan()
    {
        return $this->belongsTo(Peralatan::class, 'id_peralatan');
    }
}
