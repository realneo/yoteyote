<!-- Block Content -->
<p>

    <!-- Form Edit User with Blocks in the Grid -->
    <div class="row gutter30">

        <div class="col-sm-4"></div>

        <div class="col-sm-4">

            <!-- Example Form Block -->
            <div class="block">

                <!-- Example Form Title -->
                <div class="block-title">
                    <h2>Example Form</h2>
                </div>
                <!-- END Example Form Title -->

                <!-- Example Form Content -->
                <form id="form-validation" method="post">

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" id="user_name" name="user_name" class="form-control" placeholder="Username" value="<?php echo $user_name; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" id="user_email" name="user_email" class="form-control" placeholder="Email" value="<?php echo $user_email; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                            <input type="password" id="user_password" name="user_password" class="form-control" placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="update" value="update"><i class="fa fa-power-off"></i> Update User</button>
                    </div>

                </form>
                <!-- END Example Form Content -->

            </div>
            <!-- END Example Form Block -->

        </div>

        <div class="col-sm-4"></div>

    </div>
    <!-- END Form Example with Blocks in the Grid -->

</p>
<!-- END Block Content -->