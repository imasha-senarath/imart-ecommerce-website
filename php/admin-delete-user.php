<?php

    include("../include/connection.php");
    $userID = $_POST['userID'];

    echo"<script>alert('No '+$userID+' user was deleted.')</script>";

    if(isset($userID))
    {
        $deleteUserQuery = "delete from users where user_id =$userID";
        $runDeleteUser = mysqli_query($con, $deleteUserQuery);

        $getUsersQuery = "select * from users";
        $runUsersQuery = mysqli_query($con, $getUsersQuery);
        echo"<h1> Manage Users</h1>";
        while($rowUsers = mysqli_fetch_array($runUsersQuery))
        {
            $userName = $rowUsers['user_name'];
            $userID = $rowUsers['user_id'];
            $userEmail = $rowUsers['user_email'];
            $userImage = $rowUsers['user_image'];
            echo"
            <div class='user'>
                <div class='main' onclick=location.href='../view-product.php?product_id=$productID'>
                    <img src='../storage/users/$userImage' alt=''>    
                    <h2>#$userID</h2>
                    <p>  $userName </p>
                    <p>  $userEmail </p>
                </div>
            <img class='delete' src='../images/delete.png' alt='' onClick='deleteUser($userID)' title='Delete';>
            </div>";
        }
    }
    else {
    echo"<script>
        window.open('../shopping-web-site/home.php', '_self')
    </script>";
    }
    ?>