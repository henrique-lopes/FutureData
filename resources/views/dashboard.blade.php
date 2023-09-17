<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

    </x-slot>

     {{-- Card's --}}
    <div>
        <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-4"> <!-- Alterado para 4 colunas -->
            <a href="{{route('quantidadePessoa')}}">
            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6"> <!-- Remova sm:w-1/2 -->
                <dt class="truncate text-sm font-medium text-gray-500">Quantidade de pessoal</dt>
                <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{$pessoaCarteira}}</dd>
            </div>
            </a>
            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6"> <!-- Remova sm:w-1/2 -->
                <dt class="truncate text-sm font-medium text-gray-500">Valor total carteiras</dt>
                <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">R$ {{ number_format($totalDividaCarteiras, 2, ',', '.') }}</dd>
            </div>
            <a href="{{route('clientesPropensos')}}">
            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6"> <!-- Remova sm:w-1/2 -->
                <dt class="truncate text-sm font-medium text-gray-500">Clientes propenso a abrir ação</dt>
                <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{$porcentagem}}</dd>
            </div>
            </a>
            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6"> <!-- Remova sm:w-1/2 -->
                <dt class="truncate text-sm font-medium text-gray-500">Possiveis perdas</dt>
                <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">R$  77.61.498,00</dd>
            </div>
            <!-- Outros cards aqui -->
        </div>
    </div>



    <div class="flex justify-center items-center h-screen -mt-48">
        <div class="bg-white shadow-md rounded-lg overflow-hidden p-2" style="width: 600px;">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="text-left py-2 px-4 font-semibold text-gray-700">
                            <span class="inline-flex items-center gap-x-1.5 rounded-full bg-blue-100 px-2 py-1 text-xs font-medium text-blue-700">
                                <svg class="h-1.5 w-1.5 fill-blue-500" viewBox="0 0 6 6" aria-hidden="true">
                                  <circle cx="3" cy="3" r="3" />
                                </svg>
                                Níveis
                              </span>
                        </th>
                        <th class="text-left py-2 px-4 font-semibold text-gray-700">
                            <span class="inline-flex items-center gap-x-1.5 rounded-full bg-green-100 px-2 py-1 text-xs font-medium text-green-700">
                                <svg class="h-1.5 w-1.5 fill-green-500" viewBox="0 0 6 6" aria-hidden="true">
                                  <circle cx="3" cy="3" r="3" />
                                </svg>
                                Sim
                              </span>
                        </th>
                        <th class="text-left py-2 px-4 font-semibold text-gray-700">
                            <span class="inline-flex items-center gap-x-1.5 rounded-full bg-red-100 px-2 py-1 text-xs font-medium text-red-700">
                                <svg class="h-1.5 w-1.5 fill-red-500" viewBox="0 0 6 6" aria-hidden="true">
                                  <circle cx="3" cy="3" r="3" />
                                </svg>
                                Não
                              </span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-gray-100">
                        <td class="py-2 px-4">1</td>
                        <td class="py-2 px-4">10%</td>
                        <td class="py-2 px-4">90%</td>
                    </tr>
                    <tr class="bg-gray-100">
                        <td class="py-2 px-4">2</td>
                        <td class="py-2 px-4">30%</td>
                        <td class="py-2 px-4">70%</td>
                    </tr>
                    <tr class="bg-gray-100">
                        <td class="py-2 px-4">3</td>
                        <td class="py-2 px-4">45%</td>
                        <td class="py-2 px-4">55%</td>
                    </tr>
                    <tr class="bg-gray-100">
                        <td class="py-2 px-4">4</td>
                        <td class="py-2 px-4">65%</td>
                        <td class="py-2 px-4">35%</td>
                    </tr>
                    <tr class="bg-gray-100">
                        <td class="py-2 px-4">5</td>
                        <td class="py-2 px-4">80%</td>
                        <td class="py-2 px-4">20%</td>
                    </tr>
                    <!-- Adicione mais linhas conforme necessário -->
                </tbody>
            </table>
        </div>
    </div>





      {{-- TABELA PRONTA --}}
      <div class="px-4 sm:px-6 lg:px-8 -mt-52">
        <div class="sm:flex sm:items-center">
        </div>
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">NOME</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">TIPO PESSOA</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">MEDIA IDADE</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">ESTADO_UF</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">VALOR DIVIDA</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">ATRASO DIVIDA DIAS</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">PROBABILIDADE NÃO</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">PROBABILIDADE SIM</th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <button type="button" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Download</button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach ($resultado as $result)
                                <tr>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$result->NOME}}</td>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$result->TIPO_PESSOA}}</td>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$result->MEDIA_IDADE}}</td>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$result->ESTADO_UF}}</td>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$result->VALOR_DIVIDA}}</td>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$result->ATRASO_DIVIDA_DIAS}}</td>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ intval($result->Probabilidade_Nao) }}%</td>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ intval($result->Problabilidade_sim) }}%</td>
                                    <!-- Adicione as colunas restantes aqui para exibir outros dados -->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
