<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    const ADQUIRENTE =
    [
        'rede' => 'Rede',
        'cielo' => 'Cielo',
        'getnet' => 'GetNet',
        'stone' => 'Stone',
    ];

    const ARCHIVES =
    [
        'contrato_social' => 'Contrato Social Consolidado* (atualizado, em doc, docx ou pdf):',
        'rg' => 'RG do Responsável*:',
        'cpf' => 'CPF do Responsável*:',
        'cnh' => 'CNH do Responsável*:',
        'comprovante_residencia' => 'Comprovante de residência do Responsável*:',
        'pdgads' => 'PDGADS*',
    ];
}
