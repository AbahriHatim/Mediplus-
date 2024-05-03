<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Form PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            color: #333; /* Set text color */
        }
        h1 {
            color: #007bff; /* Set title color */
        }
        h2 {
            color: #28a745; /* Set section heading color */
            margin-top: 20px;
        }
        p {
            color: #6c757d; /* Set text color for paragraphs */
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <?php
    // Generate a random bill number
    $billNumber = mt_rand(100000, 999999);
    ?>
    <h1>Medical Form</h1>
    <p>Bill Number: <?php echo $billNumber; ?></p>
    <p>Patient Name: {{ $medicalForm->patient_name }}</p>
    <p>Date of Birth: {{ $medicalForm->date_of_birth }}</p>
    <p>Gender: {{ $medicalForm->gender }}</p>
    <p>Address: {{ $medicalForm->address }}</p>
   
    <!-- Display Doctor's Information -->
    <h2>Doctor's Information</h2>
    @if ($medicalForm->doctor)
        <p>Name: {{ $medicalForm->doctor->name }}</p>
        <p>Email: {{ $medicalForm->doctor->email }}</p>
        <p>Phone: {{ $medicalForm->doctor->phone }}</p>
        <p>Specialization: {{ $medicalForm->doctor->specialization }}</p>
        <p>Address: {{ $medicalForm->doctor->address }}, {{ $medicalForm->doctor->city }}, {{ $medicalForm->doctor->state }}, {{ $medicalForm->doctor->country }}, {{ $medicalForm->doctor->postal_code }}</p>
    @else
        <p>No doctor information available</p>
    @endif
    <!-- Medical Details -->
    <h2>Medical Details</h2>
    <p>Symptoms: {{ $medicalForm->symptoms }}</p>
    <p>Diagnosis: {{ $medicalForm->diagnosis }}</p>
    <p>Treatment Plan: {{ $medicalForm->treatment_plan }}</p>
    @if ($medicalForm->prescription)
    <p>Prescription: {{ $medicalForm->prescription }}</p>
    @endif
</body>
</html>
