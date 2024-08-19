<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Peralatan extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'peralatans';

    protected $fillable = [
        'id',
        'nama',
        'slug',
        'identitas',
        'rangka',
        'periode',
        'periode_akhir',
        'style',
        'merk',
        'keterangan',
        'pdf_status',
        'mechanic_sign',
        'safety_sign',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }

    public function jawabans()
    {
        return $this->hasMany(Jawaban::class, 'id_peralatan');
    }

    public function catatan()
    {
        return $this->hasOne(Catatan::class, 'id_peralatan');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'id_peralatan');
    }
    public function safety()
    {
        return $this->belongsTo(User::class, 'safety_sign');
    }

    public function mekanik()
    {
        return $this->belongsTo(User::class, 'mechanic_sign');
    }
    public function getImagePath()
    {
        return $this->images->isNotEmpty() ? $this->images->first()->image : 'default_image_path';
    }
}
