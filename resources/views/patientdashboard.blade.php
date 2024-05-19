<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Patient Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in Patient!
                </div>
            </div>
        </div>
    </div>
    @foreach (Auth::user()->notifications as $notification)

    <h1>{{$notification->data['data']}} </h1>

    
        
    @endforeach
    <button><a href="{{ route('medicament') }}">Medicament</a></button>
    
 
    <form action="{{ route('chatify') }}" method="GET">
        <button type="submit" class="btn btn-primary">Go to Chatify</button>
    </form>
    </x-app-layout>
