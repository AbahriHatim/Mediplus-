<link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

<form action="{{ route('insertMedicalForm', ['patientId' => $patientId]) }}" method="post">
    @csrf
    <!-- Patient Information -->
    <h3 class="text-lg font-semibold mb-4">Patient Information</h3>
    <div class="grid grid-cols-2 gap-4">
        <input type="hidden" name="patient_id" value="{{ $patientId }}">

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
<a href="{{ route('PatientListDo') }}">PatientList</a>

</table>