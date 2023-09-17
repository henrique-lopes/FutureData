<?php

namespace App\Imports;


use App\Models\importUser;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel,WithHeadingRow
{

    public function model(array $row)
    {
        Log::info('model method called with data: ' . json_encode($row));
        // Mapeie os campos do Excel para os campos do seu modelo
        return new importUser([
            'tipoPessoa' => $row['tipoPessoa'],
            'atrasoDividaDias' => $row['atrasoDividaDias'],
            'faixaAtrasoDividaAnos' => $row['faixaAtrasoDividaAnos'],
            'faixaIdadeCliente' => $row['faixaIdadeCliente'],
            'portifolio' => $row['portifolio'],
            'estadoUF' => $row['estadoUF'],
            'regiaoDevedor' => $row['regiaoDevedor'],
            'statusDivida' => $row['statusDivida'],
            'valorDivida' => $row['valorDivida'],
            'Processo' => $row['Processo'],
            'idEstadoUF' => $row['idEstadoUF'],
        ]);
    }
}

