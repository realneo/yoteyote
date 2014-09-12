<?php
    include('lib/config/autoload.php');
    
    $database = new Database();
    
    $database->query('INSERT INTO mytable (FName, LName, Age, Gender) VALUES (:fname, :lname, :age, :gender)');
    
    $database->bind(':fname', 'John');
    $database->bind(':lname', 'Smith');
    $database->bind(':age', '24');
    $database->bind(':gender', 'male');
    
    $database->execute();
    
    echo $database->lastInsertId();
    
    echo '<br />';
    
    $database->query('SELECT * FROM mytable');
    $rows = $database->resultset();

    foreach($rows as $row){
        echo $row['FName'];
        echo '<br />';
    }

    
    
    
?>

<div class='widget-container boxed post'>
                    <div class='col-md-12 text-center post_title'><h5><span class='bolder-text green_text'>I will</span> sell you my Nintendo Wii</h5></div>
                    <div class='col-md-12 post_amount'><h4><span class="label label-default currency">Tshs</span> 450,000</h4></div>
                    <img alt="sell you my nintendo wii" src="images/posts/138294600324.jpg" />
                    <div class='col-md-12'><p>It is in a very mint condition</p></div>
                    <div class="col-md-12">
                        <img alt="" src="images/users/default.png" class='post_profile_pic'>
                        <div class='user_info'>
                            <p>
                                <strong>Nadhir Bahayan</strong><br />
                                Trusted By <span class='round-badge orange_bg'>12</span><br />
                                Satisfied Users <span class='round-badge green_bg'>12</span><br />
                                <a href="#" class="btn btn-green"><span>Buy</span></a>
                            </p>
                        </div>
                    </div>
			    </div>