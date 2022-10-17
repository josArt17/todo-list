<?php include("db.php") ?>

<?php include("./includes/header.php") ?>



<div class="container p-4">
    <div class="row">
        <div class="col-md-4 card">
        
        
        <?php if(isset($_SESSION['message'])){?>
        <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show pt-3" role="alert">
            <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
        <?php session_unset(); }?>



            <div class="card-body">
                <form action="save_task.php" method="post">
                    <div class="card-body">
                        <input type="text" name="title" class="form-control" placeholder="Nombre de la tarea" autofocus>
                    </div>
                    <div class="card-body">
                        <textarea name="description" id="" rows="2" class="form-control" placeholder="Descripcion de la tarea" autofocus></textarea>
                    </div>
                    <div class="card-body">
                        <input type="submit" value="Guardar tarea" class="btn btn-info btn-block w-100" name="save_task">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Created at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM task";
                        $result_task = mysqli_query($conexion, $query);
                        while ($row = mysqli_fetch_array($result_task)){?>
                       <tr>
                            <td><?php echo $row['titulo'] ?></td>
                            <td><?php echo $row['descripcion'] ?></td>
                            <td><?php echo $row['fecha'] ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-success">
                                <i class="bi bi-pencil-square"></i>
                                </a>

                                <a href="delete_task?id=<?php echo $row['id']?>" class="btn btn-danger">
                                <i class="bi bi-trash3-fill"></i>
                                </a>
                            </td>
                       </tr>
                        
                       <?php } ?>
                    </tbody>

                </table>
        </div>
    </div>
</div>

<?php include("./includes/footer.php") ?>


    
