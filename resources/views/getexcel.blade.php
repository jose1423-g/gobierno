
@extends('layouts.app')

@section('title', '')

@section('meta_description', '')

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
        
    </div>    
    
</main>
@endsection