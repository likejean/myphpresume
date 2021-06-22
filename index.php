<?php
    session_start();
    include_once 'db.php';
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<?php
    include 'navbar.php';
    $data = "admin";
    //Create a sql template
    $sql = "SELECT * FROM users WHERE role=?;";
    //Create a prepared statement
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed";
    }else{
        //Bind parameters to the placeholder
        mysqli_stmt_bind_param($stmt, 's', $data);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) { $i = 0; ?>
            <div class="list-group m-5">
                <?php while ($row = mysqli_fetch_assoc($result)){
                    $i++;
                    if ($i === 1) echo '<span class="list-group-item list-group-item-action active">' . $row['email'] . '</span>';
                    echo '<span class="list-group-item list-group-item-action">' . $row['email'] . '</span>';
                }
                ?>
            </div>
        <?php }
    }



    include_once 'createUser.php';


?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>