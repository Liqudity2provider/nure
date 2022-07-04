<?php

require_once "/home/oleksandr_hrechenko/PhpstormProjects/lab_2/vendor/autoload.php";

use MongoDB\Client;


$client = new \MongoDB\Client("mongodb+srv://alex:4yw22xfQgs7DDGQ@cluster0.gebcx.mongodb.net/?ssl=true&ssl_cert_reqs=CERT_NONE");
$db = $client->nure->test;


if ($_POST["action"] == "nurse_list_ward") {
    $nurse_name = $_POST["name"];
    $statement = $db->find(["nurses" => $_POST["name"]]);
    $data = json_decode(MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($statement)));
    $res_str = "";

    foreach ($statement->toArray() as $data) {
        $x = json_decode(MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($data["ward"])));
        foreach ($x as $ward) {
            error_log($ward);
            $res_str = $res_str . $ward . ", ";
        };
        error_log($res_str);
        echo "$res_str";

    }
}

if ($_POST["action"] == "nurse_department") {
    $res = [];
//    echo $_POST["department"];
    $statement = $db->find(["name_department" => $_POST["department"]]);
    foreach ($statement->toArray() as $data) {
        $x = json_decode(MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($data["nurses"])));
        foreach ($x as $nurse) {
            $res[] = $nurse;
        };
        error_log(json_encode($res));
    }
    echo json_encode($res);
}

function array_to_xml($data, &$xml_data)
{
    foreach ($data as $key => $value) {
        if (is_array($value)) {
            if (is_numeric($key)) {
                $key = 'item' . $key; //dealing with <0/>..<n/> issues
            }
            $subnode = $xml_data->addChild($key);
            array_to_xml($value, $subnode);
        } else {
            $xml_data->addChild("$key", htmlspecialchars("$value"));
        }
    }
    return $xml_data;
}

if ($_POST["action"] == "nurse_department_shift") {
    $statement = $db->find(["name_department" => $_POST["department"], "shift" => $_POST["shift"]]);
    $res_str = '';

    foreach ($statement->toArray() as $data) {
        $x = json_decode(MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($data["ward"])));
        foreach ($x as $ward) {
            $res_str .= $ward . ", ";
        };
        error_log(json_encode($res_str));

        echo $res_str;


    }
}


?>

