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
                $meta = explode("^", $data[meta]);
                $name = explode("^", $data[name]);
                $imgdata = explode("^", $data[image]);
                $imgnamedata = explode("^", $data[imgname]);
                $content =  explode("^", $data[content]);
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


                            for ($i = 1; $i <= 2; $i++) {

                                $img = $_FILES["imgedit" . ($i)]["name"];
                                if ($img != "") {
                                    $file_img = $_POST[id] . "_" . $img;
                                    move_uploaded_file($_FILES["imgedit" . ($i)]["tmp_name"], "$pathimg_content" . $file_img);
                                    $images .= $file_img . "^";
                                } else {
                                    $images .= $_POST["image_data" . ($i)] . "^";
                                }
                                $image_name .= $_POST["imgname" . ($i)] . "^";
                            }
                            $data_images = substr($images, 0, -1);
                            $img_name = substr($image_name, 0, -1);

                            $meta = $_POST[title] . "^" . $_POST[keyword] . "^" . $_POST[description];
                            $name = $_POST[name] . "^" . $_POST[name1];
                            $content = $_POST[editor1] . "^" . $_POST[editor2];


                            $insert = edit_1($_POST[id], $name, $content, $data_images, $img_name, $meta, $tb_content, $con);
                            echo "$insert ";

                            $getdata = mysqli_query($con, "select * from $tb_content where id = '$_GET[pageid]'");
                            $data = mysqli_fetch_array($getdata, MYSQLI_BOTH);
                            $meta = explode("^", $data[meta]);
                            $name = explode("^", $data[name]);
                            $imgdata = explode("^", $data[image]);
                            $imgnamedata = explode("^", $data[imgname]);
                            $content =  explode("^", $data[content]);
                        }
                        ?>
                        <input type="hidden" name="id" data-required="1" class="form-control" value="<?php echo "$_GET[pageid]"; ?>" />
                        <input type="hidden" class="form-control" name="image_data1" value="<?php echo "$imgdata[0]"; ?>">
                        <input type="hidden" class="form-control" name="image_data2" value="<?php echo "$imgdata[1]"; ?>">
                        <div class="form-group">
                            <label class="control-label col-md-3">Title
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <input type="text" name="name" data-required="1" class="form-control" value="<?php echo "$name[0]"; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tag Line
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <input type="text" name="name1" data-required="1" class="form-control" value="<?php echo "$name[1]"; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Image Banner
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <div class="col-md-12 noleftpadding">
                                    <?php
                                    if ($imgdata[0] != "") {
                                    ?>
                                        <img src="<?php echo "$pathimg_content" . "$imgdata[0]"; ?> " class="img-responsive thumbimg">
                                    <?php } ?>
                                </div>
                                <div class="col-md-6 noleftpadding fileinputres">
                                    <input type="file" name="imgedit1" class="form-control" />
                                </div>
                                <div class="col-md-6 nolrpadding">
                                    <input type="text" name="imgname1" data-required="1" class="form-control" placeholder="Image Name" value="<?php echo "$imgnamedata[0]"; ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Top Description
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <textarea class="wysihtml5 form-control" rows="20" name="editor1" data-error-container="#editor1_error"><?php echo "$content[0]"; ?></textarea>
                                <div id="editor1_error"> </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Image
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <div class="col-md-12 noleftpadding">
                                    <?php
                                    if ($imgdata[1] != "") {
                                    ?>
                                        <img src="<?php echo "$pathimg_content" . "$imgdata[1]"; ?> " class="img-responsive thumbimg">
                                    <?php } ?>
                                </div>
                                <div class="col-md-6 noleftpadding fileinputres">
                                    <input type="file" name="imgedit2" class="form-control" />
                                </div>
                                <div class="col-md-6 nolrpadding">
                                    <input type="text" name="imgname2" data-required="1" class="form-control" placeholder="Image Name" value="<?php echo "$imgnamedata[1]"; ?>" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Bottom Description
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <textarea class="wysihtml5 form-control" rows="20" name="editor2" data-error-container="#editor2_error"><?php echo "$content[1]"; ?></textarea>
                                <div id="editor1_error"> </div>
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