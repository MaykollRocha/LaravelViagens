<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motoristas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'data_nascimento',
        'cnh',
    ];

    public function viagens()
    {
        return $this->hasOne(Viagens::class, 'cnh', 'cnh');
    }
}
