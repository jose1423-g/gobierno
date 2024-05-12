@extends('layouts.app')

@section('title', 'offline')

@section('meta_description', 'modo offline')

@section('content')

<main class="container px-3 pb-10 mx-auto mt-5 md:px-0">    
    <h1 class="text-center text-red-700">En este momento no cuenta con conexion a internet los datos se guardaran de manera local</h1>   
    <div class="flex justify-center">             
        <form class="w-[50rem] p-3 bg-white rounded-lg shadow-lg" action="" method="get" id="form-data-offline">
            @include('layouts.form_input')
            <div class="flex justify-center mt-2 text-center">
                <button type="button" id="btn_save_data" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 w-full md:w-2/4 me-2 mb-2 focus:outline-none">Guardar</button>                
            </div>                        
        </form>
    </div>
</main>

@endsection