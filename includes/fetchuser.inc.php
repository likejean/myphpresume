<?php
include_once 'db.php';

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