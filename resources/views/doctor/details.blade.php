<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Doctor Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in as doctor!
                    <!-- Doctor Details Form -->
                    <form method="POST" action="{{ route('insertDetails') }}" enctype="multipart/form-data">
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

                        <!-- Phone -->
                        <div class="mt-4">
                            <x-label for="phone" :value="__('Phone')" />

                            <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" />
                        </div>

                        <!-- Specialization -->
                        <div class="mt-4">
                            <x-label for="specialization" :value="__('Specialization')" />

                            <x-input id="specialization" class="block mt-1 w-full" type="text" name="specialization" :value="old('specialization')" />
                        </div>

                        <!-- Address -->
                        <div class="mt-4">
                            <x-label for="address" :value="__('Address')" />

                            <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" />
                        </div>

                        <!-- City -->
                        <div class="mt-4">
                            <x-label for="city" :value="__('City')" />

                            <x-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" />
                        </div>

                        <!-- State -->
                        <div class="mt-4">
                            <x-label for="state" :value="__('State')" />

                            <x-input id="state" class="block mt-1 w-full" type="text" name="state" :value="old('state')" />
                        </div>

                        <!-- Country -->
                        <div class="mt-4">
                            <x-label for="country" :value="__('Country')" />

                            <x-input id="country" class="block mt-1 w-full" type="text" name="country" :value="old('country')" />
                        </div>

                        <!-- Postal Code -->
                        <div class="mt-4">
                            <x-label for="postal_code" :value="__('Postal Code')" />

                            <x-input id="postal_code" class="block mt-1 w-full" type="text" name="postal_code" :value="old('postal_code')" />
                        </div>

                        <!-- Profile Image -->
               
                            <x-label for="image" :value="__('Profile Image')" />
                            <input type="file" name="image" id="image" :value="old('Profile Image')" />
                   

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Submit') }}
                            </x-button>
                        </div>
                    </form>
                    <!-- End Doctor Details Form -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
