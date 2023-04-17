<?php
include("login.php");
include("storedata.php");


if($con && mysqli_num_rows($rs) === 1){
    $db = $con;
$table = "contact";
$columns = ['firstname', 'lastname', 'email', 'message'];

$fetchData = fetch_data($db, $table, $columns);

function fetch_data ($db, $table, $columns) {
 if (empty ($db)){
    echo "Database Connection Error";
 } elseif(empty($table)){
    echo "Table Empty";
 }else{
    $columnsname = implode(", ", $columns);
    $query = "SELECT ".$columnsname. "FROM $table" ."ORDER BY firstname DESC";
    $result = $db->query($query);

    if($result==true){
        $rows = mysqli_fetch_all($result, MYSQL_ASSOC);
        $msg = $rows;
    }
 }
}
return $msg;
}

?>