<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viagens extends Model
{
    use HasFactory;

    protected $fillable = [
        'renavam',
        'cnh',
        'KmInicial',
        'KmFinal',
    ];

    // Relacionamento de uma viagem com um veículo
    public function veiculo()
    {
        return $this->belongsTo(Veiculos::class, 'renavam', 'renavam');
    }

    // Relacionamento de uma viagem com um motorista
    public function motorista()
    {
        return $this->belongsTo(Motoristas::class, 'cnh', 'cnh');
    }

}
