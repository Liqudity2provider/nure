<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<form action="server.php">
    <input type="submit" value="Go to server"/>
</form>


<form action="server.php" method="post">
    Name: <input type="text" name="name"><br>
    <input type="submit">
</form>


<h3>Add new nurse</h3>
<form action="server.php?action=new_nurse" method="post" name="new-nurse">
    Name: <input type="text" name="name"><br>
    Date: <input type="date" name="date"><br>
    Department: <input type="number" name="department"><br>
    Shift: <input type="text" name="shift"><br>
    <input type="text" name="action" hidden="hidden" value="new_nurse"><br>
    <input type="submit">
</form>

<h3>Add new ward</h3>
<form action="server.php" method="post" name="new-ward">
    Name: <input type="text" name="name"><br>
    <input type="text" name="action" hidden="hidden" value="new_ward"><br>
    <input type="submit">
</form>

<h3>Add nurse to ward</h3>
<form action="server.php" method="post" name="new-nurse-ward">
    Id nurse: <input type="text" name="id_nurse"><br>
    Id Ward: <input type="text" name="id_ward"><br>
    <input type="text" name="action" hidden="hidden" value="new_nurse_ward"><br>
    <input type="submit">
</form>

</body>
</html>
