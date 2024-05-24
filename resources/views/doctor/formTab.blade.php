<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mediplus - Free Medical and Doctor Directory HTML Template</title>
    <link rel="icon" href="../../img/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/normalize.css">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../css/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/icofont.css">
</head>
<body>
    <header class="header">
        <div class="header-inner">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-12">
                            <div class="logo">
                                <a href="index.html"><img src="../../img/logo.png" alt="#"></a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-9 col-12">
                            <div class="main-menu">
                                <nav class="navigation">
                                    <ul class="nav menu">
                                        <li><a href="{{ route('doctordashboard') }}" style="text-decoration: none;">Home</a></li>
                                        <li class="active"><a href="{{ route('PatientListDo') }}" style="text-decoration: none;">Patient List</a></li>
                                        <li ><a href="{{ route('showSchedule') }}" style="text-decoration: none;">Schedule</a></li>

                                        <li><a href="{{ route('chatify') }}" style="text-decoration: none;">Messageri <i class="fa fa-comment" aria-hidden="true"></i></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-2 col-12">
                            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block" style="color: white">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();" class="btn" style="background-color: #1a68b3;">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                                <a href="{{ route('profile') }}" style="background-color: #1a68b3; transform: translate(-120%, -100%); padding-top: 8px" class="btn">Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="formbold-form-wrapper">
        <div class="form-container">
            <div class="form-header">
                <h3 class="form-header-title">Medical Form</h3>
            </div>
    
            <form action="{{ route('insertMedicalForm', ['patientId' => $patientId]) }}" method="post" class="medical-form">
                @csrf
                <!-- Patient Information -->
                <div>        <input type="hidden" name="patient_id" value="{{ $patientId }}">
                
                <div class="form-input">
                    <label for="patient_name" class="form-label">Patient Name</label>
                    <input id="patient_name" type="text" name="patient_name" value="{{ old('patient_name') }}" class="form-input-field" required>
                </div>
    
                <div class="form-input">
                    <label for="date_of_birth" class="form-label">Date of Birth</label>
                    <input id="date_of_birth" type="date" name="date_of_birth" class="form-input-field" required>
                </div>
    
                <div class="form-input">
                    <label for="gender" class="form-label">Gender</label>
                    <select id="gender" name="gender" class="form-input-field" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
    
                <div class="form-input">
                    <label for="address" class="form-label">Address</label>
                    <input id="address" type="text" name="address" value="{{ old('address') }}" class="form-input-field" required>
                </div>
    
                <!-- Medical Details -->
                <div class="form-input">
                    <label for="symptoms" class="form-label">Symptoms</label>
                    <textarea id="symptoms" name="symptoms" rows="3" class="form-input-field" required>{{ old('symptoms') }}</textarea>
                </div>
    
                <div class="form-input">
                    <label for="diagnosis" class="form-label">Diagnosis</label>
                    <textarea id="diagnosis" name="diagnosis" rows="3" class="form-input-field" required>{{ old('diagnosis') }}</textarea>
                </div>
    
                <div class="form-input">
                    <label for="treatment_plan" class="form-label">Treatment Plan</label>
                    <textarea id="treatment_plan" name="treatment_plan" rows="3" class="form-input-field" required>{{ old('treatment_plan') }}</textarea>
                </div>
    
                <div class="form-input">
                    <label for="prescription" class="form-label">Prescription</label>
                    <textarea id="prescription" name="prescription" rows="3" class="form-input-field">{{ old('prescription') }}</textarea>
                </div>
    
                <!-- Submit Button -->
                <div class="form-submit">
                    <button type="submit" class="form-submit-button">Submit</button>
                </div>
            </div>
            </form>
        </div>

    </div>
<style>
/* Body */


/* Form Container */
.form-container {
    max-width: 700px;
    margin: 0 auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

/* Form Header */
.form-header {
    text-align: center;
    margin-bottom: 20px;
}

.form-header h3 {
    font-size: 1.5rem;
    font-weight: 600;
    color: #333333;
}

/* Form Inputs */
.form-input {
    margin-bottom: 20px;
}

.form-input label {
    font-size: 1rem;
    font-weight: 500;
    color: #333333;
    display: block;
    margin-bottom: 5px;
}

.form-input input[type="text"],
.form-input input[type="date"],
.form-input select,
.form-input textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #dddddd;
    border-radius: 5px;
    background-color: #ffffff;
    font-size: 1rem;
    color: #333333;
    outline: none;
    transition: border-color 0.3s ease;
}

.form-input input[type="text"]:focus,
.form-input input[type="date"]:focus,
.form-input select:focus,
.form-input textarea:focus {
    border-color: #6a64f1;
}

/* Submit Button */
.form-submit {
    text-align: center;
}

.form-submit button {
    padding: 12px 40px;
    border: none;
    border-radius: 5px;
    background-color: #1a68b3;
    color: #ffffff;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.form-submit button:hover {
    background-color: #524af0;
}


</style>
</table>
</body>
</html>
