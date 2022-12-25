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
                <?php
                $getdata = mysqli_query($con, "select * from $tb_location where id = '$_GET[id]'");
                $data = mysqli_fetch_array($getdata, MYSQLI_BOTH);
                $meta = explode("^", $data[meta]);
                $names = explode("^", $data[name]);
                ?>
                <form action="<?php echo "$post_url"; ?>" id="form_sample_3" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="alert alert-danger display-hide">
                            <button class="close" data-close="alert"></button> You have some form errors. Please check below.
                        </div>
                        <div class="alert alert-success display-hide">
                            <button class="close" data-close="alert"></button> Your form validation is successful!
                        </div>
                        <?php
                        if (isset($_POST[submit])) {

                            //insert
                            //$content = $_POST[editor1]."^".$_POST[customlink];
                            $name = $_POST[name];
                            $insert = edit_1($_POST[id], $name, $_POST[editor1], $file_img, $_POST[imgname], $meta, $tb_location, $con);
                            echo "$insert ";
                            $getdata = mysqli_query($con, "select * from $tb_location where id = '$_GET[id]'");
                            $data = mysqli_fetch_array($getdata, MYSQLI_BOTH);
                            $meta = explode("^", $data[meta]);
                            $names = explode("^", $data[name]);
                        }
                        ?>
                        <div class="form-group">
                            <input type="hidden" name="id" data-required="1" class="form-control" value="<?php echo "$_GET[id]"; ?>" />
                            <label class="control-label col-md-3">Name
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <input type="text" name="name" data-required="1" class="form-control" value="<?php echo "$names[0]"; ?>" />
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