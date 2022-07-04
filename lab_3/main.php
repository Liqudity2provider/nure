<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table, td, th {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
    <script src="./main.js">
    </script>
</head>
<body>
<h4>Enter Nurse name -> get her wards</h4>
<form action="" method="post" id="nurse_list_ward">
    <input type="text" name="name">
    <input type="text" name="action" hidden="hidden" value="nurse_list_ward"><br>
    <input type="submit" value="find"><br>
</form>
<br>
<h4>Enter Dep name -> get nurses</h4>
<form action="" method="post" id="nurse_department">
    <input type="text" name="department">
    <input type="text" name="action" hidden="hidden" value="nurse_department"><br>
    <input type="submit" value="find"><br>
</form>
<br>

<h4>Enter Dep name and shift -> get wards</h4>
<form action="" method="post" id="nurse_department_shift">
    <input placeholder="Department" type="text" name="department">
    <input placeholder="Shift" type="text" name="shift">
    <input type="text" name="action" hidden="hidden" value="nurse_department_shift"><br>
    <input type="submit" value="find"><br>
</form>
<hr>
<div id="content">
</div>
</body>
</html>