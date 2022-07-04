<html>

<form action="index.php">
    <input type="submit" value="Go to form"/>
</form>
<?php
$dbconn = new PDO("", "", "");

echo pathinfo();
$n_l = "\n";


if ($_POST["action"] == "new_nurse") {

    $statement = $dbconn->prepare("SELECT count(*) FROM nurse");
    $statement->execute();


    $count_models = pg_fetch_row(pg_query($dbconn, $statement))[0] or die("Cannot execute query: $statement\n");

    echo nl2br("Inserting new nurse... $n_l");

    $query = "INSERT INTO nurse (id_nurse, name, date, department, shift) VALUES (?, ?, ?, ?, ?);";
    $stmt = $dbconn->prepare($query);
    $stmt->execute([$count_models + 1, $_POST["name"], $_POST["date"], $_POST["department"], $_POST["shift"]]);
}

if ($_POST["action"] == "new_ward") {
    $statement = $dbconn->prepare("SELECT count(*) FROM ward");
    $statement->execute();
    $count_models = $statement->fetch();

    echo nl2br("Inserting new ward... $n_l");

    $query = "INSERT INTO ward (id_ward, name) VALUES (?, ?);";
    $stmt = $dbconn->prepare($query);
    $stmt->execute([$count_models + 1, $_POST["name"]]);
}

if ($_POST["action"] == "new_nurse_ward") {
    echo nl2br("Inserting new ward... $n_l");

    $query = "INSERT INTO nurse_ward (fid_nurse, fid_ward) VALUES (?, ?);";
    $stmt = $dbconn->prepare($query);
    $stmt->execute([$_POST["id_nurse"], $_POST["id_ward"]]);

}


$query = "SELECT * FROM nurse";
$stmt = $dbconn->prepare($query);
$stmt->execute();
echo nl2br("$n_l Nurses $n_l");

while ($row = $stmt->fetch()) {
    echo nl2br("$row[0] $row[1] $row[2] $row[3] $row[4] $n_l");
}

$query = "SELECT * FROM ward";
$stmt = $dbconn->prepare($query);
$stmt->execute();

echo nl2br("$n_l Wards $n_l");

while ($row = $stmt->fetch()) {
    echo nl2br("$row[0] $row[1] $row[2] $n_l");
}


echo nl2br("$n_l Nurse and wards $n_l");
$query = "SELECT * FROM nurse_ward";
$stmt = $dbconn->prepare($query);
$stmt->execute();

while ($row = $stmt->fetch()) {
    echo nl2br("$row[0] $row[1] $row[2] $n_l");
}


pg_close($dbconn);

?>
</html>

