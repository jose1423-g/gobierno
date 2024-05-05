
@extends('layouts.app')

@section('title', 'Gobierno')

@section('meta_description', 'Create')

@section('content')

<main class="px-5">
    
    <div class="relative p-5 overflow-x-auto shadow-md sm:rounded-lg">
        <table id="table_users" class="max-w-full text-sm text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">id</th>
                    <th scope="col" class="px-6 py-3">Editar</th>
                    <th scope="col" class="px-6 py-3">User</th>              
                    <th scope="col" class="px-6 py-3">Email</th>                                        
                </tr>
            </thead>
            <tbody></tbody>
        </table> 
        <button type="button" id="btn_show_modal_user" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">New User</button>   
    </div>   
    
{{-- modal --}} 
<div id="Modal_static_users" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-30 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full p-4">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Editar registro
                </h3>
                <button type="button" id="btn_close_modal_users" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="" method="post" id="form_create_users"> 
                @csrf                  
                <div class="p-4 space-y-4 md:p-2">
                    <input type="hidden" id="id_user" name="id">{{-- input hidden --}}
                    <div class="mb-5">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">name</label>
                        <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5">
                        <span class="hidden text-red-700 hidden_msg" id="msg_error_name"></span> 
                    </div>
                    <div class="mb-5">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="text" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5">
                        <span class="hidden text-red-700 hidden_msg" id="msg_error_email"></span> 
                    </div>
                    <div class="mb-5">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">password</label>
                        <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5">
                        <span class="hidden text-red-700 hidden_msg" id="msg_error_pass"></span> 
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="password_confirmation">confirm Password</label>                            
                        <input type="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5" id="password_confirmation" name="password_confirmation">
                    </div>
                    <div class="flex items-center mb-4">
                        <input id="EsAdmin" name="EsAdmin" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        <label for="EsAdmin" class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">Permisos Para Editar</label>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">      
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Enviar</button>            
                    <button type="button" id="btn_cancelar_modal_users" class="py-2.5 px-5 ms-3 text-sm font-medium text-white focus:outline-none bg-red-700 rounded-lg border border-gray-200 hover:bg-red-500 focus:z-10 focus:ring-4 focus:ring-gray-100 ">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

</main>


@endsection

{{-- focus:ring-blue-500 --}}
