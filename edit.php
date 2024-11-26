<?php
include 'db.php';

$id = $_GET['id'];
$query = $conn->prepare("SELECT * FROM students WHERE id = ?");
$query->execute([$id]);
$student = $query->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $course_section = $_POST['course_section'];

    $stmt = $conn->prepare("UPDATE students SET firstname = ?, middlename = ?, lastname = ?, age = ?, address = ?, course_section = ? WHERE id = ?");
    $stmt->execute([$firstname, $middlename, $lastname, $age, $address, $course_section, $id]);

    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Edit Student</title>
</head>
<body>
    <h1>Edit Student</h1>
    <form method="POST">
        <input type="text" name="firstname" value="<?= $student['firstname']; ?>" required>
        <input type="text" name="middlename" value="<?= $student['middlename']; ?>">
        <input type="text" name="lastname" value="<?= $student['lastname']; ?>" required>
        <input type="number" name="age" value="<?= $student['age']; ?>" required>
        <textarea name="address" required><?= $student['address']; ?></textarea>
        <input type="text" name="course_section" value="<?= $student['course_section']; ?>" required>
        <button type="submit">Update</button>
    </form>
</body>
</html>
