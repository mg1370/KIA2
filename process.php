<?php
// Database connection
$servername = "localhost";
$username = "root";  // Use your MySQL username
$password = "";  // Use your MySQL password
$dbname = "hypertension";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect POST data from the form
$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];
$systolic = $_POST['systolic'];
$diastolic = $_POST['diastolic'];
$conditions = $_POST['conditions'];
$bmi = $_POST['bmi'];

// Basic diagnosis logic
$diagnosis = '';
if ($systolic >= 180 || $diastolic >= 120) {
    $diagnosis = 'Hypertensive Crisis: Immediate medical attention needed.';
} elseif ($systolic >= 140 || $diastolic >= 90) {
    $diagnosis = 'Stage 2 Hypertension: Consult your doctor soon.';
} elseif ($systolic >= 130 || $diastolic >= 80) {
    $diagnosis = 'Stage 1 Hypertension: Lifestyle changes recommended.';
} elseif ($systolic >= 120 && $diastolic < 80) {
    $diagnosis = 'Elevated Blood Pressure: Monitor your health.';
} else {
    $diagnosis = 'Normal Blood Pressure.';
}

// Insert data into the database
$sql = "INSERT INTO users (name, email, age, systolic, diastolic, conditions, bmi, diagnosis)
VALUES ('$name', '$email', '$age', '$systolic', '$diastolic', '$conditions', '$bmi', '$diagnosis')";

if ($conn->query($sql) === TRUE) {
    echo "Diagnosis: " . $diagnosis;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
