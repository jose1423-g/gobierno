
@extends('layouts.app')

@section('title', '')

@section('meta_description', '')

@section('content')



<main class="container px-3 pb-10 mx-auto mt-5 md:px-0">
    <div class="flex justify-center">
        <form class="w-[50rem] p-3 bg-white rounded-lg shadow-lg" action="" method="post" id="form-data">
            @csrf
            
            <div class="justify-around block md:flex">
                <div class="mb-3 md:w-2/4 md:mr-4">
                    <label for="Sm_Av" class="block mb-2 text-sm font-medium text-gray-900">Sm/Av.</label>
                    <input type="text" id="Sm_Av" name="Sm_Av" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500">
                </div>    
                                        
                <input type="hidden" id="Latitud" name="Latitud">
                <input type="hidden" id="Longitud" name="Longitud"> 
                               
                <div class="mb-3 md:w-2/4">
                    <label for="Id_medida" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estatus</label>
                    <select id="Id_medida" name="Id_medida" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5">                        
                    </select>
                </div>
            </div>

            <div class="justify-around block md:flex">
                <div class="mb-3 md:w-2/4 md:mr-4">
                    <label for="Circuito" class="block mb-2 text-sm font-medium text-gray-900">Circuito</label>
                    <input type="text" id="Circuito" name="Circuito" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500">
                </div>           
                <div class="mb-3 md:w-2/4 ">
                    <label for="Luminarias" class="block mb-2 text-sm font-medium text-gray-900">Luminarias instaladas</label>
                    <input type="text" id="Luminarias" name="Luminarias" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500">
                </div> 
            </div>
            
            <div class="justify-around block md:flex">
                <div class="mb-3 md:w-2/4 md:mr-4">
                    <label for="Id_lampara" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de luminaria</label>
                    <select id="Id_lampara" name="Id_lampara" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5">                        
                    </select>
                </div>

                <div class="mb-3 md:w-2/4">
                    <label for="Potencia" class="block mb-2 text-sm font-medium text-gray-900">Potencia (Watts)</label>
                    <input type="text" id="Potencia" name="Potencia" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500">
                </div>            
            </div> 
            
            <div class="justify-around block md:flex">
                <div class="mb-3 md:w-2/4 md:mr-4">
                    <label for="Etiqueta" class="block mb-2 text-sm font-medium text-gray-900">Etiqueta</label>
                    <input type="text" id="Etiqueta" name="Etiqueta" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500">
                </div>  
                          
                <div class="mb-3 md:w-2/4">
                    <label for="Tipo_poste" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de poste</label>
                    <select id="Tipo_poste" name="Tipo_poste" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5">
                        <option selected>Seleccion</option>
                        <option value="Concreto">Concreto</option>
                        <option value="Metal">Metal</option>                        
                    </select>
                </div>                
            </div>  
              
            <div class="justify-around block md:flex">
                <div class="mb-3 md:w-2/4 md:mr-4">
                    <label for="Dependencia" class="block mb-2 text-sm font-medium text-gray-900">Dependencia</label>
                    <input type="text" id="Dependencia" name="Dependencia" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500">
                </div>      
                      
                <div class="mb-3 md:w-2/4">
                    <label for="Altura" class="block mb-2 text-sm font-medium text-gray-900">Altura (metros)</label>
                    <input type="text" id="Altura" name="Altura" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500">
                </div>
            </div>   
            
            <div class="justify-around block md:flex">
                <div class="mb-3 md:w-2/4 md:mr-4">
                    <label for="RPU" class="block mb-2 text-sm font-medium text-gray-900">RPU</label>
                    <input type="text" id="RPU" name="RPU" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500">
                </div>  
                          
                <div class="mb-3 md:w-2/4">
                    <label for="Municipalizado" class="block mb-2 text-sm font-medium text-gray-900">Municipalizado</label>
                    <input type="text" id="" name="" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500">
                </div>
            </div>           
            <div class="justify-center mt-2 text-center md:flex">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 w-full md:w-2/4 me-2 mb-2 focus:outline-none" id="">Guardar</button>
            </div>                            
        </form>
    </div>      
</main>

@endsection

{{-- focus:ring-blue-500 --}}
