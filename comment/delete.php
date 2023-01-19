<?php 
include '../connection.php';

$id_topic = $_POST['id_topic'];
$image = $_POST['image']; 

$sql = "DELETE FROM comment
        WHERE
        id_topic = '$id_topic'
        ";

$result = $connect->query($sql);

if ($result){
    if ($image != ''){
        unlink("../image/comment". $image);
    }
    echo json_encode(array("success"=>true));
} else {
    echo json_encode(array("success"=>true));
}
?>