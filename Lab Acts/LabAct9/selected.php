<?php
include('database.php');

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: main.php');
    exit;
}

$stmt = $pdo->prepare('SELECT * FROM pets WHERE id=:id');
$stmt->execute(['id' => $id]);
$pet = $stmt->fetch();

if (!$pet) {
    header('Location: main.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Details: <?= htmlspecialchars($pet['petName']) ?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #f4f7f6;
            padding-top: 40px;
            padding-bottom: 40px;
        }
        .description-text {
            font-size: 16px;
            line-height: 1.6;
            margin-top: 10px;
        }
        .detail-label {
            font-weight: bold;
            color: #555;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <span class="glyphicon glyphicon-info-sign"></span> Pet Information
                        </h3>
                    </div>

                    <div class="panel-body">
                        <div class="row">

                            <div class="col-md-4 text-center">
                                <?php if ($pet['petPhoto']): ?>
                                    <img src="uploads/<?= htmlspecialchars($pet['petPhoto']) ?>"
                                         class="img-thumbnail img-responsive"
                                         alt="<?= htmlspecialchars($pet['petName']) ?>">
                                <?php else: ?>
                                    <div class="well"><i>No photo available</i></div>
                                <?php endif; ?>
                            </div>

                            <div class="col-md-8">
                                <h2 style="margin-top: 0; color: #333;">
                                    <strong><?= htmlspecialchars($pet['petName']) ?></strong>
                                </h2>

                                <p>
                                    <span class="detail-label">Species:</span>
                                    <?= htmlspecialchars($pet['species']) ?>
                                </p>
                                <p>
                                    <span class="detail-label">Breed:</span>
                                    <?= htmlspecialchars($pet['breed']) ?>
                                </p>
                                <p>
                                    <span class="detail-label">Age:</span>
                                    <?= htmlspecialchars($pet['age']) ?>
                                </p>

                                <div class="description-text">
                                    <span class="detail-label">Description:</span>
                                    <p><?= nl2br(htmlspecialchars($pet['descriptions'])) ?></p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="panel-footer">

                        <a href="index.php#products" class="btn btn-default">
                            <span class="glyphicon glyphicon-arrow-left"></span> Back to Main
                        </a>

                        <div class="pull-right">
                            <a href="edit.php?id=<?= $pet['id'] ?>" class="btn btn-primary">
                                <span class="glyphicon glyphicon-pencil"></span> Edit
                            </a>

                            <form action="delete.php" method="POST"
                                  style="display: inline-block;"
                                  onsubmit="return confirm('Are you sure you want to delete this pet? This cannot be undone!');">
                                <input type="hidden" name="_method" value="delete">
                                <input type="hidden" name="id" value="<?= $pet['id'] ?>">
                                <button type="submit" name="submit" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash"></span> Delete
                                </button>
                            </form>
                        </div>

                        <div class="clearfix"></div>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>