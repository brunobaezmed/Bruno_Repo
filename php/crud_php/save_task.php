<?php
include("db.php");

if(isset($_POST['save_task'])){
    $titulo = $_POST['title'];
    $description = $_POST['description'];
    
    $query = "INSERT INTO tareas(titulo,descripcion) VALUES ('$titulo', '$description')";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("Query Failed");
    }
    $_SESSION['message'] = 'Task Saved succesfully';
    $_SESSION['message_type'] ='success';
    


    header("Location: index.php");
}   
?>