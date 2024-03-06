
@extends('layouts.app')

@section('title', 'El morelense')

@section('meta_description', 'El morelense cecina de yecapixtla')

@section('content')

{{-- <main class="container flex justify-center mt-4"> --}}
    <div class="relative overflow-x-auto">
        <table id="miTabla" class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>              
                <th>nombre</th>
                <th>codigo</th>
                <th><button class="">btn</button></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    
{{-- </main> --}}














@vite('resources/js/prueba.js')
@endsection