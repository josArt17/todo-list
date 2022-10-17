<?php

include ("db.php");

if (isset($_POST['save_task'])) {
    $titulo = $_POST['title'];
    $descripcion = $_POST['description'];
    
    $query = "INSERT INTO task(titulo, descripcion) VALUES ('$titulo', '$descripcion')";
    $result = mysqli_query($conexion, $query);
    if (!$result) {
        die("Query failed");
    }

    $_SESSION['message'] = 'Tarea correctamente guardada';
    $_SESSION['message_type'] = 'succes';

    header('Location: index.php');
}

?>