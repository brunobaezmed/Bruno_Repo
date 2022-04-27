<?php 
    include("db.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM tareas WHERE id= $id";
        $resultado = mysqli_query($conn,$query);
        if(mysqli_num_rows($resultado) == 1){
            $row = mysqli_fetch_array($resultado);
            $titulo = $row['titulo'];
            $descripcion = $row['descripcion'];
        }
    }   
    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];

        $query = "UPDATE tareas set titulo = '$titulo', descripcion = '$descripcion' WHERE id = $id";
         mysqli_query($conn,$query);
        $_SESSION['message'] = 'Tarea actualizada';
        $_SESSION['message_type'] = 'warning';
         header("Location: index.php");
        }
?>

<?php include("include/header.php"); ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id'];?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="titulo" value="<?php echo $titulo;?>"                        
                        class="form-control" placeholder="Actualizar Titulo">
                    </div>
                    <div class="form-group">
                        <textarea name="descripcion" rows="2" class="form-control" placeholder="Actualizar Descripcion"><?php echo $descripcion; ?></textarea>
                    </div>
                    <button class="btn btn-success" name="update">  
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>