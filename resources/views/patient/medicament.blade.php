<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('addMed') }}" method="POST">
        @csrf
        <input type="text" name="uri" placeholder="Medicine URI" required>
        <input type="text" name="dosage" placeholder="Dosage" required>
        <input type="date" name="startDate" required>
        <input type="date" name="endDate" required>
        <button type="submit">Add Prescription</button>
    </form>

    @if(isset($medicines) && !$medicines->isEmpty())
    <ul>
        @foreach($medicines as $medicine)
     
            <li>
                <strong>Name:</strong> {{ $medicine->name }}<br>
                <strong>Form:</strong> {{ $medicine->form }}<br>
                <strong>Marketing Status:</strong> {{ $medicine->marketingStatus }}<br>
                <strong>Approval Date:</strong> {{ $medicine->approvalDate }}<br>
                <strong>Price:</strong> {{ $medicine->price }}<br>
                <strong>URI:</strong> <a href="{{ $medicine->URI }}">{{ $medicine->URI }}</a>
            </li>
        @endforeach
    </ul>
    @else
    <p>No medicines found.</p>
    @endif

</body>
</html>
