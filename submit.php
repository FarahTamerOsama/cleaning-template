<?php
// استقبال البيانات من النموذج
$name = $_POST['name'];
$email = $_POST['email'];
$service = $_POST['service'];
$date = $_POST['date'];

// الاتصال بقاعدة البيانات
$conn = new mysqli("localhost", "root", "", "cleaning_db");

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// حفظ البيانات
$sql = "INSERT INTO bookings (name, email, service, date) 
        VALUES ('$name', '$email', '$service', '$date')";

if ($conn->query($sql) === TRUE) {
    header("Location: confirmation.html"); // بعد الحجز يروح لصفحة التأكيد
    exit();
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>