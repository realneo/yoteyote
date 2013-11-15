<?php
    session_start();
    include('../lib/Main.php');
    include('../lib/User.php');
    $user = new User;
    $user_id = $_SESSION['user_id'];
    //$user_id = 24;
    $user_data = $user->getUser("*","user_id = $user_id");
    
    //echo implode(',',$user_data);
    // User Data
    
    if($user_data['pic'] == ''){
        $pic = 'images/users/default.png';
    }else{
        $pic = 'images/posts/'.$user_data['pic'];
    }
?>
<script>
    //profile
    $("#profile_pic").pekeUpload({theme:'bootstrap', multi: false});
    
    $('#nickname').editable({
        name:'nickname',
        title:'Enter Your Nickname',
        type:'text',
        hightlight:'green',
        mode:'inline',
        url:'includes/update_profile.php'
    });
    
     $('#dob').editable({
        name:'dob',
        title:'Enter Your Date',
        type:'combodate',
        url:'includes/update_profile.php',
        format: 'YYYY-MM-DD',
        viewformat: 'MMMM Do YYYY',
        combodate: {
            minYear: 1950,
            maxYear: 2010,
            minuteStep: 1
        }
    });
    
    $('#gender').editable({
        name:'gender',
        title:'Enter Your Gender',
        type:'select',
        hightlight:'green',
        mode:'inline',
        url:'includes/update_profile.php',
        source: [
            {value: 'Male', text: 'Male'},
            {value: 'Female', text: 'Female'}
        ]
    });

    $('#bio').editable({
        name:'bio',
        title:'Enter Your Bio',
        type:'textarea',
        hightlight:'green',
        mode:'inline',
        url:'includes/update_profile.php'
    });
    
    $('#building_number').editable({
        name:'building_number',
        title:'Enter Your Building Number',
        type:'text',
        hightlight:'green',
        mode:'inline',
        url:'includes/update_profile.php'
    });
    
    $('#building_name').editable({
        name:'building_name',
        title:'Enter Your Building Name',
        type:'text',
        hightlight:'green',
        mode:'inline',
        url:'includes/update_profile.php'
    });
    
    $('#city').editable({
        name:'city',
        title:'Enter Your City',
        type:'text',
        hightlight:'green',
        mode:'inline',
        url:'includes/update_profile.php'
    });
    
    $('#country').editable({
        name:'country',
        title:'Enter Your Country',
        type:'text',
        hightlight:'green',
        mode:'inline',
        url:'includes/update_profile.php'
    });
    
    $('#street').editable({
        name:'street',
        title:'Enter Your Street',
        type:'text',
        hightlight:'green',
        mode:'inline',
        url:'includes/update_profile.php'
    });
    $('#first_name').editable({
        name:'first_name',
        title:'Enter Your First Name',
        type:'text',
        hightlight:'green',
        mode:'inline',
        url:'includes/update_profile.php'
    });
    
    $('#last_name').editable({
        name:'last_name',
        title:'Enter Your Last Name',
        type:'text',
        hightlight:'green',
        mode:'inline',
        url:'includes/update_profile.php'
    });
    $('#profile_pic_btn').click(function(){
        preload_start();
        $.ajax({ 
                type:'post',
                url: 'includes/profile_pic_update.php',
                success: function(response){
                    if(response == "success"){
                        notify('Profile', 'Successfully Changed Your Profile', 5000, 'W', '');
                        preload_stop();
                        clear_page('#','content');
                        load_page('#','content','includes/profile.php');
                        
                    }else{
                        notify('Error', 'Something Went Wrong', 5000, 'o', true);
                        preload_stop();
                    }
                }
            });
            return false;
    });
