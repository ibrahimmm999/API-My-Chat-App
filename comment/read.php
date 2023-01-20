<?php 
include '../connection.php';

$id_topic = $_POST['id_topic'];

$sql = "SELECT * FROM comment
        WHERE
        id_topic = '$id_topic'
        ";

$result = $connect->query($sql);

if ($result->num_rows > 0){
    $data = array();
    while($get_row = $result->fetch_assoc()){
        $from_id_user = $get_row['from_id_user'];
        $sql_from_user = "SELECT * FROM user
                        WHERE
                        id = '$from_id_user'
                        ";
        
        $result_from_user = $connect->query($sql_from_user);
        $from_user = array();
        while($row_user = $result_from_user->fetch_assoc()){
            $from_user[] = $row_user;
        }
        $get_row['from_user'] = $from_user[0];
        $to_id_user = $get_row['to_id_user'];
        $sql_to_user = "SELECT * FROM user
                        WHERE
                        id = '$to_id_user'
                        ";
        $result_to_user = $connect->query($sql_to_user);
        $to_user = array();
        while($row_user = $result_to_user->fetch_assoc()){
            $to_user[] = $row_user;
        }
        $get_row['to_user'] = $to_user[0];
        $data[] = $get_row;
    }
    echo json_encode(array(
        "success"=>true,
        "data"=>$data
    ));
}else{
    echo json_encode(array(
        "success"=>false,
        "data"=>[]
    ));
}
?>