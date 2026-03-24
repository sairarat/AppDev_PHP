<?php
include('database.php');

$isDeleteRequest = ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['_method'] ?? '') === 'delete');

if ($isDeleteRequest) {
    $id = $_POST['id'] ?? null;

    if ($id) {
        // Fetch the pet first so we can delete its image file too
        $stmt = $pdo->prepare('SELECT petPhoto FROM pets WHERE id=:id');
        $stmt->execute(['id' => $id]);
        $pet = $stmt->fetch();

        if ($pet && $pet['petPhoto']) {
            $photoPath = 'uploads/' . $pet['petPhoto'];
            if (file_exists($photoPath)) {
                unlink($photoPath); // Delete the photo from the database
            }
        }

        
        $stmt = $pdo->prepare('DELETE FROM pets WHERE id=:id');
        $stmt->execute(['id' => $id]);
    }

    header('Location: index.php');
    exit;
}