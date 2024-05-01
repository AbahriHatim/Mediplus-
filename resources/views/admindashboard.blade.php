<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in as admin!
                    <a href="{{ route('addDoctor') }}">Add Doctor</a>
<!-- Update the link for "Add Doctor" -->
<a href="{{ route('PatientList') }}">PatientList</a>

<!-- Remove the extra link for "Add Doctor" and "DoctorList" -->
<a href="{{ route('DoctorList') }}">Doctor List</a>

                </div>
                <x-guest-layout>
                    <x-auth-card>
                        <x-slot name="logo">
                            <a href="/">
                                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                            </a>
                        </x-slot>
                
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                
                        <form method="POST" action="{{ route('admin.insertDoctor') }}">
                            @csrf
                
                            <!-- Name -->
                            <div>
                                <x-label for="name" :value="__('Name')" />
                
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                            </div>
                
                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-label for="email" :value="__('Email')" />
                
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                            </div>
                
                            <!-- Password -->
                            <div class="mt-4">
                                <x-label for="password" :value="__('Password')" />
                
                                <x-input id="password" class="block mt-1 w-full"
                                                type="password"
                                                name="password"
                                                required autocomplete="new-password" />
                            </div>
                
                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <x-label for="password_confirmation" :value="__('Confirm Password')" />
                
                                <x-input id="password_confirmation" class="block mt-1 w-full"
                                                type="password"
                                                name="password_confirmation" required />
                            </div>
                
                            <div class="flex items-center justify-end mt-4">
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                                </a>
                
                                <x-button class="ml-4">
                                    {{ __('Register') }}
                                </x-button>
                            </div>
                        </form>
                    </x-auth-card>
                </x-guest-layout>
             
                     
                  
                     
                            
                
            </div>
        </div>
    </div>
</x-app-layout>
