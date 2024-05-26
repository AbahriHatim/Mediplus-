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
            margin: 40px;
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }
        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        header .logo img {
            width: 100px; /* Adjust the size of the logo */
            height: auto;
        }
        header .header-title {
            flex-grow: 1;
            text-align: center;
        }
        header h1 {
            color: #007bff;
            margin: 0;
        }
        header p {
            color: #333;
            margin: 0;
        }
        h2 {
            color: #28a745;
            text-align: center;
            margin-bottom: 20px;
        }
        .section {
            margin-bottom: 30px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .section p {
            margin: 10px 0;
        }
        .info {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .info p {
            flex: 1 1 45%;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <?php
    // Generate a random bill number
    $billNumber = mt_rand(100000, 999999);
    ?>
    <header>
        <div class="logo">
            <a href="index.html"><img src="img/logo.png" alt="Logo"></a>
            <p style="transform: translate(400px,-37px)"><strong>Bill Number:</strong> <?php echo $billNumber; ?></p>
        </div>        
        <div class="header-title">
            <h1>Medical Form</h1>
        </div>
     
    </header> 

    <h2>Patient's Information</h2>
    <div class="section">   
        <div class="info">
            <p><strong>Patient Name:</strong> {{ $medicalForm->patient_name }}</p>
            <p><strong>Date of Birth:</strong> {{ $medicalForm->date_of_birth }}</p>
            <p><strong>Gender:</strong> {{ $medicalForm->gender }}</p>
            <p><strong>Address:</strong> {{ $medicalForm->address }}</p>
        </div>
    </div>

    <h2>Doctor's Information</h2>
    <div class="section">
        @if ($medicalForm->doctor)
            <div class="info">
                <p><strong>Name:</strong> {{ $medicalForm->doctor->name }}</p>
                <p><strong>Email:</strong> {{ $medicalForm->doctor->email }}</p>
                <p><strong>Phone:</strong> {{ $medicalForm->doctor->phone }}</p>
                <p><strong>Specialization:</strong> {{ $medicalForm->doctor->specialization }}</p>
                <p><strong>Address:</strong> {{ $medicalForm->doctor->address }}, {{ $medicalForm->doctor->city }}, {{ $medicalForm->doctor->state }}, {{ $medicalForm->doctor->country }}, {{ $medicalForm->doctor->postal_code }}</p>
            </div>
        @else
            <p>No doctor information available</p>
        @endif
    </div>

    <h2>Medical Details</h2>
    <div class="section">
        <p><strong>Symptoms:</strong> {{ $medicalForm->symptoms }}</p>
        <p><strong>Diagnosis:</strong> {{ $medicalForm->diagnosis }}</p>
        <p><strong>Treatment Plan:</strong> {{ $medicalForm->treatment_plan }}</p>
        @if ($medicalForm->prescription)
        <p><strong>Prescription:</strong> {{ $medicalForm->prescription }}</p>
        @endif
    </div>
</body>
</html>
