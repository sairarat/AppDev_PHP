<?php
include('database.php');

$errors       = [];
$petName      = '';
$species      = '';
$breed        = '';
$age          = '';
$descriptions = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    $petName      = htmlspecialchars($_POST['petName']      ?? '');
    $species      = htmlspecialchars($_POST['species']      ?? '');
    $breed        = htmlspecialchars($_POST['breed']        ?? '');
    $age          = htmlspecialchars($_POST['age']          ?? '');
    $descriptions = htmlspecialchars($_POST['descriptions'] ?? '');

    if (empty(trim($petName)))      $errors[] = "The Pet Name field cannot be empty.";
    if (empty(trim($species)))      $errors[] = "The Species field cannot be empty.";
    if (empty(trim($breed)))        $errors[] = "The Breed field cannot be empty.";
    if (empty(trim($age)))          $errors[] = "The Age field cannot be empty.";
    if (empty(trim($descriptions))) $errors[] = "The Description field cannot be empty.";

    if (!isset($_FILES['photo']) || $_FILES['photo']['error'] === UPLOAD_ERR_NO_FILE) {
        $errors[] = "Please upload a Pet Photo.";
    }

    if (empty($errors)) {
        $filename = null;

        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $file      = $_FILES['photo'];
            $uploadDir = 'uploads/';

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            $filename          = uniqid() . '-' . basename($file['name']);
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $fileExtension     = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

            if (in_array($fileExtension, $allowedExtensions)) {
                if (!move_uploaded_file($file['tmp_name'], $uploadDir . $filename)) {
                    die('Failed to move uploaded file.');
                }
            } else {
                die('Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.');
            }
        }

        $sql  = 'INSERT INTO pets (petName, species, breed, age, descriptions, petPhoto)
                 VALUES (:petName, :species, :breed, :age, :descriptions, :petPhoto)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'petName'      => $petName,
            'species'      => $species,
            'breed'        => $breed,
            'age'          => $age,
            'descriptions' => $descriptions,
            'petPhoto'     => $filename,
        ]);

        header('Location: index.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Pet</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #f4f7f6;
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <span class="glyphicon glyphicon-heart"></span> Add a New Pet
                        </h3>
                    </div>
                    <div class="panel-body">

                        <?php if (!empty($errors)): ?>
                            <div class="alert alert-danger">
                                <strong><span class="glyphicon glyphicon-exclamation-sign"></span> Please fix the following errors:</strong>
                                <ul style="margin-bottom: 0; padding-left: 20px; margin-top: 10px;">
                                    <?php foreach ($errors as $error): ?>
                                        <li><?= $error ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <form method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="petName">Pet Name</label>
                                <input type="text" class="form-control" name="petName" id="petName"
                                       value="<?= htmlspecialchars($petName) ?>"
                                       placeholder="e.g., Buddy">
                            </div>

                            <div class="form-group">
                                <label for="species">Species</label>
                                <input type="text" class="form-control" name="species" id="species"
                                       value="<?= htmlspecialchars($species) ?>"
                                       placeholder="e.g., Dog, Cat, Bird">
                            </div>

                            <div class="form-group">
                                <label for="breed">Breed</label>
                                <input type="text" class="form-control" name="breed" id="breed"
                                       value="<?= htmlspecialchars($breed) ?>"
                                       placeholder="e.g., Golden Retriever">
                            </div>

                            <div class="form-group">
                                <label for="age">Age</label>
                                <input type="text" class="form-control" name="age" id="age"
                                       value="<?= htmlspecialchars($age) ?>"
                                       placeholder="e.g., 2 years">
                            </div>

                            <div class="form-group">
                                <label for="descriptions">Description</label>
                                <textarea class="form-control" name="descriptions" id="descriptions"
                                          rows="4"
                                          placeholder="Describe the pet's personality, health, etc."><?= htmlspecialchars($descriptions) ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="photo">Pet Photo</label>
                                <input type="file" id="photo" name="photo">
                                <p class="help-block">Allowed files: JPG, JPEG, PNG, GIF.</p>
                            </div>

                            <hr>

                            <button type="submit" name="submit" class="btn btn-success btn-block">
                                <span class="glyphicon glyphicon-floppy-disk"></span> Save Pet
                            </button>
                            <a href="index.php#products" class="btn btn-default btn-block">Cancel and go back</a>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>