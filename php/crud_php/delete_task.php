<?php 
    include("db.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM tareas WHERE id = $id";
        $resultado = mysqli_query($conn,$query);
        if(!$resultado){
            die("Consulta fallida");
        }

        $_SESSION['message'] ='Tarea eliminada satisfactoriamente ';
        $_SESSION['message_type'] = 'danger';

        header("Location: index.php");
    }

?>