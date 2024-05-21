<div class="container">
    <h1>Book an Appointment</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('appointmentsStore',['doctor_id' => $doctor_id]) }}" method="POST" id="appointmentForm">
        @csrf
        <div class="form-group">
            <input type="hidden" name="doctor_id" value="{{ $doctor_id }}">
            <label for="appointment_time">Appointment Time</label>
            <input type="datetime-local" name="appointment_time" id="appointment_time" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="purpose">Purpose (optional)</label>
            <input type="text" name="purpose" id="purpose" class="form-control">
        </div>
        <input type="hidden" name="patient_id" value="{{ auth()->id() }}">
        <button type="submit" class="btn btn-primary">Book Appointment</button>
    </form>
</div>

<script>
    // Check if there are any error messages and display them as alerts
    @if ($errors->any())
        alert("{{ $errors->first() }}");
    @endif

    // Check if there is a success message and display it as an alert
    @if(session('success'))
        alert("{{ session('success') }}");
    @endif
</script>
