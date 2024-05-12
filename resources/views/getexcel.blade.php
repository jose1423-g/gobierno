
@extends('layouts.app')

@section('title', 'Gobierno')

@section('meta_description', 'Create')

@section('content')

<main class="container px-3 pb-10 mx-auto mt-5 md:px-0">
    <div class="flex justify-center">
        <form class="w-[50rem] p-3 bg-white rounded-lg shadow-lg" action="{{ route('Concentrado') }}" method="get">
            @if (isset($msg))
                <h2 class="mb-3 text-2xl font-bold text-center text-red-700">{{ $msg }}</h2>
            @endif
            @include('layouts.form_input_excel')
            <div class="justify-center mt-2 text-center md:flex">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 w-full md:w-2/4 me-2 mb-2 focus:outline-none">Descargar excel</button>                
            </div>                            
        </form>
    </div>
</main>

@endsection