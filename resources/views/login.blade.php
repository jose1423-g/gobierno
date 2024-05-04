
@extends('layouts.app')

@section('title', 'Gobierno')

@section('meta_description', 'Create')

@section('content')

<main class="container px-3 pb-10 mx-auto mt-5 md:px-0">
    
    <div class="flex justify-center">
        <form class="md:w-[40%] w-[100%] p-3 mx-auto bg-white rounded-lg shadow-lg" action="{{ route('') }}" method="post"> 
            @csrf
            @if (session('status'))                
                <h3 class="text-center text-success">{{ session('status') }}</h3>            
            @endif        
            <div class="mb-5">
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="text" id="" name="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5">
            </div>
            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">password</label>
                <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5"required />
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">Login</button>           
        </form>
    </div>    
</main>

@endsection

{{-- focus:ring-blue-500 --}}
