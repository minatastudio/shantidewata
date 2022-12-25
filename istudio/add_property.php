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

                        if (isset($_POST[submit])) {

                            // gallery
                            $nomer = nomer($tb_property, $con);
                            for ($i = 1; $i <= 9; $i++) {

                                $img = $_FILES["imgproject" . ($i)]["name"];
                                if (trim($img) != "") {
                                    $file_img = $nomer . "_property_" . $img;
                                    move_uploaded_file($_FILES["imgproject" . ($i)]["tmp_name"], "$pathimg_property" . $file_img);
                                    $images .= $file_img . "^";
                                    $image_name .= $_POST["imgnameproject" . ($i)] . "^";
                                }
                            }
                            $data_images = substr($images, 0, -1);
                            $img_name = substr($image_name, 0, -1);

                            $meta = $_POST[title] . "^" . $_POST[keyword] . "^" . $_POST[description];
                            $contents =  $_POST[editor9] . "^" . $_POST[editor1];
                            $content = str_replace("'", "&acute;", $contents);
                            $alias = str_replace(" ", "-", $_POST[name]);

                            for ($n = 1; $n <= 6; $n++) {
                                $neigh .= $_POST["close" . ($n)] . "," . $_POST["distance" . ($n)] . "^";
                            }
                            $tetangga = substr($neigh, 0, -1);

                            $insert = "insert into $tb_property (id,code,name,category,location,type,landsize,buildsize,bedroom,bathroom,living,pool,garden,parking,view,furnished,floor,price,pricetype,pricenote,map,neighborhood,image,imagename,content,alias,meta,active)";
                            $insert .= "values ('$nomer ','$_POST[name1]','$_POST[name]','$_POST[category]','$_POST[location]','$_POST[tipe]','$_POST[land]','$_POST[build]','$_POST[bedroom]','$_POST[bathroom]','$_POST[living]',";
                            $insert .= "'$_POST[pool]','$_POST[garden]','$_POST[parking]','$_POST[view]','$_POST[furnished]','$_POST[lantai]','$_POST[price]','$_POST[tipeharga]','$_POST[pricenote]','$_POST[map]',";
                            $insert .= "'$tetangga','$data_images','$img_name','$content','$alias','$meta','1')";
                            $cek = mysqli_query($con, "select * from $tb_property where name = '$_POST[name]'");
                            if ($ceks = mysqli_fetch_array($cek, MYSQLI_BOTH)) {
                                $hasil = "<div class=\"alert alert-danger\">";
                                $hasil .= "<p><strong>Error!!!</strong> Data Already in database, plase add another data....!</p></div>";
                            } else {
                                $insertdata = mysqli_query($con, $insert) or die("Query Failed = $insert");
                                if ($insertdata) {
                                    $hasil = "<div class=\"alert alert-success\">";
                                    $hasil .= "<p>Data Update Successfully....!</p></div>";
                                }
                            }
                            echo "$hasil";
                        }
                        ?>
                        <div class="form-group">
                            <label class="control-label col-md-3">Code Property
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <input type="text" name="name1" data-required="1" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Name
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <input type="text" name="name" data-required="1" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Category
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <div class="form-md-radios">
                                    <div class="md-radio-inline">
                                        <?php
                                        $i = 0;
                                        $category_property = mysqli_query($con, "select * from $tb_category where active = '1'");
                                        while ($data_category = mysqli_fetch_array($category_property, MYSQLI_BOTH)) {
                                            $i++;

                                        ?>
                                            <div class="md-radio">
                                                <input type="radio" id="category<?php echo "$i"; ?>" name="category" class="md-radiobtn" value="<?php echo $data_category[id]; ?>">
                                                <label for="category<?php echo "$i"; ?>">
                                                    <span class="inc"></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> <?php echo $data_category[name]; ?> </label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Location
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <select class="form-control edited" id="form_control_1" name="location">
                                    <?php
                                    $i = 0;
                                    $location = mysqli_query($con, "select * from $tb_location where active = '1' order by name ASC");
                                    while ($data_location = mysqli_fetch_array($location, MYSQLI_BOTH)) {
                                        $i++;

                                    ?>
                                        <option value="<?php echo $data_location[id]; ?>"><?php echo $data_location[name]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Property Type
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <div class="form-md-radios">
                                    <div class="md-radio-inline">
                                        <?php
                                        $i = 0;
                                        $tipe_property = mysqli_query($con, "select * from $tb_type where active = '1'");
                                        while ($data_tipe = mysqli_fetch_array($tipe_property, MYSQLI_BOTH)) {
                                            $i++;

                                        ?>
                                            <div class="md-radio">
                                                <input type="radio" id="tipe<?php echo "$i"; ?>" name="tipe" class="md-radiobtn" value="<?php echo $data_tipe[id]; ?>">
                                                <label for="tipe<?php echo "$i"; ?>">
                                                    <span class="inc"></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> <?php echo $data_tipe[name]; ?></label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Price
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <input type="text" name="price" data-required="1" class="form-control" style="display: inline; width:auto;" />
                                <select class="form-control" id="form_control_1" name="tipeharga" style="display: inline;width:auto;">
                                    <option value="1">Total</option>
                                    <option value="2">Per Day</option>
                                    <option value="3">Per Week</option>
                                    <option value="4">Per Month</option>
                                    <option value="5">Per Year</option>
                                    <option value="6">Per Are</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Price Note
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="pricenote" data-required="1" class="form-control" />
                            </div>
                        </div>
                        <div class="alert alert-section">
                            Property Features
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Land Size
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="land" data-required="1" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Building Size
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="build" data-required="1" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">No. FLoor
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="lantai" data-required="1" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Bedroom
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="bedroom" data-required="1" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Bathroom
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="bathroom" data-required="1" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Living
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="living" data-required="1" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">View
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="view" data-required="1" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Others
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <div class="md-checkbox-inline">
                                    <div class="md-checkbox">
                                        <input type="checkbox" id="Garden" name="garden" class="md-check" value="1">
                                        <label for="Garden">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Garden</label>
                                    </div>
                                    <div class="md-checkbox">
                                        <input type="checkbox" id="Pool" name="pool" class="md-check" value="1">
                                        <label for="Pool">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Pool </label>
                                    </div>
                                    <div class="md-checkbox">
                                        <input type="checkbox" id="Parking" name="parking" class="md-check" value="1">
                                        <label for="Parking">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Parking</label>
                                    </div>
                                    <div class="md-checkbox">
                                        <input type="checkbox" id="Furnished" name="furnished" class="md-check" value="1">
                                        <label for="Furnished">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Furnished</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-section">
                            Appliances & Description
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Facilities & Amenities
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <textarea class="wysihtml5 form-control" rows="10" name="editor9" data-error-container="#editor9_error"></textarea>
                                <div id="editor9_error"> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Description
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <textarea class="wysihtml5 form-control" rows="10" name="editor1" data-error-container="#editor1_error"></textarea>
                                <div id="editor1_error"> </div>
                            </div>
                        </div>
                        <div class="alert alert-section">
                            Map & Neighborhood
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Google Map
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <input type="text" name="map" data-required="1" class="form-control" />
                            </div>
                        </div>
                        <?php

                        for ($b = 1; $b <= 6; $b++) {

                        ?>
                            <div class="form-group">
                                <label class="control-label col-md-3">Neighborhood <?php echo "$b"; ?>
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-9">
                                    <input type="text" name="close<?php echo "$b"; ?>" data-required="1" class="form-control" style="width: auto; display:inline;" />
                                    <input type="text" name="distance<?php echo "$b"; ?>" data-required="1" class="form-control" style="width: auto; display:inline;" />
                                </div>
                            </div>
                        <?php } ?>
                        <div class="alert alert-section">
                            Photo Gallery
                        </div>
                        <?php
                        for ($i = 1; $i <= 9; $i++) {
                        ?>
                            <div class="form-group">
                                <label class="control-label col-md-3">Image
                                    <?php
                                    if ($i == 1) {
                                        echo " Main<span class=\"required\"> * </span>";
                                    }
                                    if ($i == 2) {
                                        echo "<span class=\"required\"> * </span>";
                                    }
                                    ?>
                                </label>
                                <div class="col-md-5">
                                    <div class="col-md-6 noleftpadding fileinputres">
                                        <input type="file" name="imgproject<?php echo "$i"; ?>" data-required="1" class="form-control" />
                                    </div>
                                    <div class="col-md-6 nolrpadding">
                                        <input type="text" name="imgnameproject<?php echo "$i"; ?>" data-required="1" class="form-control" placeholder="Image Name" />
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="alert alert-section">
                            Meta Data Section
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Title
                            </label>
                            <div class="col-md-6">
                                <input type="text" name="title" data-required="1" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Keyword
                            </label>
                            <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="keyword"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Description
                            </label>
                            <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="description"></textarea>
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