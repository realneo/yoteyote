<?php
    session_start();
    include('db_conn.php');
    
    $q = mysql_query("SELECT * FROM `posts` ORDER BY `date` DESC");
    while($row = mysql_fetch_array($q)){
       $currency = ucfirst($row['currency']);
       $amount = $row['amount'];
       $post = $row['post'];
       $user_id = $row['user_id'];
       $post_id = $row['id'];
       $qq = mysql_query("SELECT * FROM `users` WHERE `id` = '$user_id'");
       while($rows = mysql_fetch_array($qq)){
           $first_name = $rows['first_name'];
           $last_name = $rows['last_name'];
           echo"
               <div class='post'>
                  <table width='310'>
                    <tr>
                        <td height='77' colspan='2' valign='top'>
                            <div class='amount'><span class='currency'>{$currency}</span> {$amount}</div><!-- amount -->
                            <div class='will_want'> - {$post}</div>
                            <!-- class post -->
                       </td>
                    </tr>
                    <tr>
                      <td width='66' rowspan='2'><div class='user_pic'><img src='images/sample_user.png' alt='' /></div><!-- user_pic --></td>
                      <td width='232' height='20' valign='top'><div class='user_name'>{$first_name} {$last_name}</div><!-- user_name --></td>
                    </tr>
                    <tr>
                      <td height='16' valign='top'><div class='trusted_by'>Trusted by 5 people</div><!-- trusted_by -->
                      <div class='get_contact'><button name='get_contact' class='get_contact' id='{$post_id}'>Get Contact</button></div><!-- get_contact -->
                      </td>
                    </tr>
                </table>   
                </div><!-- post -->
            ";
       }
    }
?>
