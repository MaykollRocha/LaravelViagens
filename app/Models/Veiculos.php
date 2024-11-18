<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculos extends Model
{
    use HasFactory;

    protected $fillable = [
        'modelo',
        'ano',
        'data_aquisicao',
        'kms_rodados_aquisicao',
        'renavam',
    ];

    // Método para validar se o renavam existe na tabela
    public static function validateRenavam($renavam)
    {
        return self::where('renavam', $renavam)->exists();
    }

    // Relacionamento de um veiculo com muitas viagens
    public function viagens()
    {
        return $this->hasOne(Viagens::class, 'renavam', 'renavam');
    }
}
