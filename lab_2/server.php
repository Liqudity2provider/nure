<html>

<form action="index.php">
    <input type="submit" value="Go to form"/>
</form>
<?php

require_once "/home/oleksandr_hrechenko/PhpstormProjects/lab_2/vendor/autoload.php";

use MongoDB\Client;


$client = new \MongoDB\Client("mongodb+srv://alex:alex281101@cluster0.gebcx.mongodb.net/?ssl=true&ssl_cert_reqs=CERT_NONE");
$db = $client->nure->test;
//var_dump($db);


if ($_POST["action"] == "nurse_list_ward") {
    $nurse_name = $_POST["name"];
    $statement = $db->find(["nurses" => [$_POST["name"]]]);
    foreach ($statement->toArray() as $data) {
        echo "Current nurse $_POST[name] is on duty in ";
        $x = json_decode(MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($data["ward"])));
        foreach($x as $ward){
            echo $ward, ", ";
        };
        echo " wards";
    }
}

if ($_POST["action"] == "nurse_department") {
    $statement = $db->find(["name_department" => $_POST["department"]]);
    echo "In department $_POST[department] working next nurses: ";
    foreach ($statement->toArray() as $data) {
        $x = json_decode(MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($data["nurses"])));
        foreach($x as $nurse){
            echo $nurse, ", ";
        };
    }
}

if ($_POST["action"] == "nurse_department_shift") {
    $statement = $db->find(["name_department" => $_POST["department"], "shift" => $_POST["shift"]]);

    echo "In department $_POST[department] and on shift $_POST[shift] are next wards: ";
    foreach ($statement->toArray() as $data) {
        $x = json_decode(MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($data["ward"])));
        foreach ($x as $ward) {
            echo $ward, ", ";
        };
        echo " wards";
    }
}


?>
</html>

