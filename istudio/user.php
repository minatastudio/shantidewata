<div class="row">
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject"><?php echo "$title_admin2 $title_admin1"; ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form action="<?php echo "$post_url"; ?>" id="form_sample_3" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="alert alert-danger display-hide">
                            <button class="close" data-close="alert"></button> You have some form errors. Please check below.
                        </div>
                        <div class="alert alert-success display-hide">
                            <button class="close" data-close="alert"></button> Your form validation is successful!
                        </div>
                        <?php
                        $getdata = mysqli_query($con, "select * from accounts");
                        $data = mysqli_fetch_array($getdata, MYSQLI_BOTH);

                        if (isset($_POST[submit])) {
                            //insert
                            if ($_POST[name] != $_POST[name1]) {
                                $hasil = "<div class=\"alert alert-danger\">";
                                $hasil .= "<p><strong>Error!!!</strong> Please make sure the password are match....!</p></div>";
                            } else {
                                $username = trim($_POST[username]);
                                $password = password_hash($_POST[name], PASSWORD_DEFAULT);
                                $sql = "update accounts set username = '$username', email = '$_POST[email]', password ='$password'";
                                $insert = mysqli_query($con, $sql) or die("Query Failed = $sql");
                                if ($insert) {
                                    $hasil = "<div class=\"alert alert-success\">";
                                    $hasil .= "<p>Data Update Successfully....!</p></div>";
                                }
                            }
                            echo "$hasil";
                            $getdata = mysqli_query($con, "select * from accounts");
                            $data = mysqli_fetch_array($getdata, MYSQLI_BOTH);
                        }
                        //echo password_hash("saguna", PASSWORD_DEFAULT);
                        ?>
                        <div class="form-group">
                            <label class="control-label col-md-3">Username
                            </label>
                            <div class="col-md-5">
                                <input type="text" name="username" class="form-control" value="<?php echo "$data[username]"; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Email
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <input type="email" name="email" data-required="1" class="form-control" value="<?php echo "$data[email]"; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">New Password
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <input type="password" name="name" data-required="1" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Re-Type New Password
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <input type="password" name="name1" data-required="1" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn button-default btn-primary" name="submit">Submit</button>
                                <button type="button" class="btn button-default default btn-reset">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
            <!-- END VALIDATION STATES-->
        </div>
    </div>
</div>