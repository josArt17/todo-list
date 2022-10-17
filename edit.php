<?php
include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id = $id";
    $result = mysqli_query($conexion, $query);
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        $title = $row['titulo'];
        $description = $row['descripcion'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "UPDATE task SET titulo = '$title', descripcion = '$description' WHERE id = '$id'";
    mysqli_query($conexion, $query);


    $_SESSION['message'] = "Tarea actualizada correctamente";
    $_SESSION['message_type'] = "info";
    header("Location: index.php");
}

?>

<?php include("./includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id'];?>" method="POST">
                    <div class="card-body">
                        <input type="text" name="title" value="<?php echo $title;?>" class="form-control" placeholder="Editar titulo">
                    </div>
                    <div class="card-body">
                        <textarea name="description" id="" rows="2" class="form-control" placeholder="Editar descripcion"><?php echo $description;?></textarea>
                    </div>
                    <div class="card-body">
                        <input type="submit" name="update" class="btn btn-info btn-block w-100" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("./includes/footer.php") ?>

