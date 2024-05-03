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
                    <form method="POST" action="{{ route('insertDetails') }}">
                        @csrf
                       
                        <!-- Name -->
                        <div class="mt-4">
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
            <tr>
                <th scope="row">{{ $patient->id }}</th>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->email }}</td>
                <td>
                    <a href="{{ route('addMedicalForm', ['patientId' => $patient->id]) }}" class="btn btn-primary">Edit</a>
                </td>
            </tr>
        @endforeach
        
            
        </tbody>
    </table>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Medical Form') }}
            </h2>
        </x-slot>
       
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <!-- Medical Form -->
                        <form method="POST" action="{{ route('insertMedicalForm') }}">
                            @csrf
                        
                            <!-- Patient Information -->
                            <h3 class="text-lg font-semibold mb-4">Patient Information</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <input type="hidden" name="patient_id" value="{{ $patient->id }}">
  
                                <!-- Name -->
                                <div>
                                    <x-label for="patient_name" :value="__('Patient Name')" />
                                    <x-input id="patient_name" class="block mt-1 w-full" type="text" name="patient_name" :value="old('patient_name')" required />
                                </div>
                        
                                <!-- Date of Birth -->
                                <div>
                                    <x-label for="date_of_birth" :value="__('Date of Birth')" />
                                    <x-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth" required />
                                </div>
                        
                                <!-- Gender -->
                                <div>
                                    <x-label for="gender" :value="__('Gender')" />
                                    <select id="gender" name="gender" class="block mt-1 w-full">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        
                                    </select>
                                </div>
                        
                                <!-- Address -->
                                <div>
                                    <x-label for="address" :value="__('Address')" />
                                    <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
                                </div>
                            </div>
                        
                            <!-- Medical Details -->
                            <h3 class="text-lg font-semibold my-4">Medical Details</h3>
                            <!-- Symptoms -->
                            <div>
                                <x-label for="symptoms" :value="__('Symptoms')" />
                                <textarea id="symptoms" name="symptoms" class="block mt-1 w-full" rows="3" required>{{ old('symptoms') }}</textarea>
                            </div>
                        
                            <!-- Diagnosis -->
                            <div class="mt-4">
                                <x-label for="diagnosis" :value="__('Diagnosis')" />
                                <textarea id="diagnosis" name="diagnosis" class="block mt-1 w-full" rows="3" required>{{ old('diagnosis') }}</textarea>
                            </div>
                        
                            <!-- Treatment Plan -->
                            <div class="mt-4">
                                <x-label for="treatment_plan" :value="__('Treatment Plan')" />
                                <textarea id="treatment_plan" name="treatment_plan" class="block mt-1 w-full" rows="3" required>{{ old('treatment_plan') }}</textarea>
                            </div>
                        
                            <!-- Prescription -->
                            <div class="mt-4">
                                <x-label for="prescription" :value="__('Prescription')" />
                                <textarea id="prescription" name="prescription" class="block mt-1 w-full" rows="3">{{ old('prescription') }}</textarea>
                            </div>
                        
                            <!-- Submit Button -->
                            <div class="flex items-center justify-end mt-6">
                                <x-button class="ml-4">
                                    {{ __('Submit') }}
                                </x-button>
                            </div>
                        </form>
                        
                        <!-- End Medical Form -->
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
    
</x-app-layout>