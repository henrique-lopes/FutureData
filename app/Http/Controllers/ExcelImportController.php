<?php

namespace App\Http\Controllers;

use App\Jobs\ImportFile;
use App\Models\resultado;
use Illuminate\Http\Request;


class ExcelImportController extends Controller
{
    public function index()
    {
        $resultado = resultado::all();

        $pessoaCarteira = count($resultado);

        $totalDividaCarteiras = $resultado->sum('VALOR_DIVIDA');

        $clientesPropensos = resultado::where('Problabilidade_sim', '>', 50.0)->count('Problabilidade_sim');

            $valorPerda = 2587166;
            $valorPerda = $valorPerda  * $clientesPropensos;
            //dd($valorPerda);

        if ($pessoaCarteira > 0) {
            $porcentagem = ($clientesPropensos / $pessoaCarteira) * 100;
            $porcentagem = intval($porcentagem).'%';
        } else {
            $porcentagem = 0; // Evita divisão por zero se $pessoaCarteira for zero
        }

        return view('dashboard',compact('resultado','pessoaCarteira','totalDividaCarteiras','porcentagem','valorPerda'));
    }

    public function import(Request $request)
    {
        $file = $request->file('file');

         // Salve o arquivo em disco temporário
        $filePath = $file->store('temp_imports');

        // Despache o job para processar a importação em segundo plano
        ImportFile::dispatch($filePath);
       // return redirect()->route('import')->with('success', 'Dados importados com sucesso!');
       return redirect()->route('import')->with('success', 'Dados importados com sucesso!');
    }

    public function dados()
    {
        return view('import');
    }

    public function quantidadePessoa()
    {
        $resultado = resultado::all();

        $pessoaCarteira = count($resultado);

        $totalDividaCarteiras = $resultado->sum('VALOR_DIVIDA');

        $clientesPropensos = resultado::where('Problabilidade_sim', '>', 50.0)->count('Problabilidade_sim');

            $valorPerda = 2587166;
            $valorPerda = $valorPerda  * $clientesPropensos;
            //dd($valorPerda);

        if ($pessoaCarteira > 0) {
            $porcentagem = ($clientesPropensos / $pessoaCarteira) * 100;
            $porcentagem = intval($porcentagem).'%';
        } else {
            $porcentagem = 0; // Evita divisão por zero se $pessoaCarteira for zero
        }

        return view('quantidadePessoa',compact('resultado','pessoaCarteira','totalDividaCarteiras','porcentagem','valorPerda'));
        //return view('quantidadePessoa');
    }

    public function clientesPropensos()
    {
        $resultado = resultado::all();

        $pessoaCarteira = count($resultado);

        $totalDividaCarteiras = $resultado->sum('VALOR_DIVIDA');

        $clientesPropensos = resultado::where('Problabilidade_sim', '>', 50.0)->count('Problabilidade_sim');

        $Propensos = resultado::where('Problabilidade_sim', '>', 50.0)->get();

            $valorPerda = 2587166;
            $valorPerda = $valorPerda  * $clientesPropensos;
            //dd($valorPerda);

        if ($pessoaCarteira > 0) {
            $porcentagem = ($clientesPropensos / $pessoaCarteira) * 100;
            $porcentagem = intval($porcentagem).'%';
        } else {
            $porcentagem = 0; // Evita divisão por zero se $pessoaCarteira for zero
        }

        return view('clientesPropensos',compact('resultado','pessoaCarteira','totalDividaCarteiras','porcentagem','valorPerda','Propensos'));
        //return view('quantidadePessoa');
    }


}
