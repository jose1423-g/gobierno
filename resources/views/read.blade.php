
@extends('layouts.app')

@section('title', '')

@section('meta_description', '')

@section('content')


{{-- @dump($data) --}}
<main class="px-5">
    {{-- rtl:text-right  text-left--}}
    <div class="relative p-5 overflow-x-auto shadow-md sm:rounded-lg">
        <table id="table" class="max-w-full text-sm text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">id</th>              
                    <th scope="col" class="px-6 py-3">Editar</th>
                    <th scope="col" class="px-6 py-3">Sm_Av</th>
                    <th scope="col" class="px-6 py-3">Latitud</th>
                    <th scope="col" class="px-6 py-3">Longitud</th>
                    <th scope="col" class="px-6 py-3">Circuito</th>
                    <th scope="col" class="px-6 py-3">Etiqueta</th>
                    <th scope="col" class="px-6 py-3">Luminarias</th>
                    <th scope="col" class="px-6 py-3">created_at</th>
                    <th scope="col" class="px-6 py-3">Fecha</th>
                    <th scope="col" class="px-6 py-3">NumMedidor</th>
                    <th scope="col" class="px-6 py-3">Observaciones</th>                
                </tr>
            </thead>
            <tbody></tbody>
        </table>    
    </div>

    {{-- modal --}}
    
</main>


@endsection