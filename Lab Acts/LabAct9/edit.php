<?php
include('database.php');

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit;
}

$stmt = $pdo->prepare('SELECT * FROM pets WHERE id=:id');
$stmt->execute(['id' => $id]);
$pet = $stmt->fetch();

if (!$pet) {
    header('Location: index.php');
    exit;
}

$errors = [];

// Pre-fill with DB data; replaced by POST data on validation error
$petName      = $_POST['petName']      ?? $pet['petName'];
$species      = $_POST['species']      ?? $pet['species'];
$breed        = $_POST['breed']        ?? $pet['breed'];
$age          = $_POST['age']          ?? $pet['age'];
$descriptions = $_POST['descriptions'] ?? $pet['descriptions'];

$isPutRequest = ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['_method'] ?? '') === 'put');

if ($isPutRequest) {

    $petName      = trim(htmlspecialchars($_POST['petName']      ?? ''));
    $species      = trim(htmlspecialchars($_POST['species']      ?? ''));
    $breed        = trim(htmlspecialchars($_POST['breed']        ?? ''));
    $age          = trim(htmlspecialchars($_POST['age']          ?? ''));
    $descriptions = trim(htmlspecialchars($_POST['descriptions'] ?? ''));

    if (empty($petName))      $errors[] = "The Pet Name field cannot be empty.";
    if (empty($species))      $errors[] = "The Species field cannot be empty.";
    if (empty($breed))        $errors[] = "The Breed field cannot be empty.";
    if (empty($age))          $errors[] = "The Age field cannot be empty.";
    if (empty($descriptions)) $errors[] = "The Description field cannot be empty.";

    if (empty($errors)) {
        $filename = $pet['petPhoto']; 

        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $file      = $_FILES['photo'];
            $uploadDir = 'uploads/';

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            $newFilename       = uniqid() . '-' . basename($file['name']);
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $fileExtension     = strtolower(pathinfo($newFilename, PATHINFO_EXTENSION));

            if (in_array($fileExtension, $allowedExtensions)) {
                if (move_uploaded_file($file['tmp_name'], $uploadDir . $newFilename)) {
                    // Delete old photo if it exists
                    if ($pet['petPhoto'] && file_exists($uploadDir . $pet['petPhoto'])) {
                        unlink($uploadDir . $pet['petPhoto']);
                    }
                    $filename = $newFilename;
                }
            } else {
                die('Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.');
            }
        }

        $sql  = 'UPDATE pets
                 SET petName=:petName, species=:species, breed=:breed,
                     age=:age, descriptions=:descriptions, petPhoto=:petPhoto
                 WHERE id=:id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'petName'      => $petName,
            'species'      => $species,
            'breed'        => $breed,
            'age'          => $age,
            'descriptions' => $descriptions,
            'petPhoto'     => $filename,
            'id'           => $id,
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
    <title>Edit Pet</title>
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

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <span class="glyphicon glyphicon-pencil"></span> Edit Pet Details
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
                            <input type="hidden" name="_method" value="put">
                            <input type="hidden" name="id" value="<?= $pet['id'] ?>">

                            <div class="form-group">
                                <label for="petName">Pet Name</label>
                                <input type="text" class="form-control" name="petName" id="petName"
                                       value="<?= htmlspecialchars($petName) ?>">
                            </div>

                            <div class="form-group">
                                <label for="species">Species</label>
                                <input type="text" class="form-control" name="species" id="species"
                                       value="<?= htmlspecialchars($species) ?>">
                            </div>

                            <div class="form-group">
                                <label for="breed">Breed</label>
                                <input type="text" class="form-control" name="breed" id="breed"
                                       value="<?= htmlspecialchars($breed) ?>">
                            </div>

                            <div class="form-group">
                                <label for="age">Age</label>
                                <input type="text" class="form-control" name="age" id="age"
                                       value="<?= htmlspecialchars($age) ?>">
                            </div>

                            <div class="form-group">
                                <label for="descriptions">Description</label>
                                <textarea class="form-control" name="descriptions" id="descriptions"
                                          rows="4"><?= htmlspecialchars($descriptions) ?></textarea>
                            </div>

                            <div class="well well-sm">
                                <div class="form-group">
                                    <label>Current Photo</label><br>
                                    <?php if ($pet['petPhoto']): ?>
                                        <img src="uploads/<?= htmlspecialchars($pet['petPhoto']) ?>"
                                             class="img-thumbnail" style="width: 120px; height: auto;" alt="Current Photo">
                                    <?php else: ?>
                                        <span class="text-muted"><i>No photo uploaded</i></span>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group" style="margin-bottom: 0;">
                                    <label for="photo">Change Pet Photo</label>
                                    <input type="file" id="photo" name="photo">
                                    <p class="help-block" style="margin-bottom: 0;">
                                        Leave blank to keep the current photo. Allowed: JPG, PNG, GIF.
                                    </p>
                                </div>
                            </div>

                            <hr>

                            <button type="submit" name="submit" class="btn btn-primary btn-block">
                                <span class="glyphicon glyphicon-ok"></span> Save Changes
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