<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $course_section = $_POST['course_section'];

    $stmt = $conn->prepare("INSERT INTO students (firstname, middlename, lastname, age, address, course_section) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$firstname, $middlename, $lastname, $age, $address, $course_section]);

    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Add New Student</title>
</head>
<body>
    <h1>Add New Student</h1>
    <form method="POST">
        <input type="text" name="firstname" placeholder="First Name" required>
        <input type="text" name="middlename" placeholder="Middle Name">
        <input type="text" name="lastname" placeholder="Last Name" required>
        <input type="number" name="age" placeholder="Age" required>
        <textarea name="address" placeholder="Address" required></textarea>
        <input type="text" name="course_section" placeholder="Course & Section" required>
        <button type="submit">Save</button>
    </form>
</body>
</html>
