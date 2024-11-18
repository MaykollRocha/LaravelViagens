<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viagens extends Model
{
    use HasFactory;

    protected $fillable = [
        'renavam',
        'KmInicial',
        'KmFinal',
    ];

    // Relacionamento de uma viagem com um veículo
    public function veiculo()
    {
        return $this->belongsTo(Veiculos::class, 'renavam', 'renavam');
    }

    // Relacionamento de uma viagem com um motorista
    public function motoristas()
    {
        return $this->hasMany(Motoristas::class);
    }


}
