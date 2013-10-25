<div class="alert alert-error">
    <a class="close" data-dismiss="alert" href="#">×</a>Incorrect Username or Password!
</div>
<div class="span3">
    <h2>Sign Up</h2>
    <form action="registration_process.php" method="post" name="new_user_form" id='reg_form'>
        <label>First Name</label><input type="text" name="first_name" id="first_name" placeholder="Kombo">
        <label>Last Name</label><input type="text" name="last_name" id="last_name" placeholder="Hamisi">
        <label>Email Address</label><input type="email" name="email" id="email" placeholder="kombo@email.com">
        <label>Re-Email Address</label><input type="email" name="email" id="email2" placeholder="kombo@email.com">
        <label>Mobile</label><input type="text" name="mobile" id="mobile" placeholder ="+255712345678">
        <label>Password</label><input type="password" name="password" placeholder="***********">
        <label><input type="checkbox" name="terms"> I agree with the <a href="#">Terms and Conditions</a>.</label>
        <input type="submit" value="Sign up" class="btn btn-danger" id="reg_btn">
        <div class="clearfix"></div>
    </form>
</div>
