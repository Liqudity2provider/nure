<html>

<form action="index.php">
    <input type="submit" value="Go to form"/>
</form>
<?php
$host = '';
$port = 5432;
$dbname = '';
$user = '';
$password = '';
$dbconn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

echo pathinfo();
$n_l = "\n";


if ($_POST["action"] == "new_nurse") {
    $query = "SELECT count(*) FROM nurse";
    $count_models = pg_fetch_row(pg_query($dbconn, $query))[0] or die("Cannot execute query: $query\n");

    echo nl2br("Inserting new nurse... $n_l");
    $query = "INSERT INTO nurse (id_nurse, name, date, department, shift) VALUES ($count_models + 1, '$_POST[name]','$_POST[date]', '$_POST[department]', '$_POST[shift]');";
    $rs = pg_query($dbconn, $query) or die("Cannot execute query: $query\n");
}

if ($_POST["action"] == "new_ward") {
    $query = "SELECT count(*) FROM ward";
    $count_models = pg_fetch_row(pg_query($dbconn, $query))[0] or die("Cannot execute query: $query\n");

    echo nl2br("Inserting new ward... $n_l");
    $query = "INSERT INTO ward (id_ward, name) VALUES ($count_models + 1, '$_POST[name]');";
    $rs = pg_query($dbconn, $query) or die("Cannot execute query: $query\n");
}

if ($_POST["action"] == "new_nurse_ward") {
    echo nl2br("Inserting new ward... $n_l");
    $query = "INSERT INTO nurse_ward (fid_nurse, fid_ward) VALUES ($_POST[id_nurse], $_POST[id_ward]);";
    $rs = pg_query($dbconn, $query) or die("Cannot execute query: $query\n");
}


$query = "SELECT * FROM nurse";
$rs = pg_query($dbconn, $query) or die("Cannot execute query: $query\n");
echo nl2br("Nurses $n_l");
while ($row = pg_fetch_row($rs)) {
    echo nl2br("$row[0] $row[1] $row[2] $row[3] $row[4] $n_l");
}


$query = "SELECT * FROM ward";
$rs = pg_query($dbconn, $query) or die("Cannot execute query: $query\n");
echo nl2br("$n_l Wards $n_l");
while ($row = pg_fetch_row($rs)) {
    echo nl2br("$row[0] $row[1] $row[2] $n_l");
}

$query = "SELECT * FROM nurse_ward";
$rs = pg_query($dbconn, $query) or die("Cannot execute query: $query\n");
echo nl2br("$n_l Nurse and wards $n_l");
while ($row = pg_fetch_row($rs)) {
    echo nl2br("$row[0] $row[1] $row[2] $n_l");
}


pg_close($dbconn);

?>
</html>

