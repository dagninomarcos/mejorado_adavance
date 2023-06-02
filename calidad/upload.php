<?php
$targetDir = "/var/www/html/fotos/calidad/" . $_POST['idtask'] . "/"; // Carpeta de destino donde se guardarán las imágenes

// Verificar si la carpeta de destino existe, de lo contrario, crearla
if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true);
    chmod($targetDir, 0777);
}

// Borrar las imágenes existentes en el directorio
$existingImages = glob($targetDir . '*');
foreach ($existingImages as $file) {
    if (is_file($file)) {
        unlink($file);
    }
}

if (isset($_FILES["image"]) && !empty($_FILES["image"]["name"])) {
    $file = $_FILES["image"];
    $tmpName = $file["tmp_name"];
    $originalName = $file["name"];

    // Generar un nuevo nombre para la imagen
    $extension = pathinfo($originalName, PATHINFO_EXTENSION);
    $newName = "imagen_" . $_POST['idtask'] . "." . $extension;

    $targetPath = $targetDir . '/' . $newName;

    if (move_uploaded_file($tmpName, $targetPath)) {
        echo "Imagen subida correctamente. Nuevo nombre: " . $newName;
    } else {
        echo "Error al subir la imagen.";
    }
} else {
    echo "No se seleccionó ninguna imagen para subir.";
}
?>
