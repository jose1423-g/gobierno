
@extends('layouts.app')

@section('title', '')

@section('meta_description', '')

@section('content')

<main class="container px-3 pb-10 mx-auto mt-5 md:px-0">
    <div class="flex justify-center">
        <form class="w-[50rem] p-3 bg-white rounded-lg shadow-lg" action="" method="post" id="">
            @csrf
            <div class="justify-around block md:flex">
                <div class="mb-3 md:w-2/4 md:mr-4">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900">Sm/Av.</label>
                    <input type="text" id="" name="" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500">
                </div>            
                <div class="mb-3 md:w-2/4">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estatus</label>
                    <select id="" name="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5">
                    <option selected>Choose a country</option>
                    <option value="US">United States</option>
                    <option value="CA">Canada</option>
                    <option value="FR">France</option>
                    <option value="DE">Germany</option>
                    </select>
                </div>
            </div>
            <div class="justify-around block md:flex">
                <div class="mb-3 md:w-2/4 md:mr-4">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900">Circuito</label>
                    <input type="text" id="" name="" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500">
                </div>           
                <div class="mb-3 md:w-2/4 ">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900">Luminarias instaladas</label>
                    <input type="text" id="" name="" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500">
                </div> 
            </div>
            <div class="justify-around block md:flex">
                <div class="mb-3 md:w-2/4 md:mr-4">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de luminaria</label>
                    <select id="" name="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5">
                    <option selected>Choose a country</option>
                    <option value="US">United States</option>
                    <option value="CA">Canada</option>
                    <option value="FR">France</option>
                    <option value="DE">Germany</option>
                    </select>
                </div>
                <div class="mb-3 md:w-2/4">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900">Potencia (Watts)</label>
                    <input type="text" id="" name="" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500">
                </div>            
            </div> 
            <div class="justify-around block md:flex">
                <div class="mb-3 md:w-2/4 md:mr-4">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900">Etiqueta</label>
                    <input type="text" id="" name="" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500">
                </div>            
                <div class="mb-3 md:w-2/4">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de poste</label>
                    <select id="" name="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5">
                    <option selected>Choose a country</option>
                    <option value="US">United States</option>
                    <option value="CA">Canada</option>
                    <option value="FR">France</option>
                    <option value="DE">Germany</option>
                    </select>
                </div>
            </div>    
            <div class="justify-around block md:flex">
                <div class="mb-3 md:w-2/4 md:mr-4">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900">Dependencia</label>
                    <input type="text" id="" name="" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500">
                </div>            
                <div class="mb-3 md:w-2/4">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900">Altura (metros)</label>
                    <input type="text" id="" name="" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500">
                </div>
            </div>   
            <div class="justify-around block md:flex">
                <div class="mb-3 md:w-2/4 md:mr-4">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900">RPU</label>
                    <input type="text" id="" name="" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500">
                </div>            
                <div class="mb-3 md:w-2/4">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900">Municipalizado</label>
                    <input type="text" id="" name="" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500">
                </div>
            </div>           
            <div class="justify-center mt-2 text-center md:flex">
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 w-full md:w-2/4 me-2 mb-2 focus:outline-none" id="">Guardar</button>
            </div>                            
        </form>
    </div>      
</main>

@endsection

{{-- focus:ring-blue-500 --}}
