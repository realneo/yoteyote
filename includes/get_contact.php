<?php
    session_start();
    include('db_conn.php');
    
    // Getting the post id
    $post_id = $_GET[''];
    $q = mysql_query("SELECT * FROM `posts` WHERE `id` = '$post_id'");
    while($row = mysql_fetch_array($q)){
        $user_id = $row['user_id'];
    }
    $qq = mysql_query("SELECT * FROM `users` WHERE `id` = '$user_id'");
    while($rows = mysql_fetch_array($qq)){
        $first_name = $rows['first_name'];
        $last_name = $rows['last_name'];
        $mobile = $rows['mobile'];
        $email = $rows['email'];
        echo"
            <table>
                <tr>
                    <th align='right'> Name : </th>
                    <td> {$first_name} {$last_name} </td>
                </tr>
                <tr>
                    <th align='right'> Mobile : </th>
                    <td> {$mobile} </td>
                </tr>
                <tr>
                    <th align='right'> Email : </th>
                    <td> {$email} </td>
                </tr>
            </table>
        ";
    }
            
?>
