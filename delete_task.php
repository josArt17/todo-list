<?php
include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM task WHERE id = $id";
    $result = mysqli_query($conexion, $query);
    if(!$result){
        die("No se pudo eliminar");
    }
}

$_SESSION ['message'] = "Tarea eliminada correctamente";
$_SESSION ['message_type'] = 'danger';
header('Location: index.php');
?>