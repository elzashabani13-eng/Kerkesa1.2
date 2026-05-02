<?php
session_start();
require_once "../classes/Slider.php";

if ($_SESSION['user']['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

$slider = new Slider();

if (isset($_POST['add'])) {
    $img = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/".$img);

    $slider->add($img, $_POST['title']);
}

if (isset($_GET['delete'])) {
    $slider->delete($_GET['delete']);
}

$slides = $slider->getAll();
?>

<h1>Slider Admin</h1>

<form method="POST" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Title"><br>
    <input type="file" name="image"><br>
    <button name="add">Add Slide</button>
</form>

<hr>

<?php foreach ($slides as $s): ?>
    <div>
        <img src="../uploads/<?= $s['image'] ?>" width="120">
        <?= $s['title'] ?>
        <a href="?delete=<?= $s['id'] ?>">Delete</a>
    </div>
<?php endforeach; ?>