</script>
<div class='row'>
    
    <!-- Left Pane -->
    <br />
    <div class='span3 offset1 thumbnail profile'>
        <p>Verified <i class='icon-ok-circle'></i></p>
        <img src="<?php echo $pic; ?>" class="profile_pic" alt="<?php echo $user_data['first_name'] . ' ' . $user_data['last_name']; ?>" width="300"/>
        <br />
        <form name="profile_pic" method="get" action="includes/upload.php">
            <div class='input-prepend' style="margin-bottom:0px;">
                <span class='add-on error'>Picture</span>
                <input type="file" id="profile_pic" name="profile_pic" />
                <input type='hidden' name='upload_url' value='users' />
            </div>
            <button id="profile_pic_btn"  class='btn' type='submit'>Change</button>
        </form>
       
    </div>
    
    <!-- Content -->
    <div class='span7 thumbnail profile'>
        <h3>
            <a href="#" id="first_name" data-pk="<?php echo $user_id; ?>"><?php echo $user_data['first_name']; ?></a>
            <a href="#" id="last_name" data-pk="<?php echo $user_id; ?>"><?php echo $user_data['last_name']; ?></a>
        </h3>
        <div class="span2">
            <button class="btn btn-success">Chat</button>
            <button class="btn btn-success">Pay</button>
        </div>
        <div>
        <div class="tabbable"> <!-- Only required for left/right tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab">Info</a></li>
               <!-- <li><a href="#tab2" data-toggle="tab">Contact</a></li>
                <li><a href="#tab3" data-toggle="tab">Security</a></li>-->
            </ul>
            <div class="tab-content">
           
               <!------------------ INFO ----------------------------->     
                <div class="tab-pane active" id="tab1">
                    <table class='table table-striped table-hover span6'>
                        <caption>Personal</caption>
                    <tr>
                        <th>Nickname</th>
                        <td><a href="#" id="nickname" data-pk="<?php echo $user_id; ?>"><?php echo $user_data['nickname']; ?></a></td>
                    </tr>
                    <tr>
                        <th width='80'>Date Of Birth</th>
                        <td><a href="#" id="dob" data-pk="<?php echo $user_id; ?>"><?php echo $user_data['dob']; ?></a></td>
                    </tr
                    <tr>
                        <th>Gender</th>
                        <td><a href="#" id="gender" data-pk="<?php echo $user_id; ?>"><?php echo $user_data['gender']; ?></a></td>
                    </tr>
                    <tr>
                        <th>Bio</th>
                        <td><a href="#" id="bio" data-pk="<?php echo $user_id; ?>"><?php echo $user_data['bio']; ?></a></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td></td>
                    </tr>
                </table>
                    <table class='table table-striped table-hover span6'>
                        <caption>Location</caption>
                    <tr>
                        <th width='110'>Building Number</th>
                        <td><a href="#" id="building_number" data-pk="<?php echo $user_id; ?>"><?php echo $user_data['building_number']; ?></a></td>
                    </tr>
                    <tr>
                        <th>Building Name</th>
                        <td><a href="#" id="building_name" data-pk="<?php echo $user_id; ?>"><?php echo $user_data['building_name']; ?></a></td>
                    </tr>
                    <tr>
                        <th>Street</th>
                        <td><a href="#" id="street" data-pk="<?php echo $user_id; ?>"><?php echo $user_data['street']; ?></a></td>
                    </tr>
                    <tr>
                        <th>Town / City</th>
                        <td><a href="#" id="city" data-pk="<?php echo $user_id; ?>"><?php echo $user_data['city']; ?></a></td>
                    </tr>
                    <tr>
                        <th>Country</th>
                        <td><a href="#" id="country" data-pk="<?php echo $user_id; ?>"><?php echo $user_data['country']; ?></a></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td width='300'></td>
                    </tr>
                </table>
                </div>
             
               <!------------------- CONTACT ------------------>
                <div class="tab-pane" id="tab2">
                    <table class='table table-striped table-hover span3'>
                        <caption>Emails</caption>
                    <tr>
                        <th>1</th>
                        <td>nadhir2@hotmail.com</td>
                    </tr>
                    <tr>
                        <th>2</th>
                        <td>neo@yoteyote.com</td>
                    </tr
                    <tr>
                        <th>3</th>
                        <td>nbahayan@gmail.com</td>
                    </tr>
                    <tr>
                        <th>4</th>
                        <td>nbahayan@hotmail.com</td>
                    </tr>
                    <tr>
                        <th></th>
                        <td></td>
                    </tr>
                </table>
                    <table class='table table-striped table-hover span3'>
                        <caption>Mobile</caption>
                        <tr>
                            <th>Airtel</th>
                            <td>+255 787 487333</td>
                        </tr>
                        <tr>
                            <th>Tigo</th>
                            <td>+255 655 487333</td>
                        </tr
                        <tr>
                            <th>Vodacom</th>
                            <td>+255 774 487333</td>
                        </tr>
                        <tr>
                            <th>Zantel</th>
                            <td>+255 773 487333</td>
                        </tr>
                        <tr>
                            <th></th>
                            <td></td>
                        </tr>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>