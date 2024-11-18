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
        'viagem_id',
    ];

    public function viagem()
    {
        return $this->belongsTo(Viagens::class);
    }
}
