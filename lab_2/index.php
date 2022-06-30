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

<h3>Перечень палат, в которых дежурит выбранная медсестра</h3>
<form action="server.php" method="post" name="new-nurse">
    Name nurse: <input type="text" name="name"><br>
    <input type="text" name="action" hidden="hidden" value="nurse_list_ward"><br>
    <input type="submit">
</form>

<h3>медсестры, дежурившие в указанном отделении</h3>
<form action="server.php" method="post" name="new-ward">
    Name of dep: <input type="text" name="department"><br>
    <input type="text" name="action" hidden="hidden" value="nurse_department"><br>
    <input type="submit">
</form>


<h3>показать все дежурства (в любых палатах) в указанную смену в указанном отделении</h3>
<form action="server.php" method="post" name="new-ward">
    Name of dep: <input type="text" name="department"><br>
    Number of shift: <input type="text" name="shift"><br>
    <input type="text" name="action" hidden="hidden" value="nurse_department_shift"><br>
    <input type="submit">
</form>

</body>
</html>
