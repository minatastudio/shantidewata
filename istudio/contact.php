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
                $getdata = mysqli_query($con, "select * from $tb_content where id = '$_GET[pageid]'");
                $data = mysqli_fetch_array($getdata, MYSQLI_BOTH);
                $content = explode("^", $data[content]);
                $meta = explode("^", $data[meta]);
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
                            $img = $_FILES["imgedit"]["name"];
                            //upload images
                            //insert
                            if ($img != "") {
                                $file_img = $_POST[id] . "_" . $img;
                                move_uploaded_file($_FILES["imgedit"]["tmp_name"], "$pathimg_content" . $file_img);
                            } else {
                                $file_img = $_POST[image_data];
                            }
                            $meta = $_POST[title] . "^" . $_POST[keyword] . "^" . $_POST[description];
                            $content = $_POST[name1] . "^" . $_POST[editor1] . "^" . $_POST[address] . "^" . $_POST[email] . "^" . $_POST[phone] . "^" . $_POST[mobile] . "^" . $_POST[fb] . "^" . $_POST[ig] . "^" . $_POST[yt] . "^" . $_POST[editor1] . "^" . $_POST[li] . "^" . $_POST[name2];
                            $insert = edit_1($_POST[id], $_POST[name], $content, $file_img, $_POST[imgname], $meta, $tb_content, $con);
                            echo "$insert ";

                            $getdata = mysqli_query($con, "select * from $tb_content where id = '$_GET[pageid]'");
                            $data = mysqli_fetch_array($getdata, MYSQLI_BOTH);
                            $content = explode("^", $data[content]);
                            $meta = explode("^", $data[meta]);
                        }
                        ?>
                        <div class="form-group">
                            <input type="hidden" name="id" data-required="1" class="form-control" value="<?php echo "$_GET[pageid]"; ?>" />
                            <input type="hidden" class="form-control" name="image_data" value="<?php echo "$data[image]"; ?>">
                            <label class="control-label col-md-3">Title
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <input type="text" name="name" data-required="1" class="form-control" value="<?php echo "$data[name]"; ?>" />
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3">Address
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <input type="text" name="address" data-required="1" class="form-control" value="<?php echo "$content[2]"; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Email Address
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <input type="email" name="email" data-required="1" class="form-control" value="<?php echo "$content[3]"; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Phone
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <input type="text" name="phone" data-required="1" class="form-control" value="<?php echo "$content[4]"; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Mobile
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <input type="text" name="mobile" data-required="1" class="form-control" value="<?php echo "$content[5]"; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Facebook
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <input type="text" name="fb" data-required="1" class="form-control" value="<?php echo "$content[6]"; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Instagram
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <input type="text" name="ig" data-required="1" class="form-control" value="<?php echo "$content[7]"; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Map Link
                            </label>
                            <div class="col-md-9">
                                <input type="text" name="li" data-required="1" class="form-control" value="<?php echo "$content[10]"; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Short Content
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <textarea class="wysihtml5 form-control" rows="5" name="editor1" data-error-container="#editor1_error"><?php echo "$content[9]"; ?></textarea>
                                <div id="editor1_error"> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Image Footer
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <div class="col-md-12 noleftpadding">
                                    <?php
                                    if ($data[image] != "") {
                                    ?>
                                        <img src="<?php echo "$pathimg_content" . "$data[image]"; ?> " class="img-responsive thumbimg">
                                    <?php } ?>
                                </div>
                                <div class="col-md-6 noleftpadding fileinputres">
                                    <input type="file" name="imgedit" class="form-control" />
                                </div>
                                <div class="col-md-6 nolrpadding">
                                    <input type="text" name="imgname" data-required="1" class="form-control" placeholder="Image Name" value="<?php echo "$data[imgname]"; ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-section">
                            Meta Data Section
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Title
                            </label>
                            <div class="col-md-6">
                                <input type="text" name="title" data-required="1" class="form-control" value="<?php echo "$meta[0]"; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Keyword
                            </label>
                            <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="keyword"><?php echo "$meta[1]"; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Description
                            </label>
                            <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="description"><?php echo "$meta[2]"; ?></textarea>
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