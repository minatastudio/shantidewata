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
                $getdata = mysqli_query($con, "select * from $tb_property where id = '$_GET[id]'");
                $data = mysqli_fetch_array($getdata, MYSQLI_BOTH);
                $meta = explode("^", $data[meta]);
                $image = explode("^", $data[image]);
                $imagename = explode("^", $data[imagename]);
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

                            // gallery

                            for ($i = 1; $i <= 9; $i++) {

                                $img = $_FILES["imgprojectedit" . ($i)]["name"];
                                if (trim($img) != "") {
                                    $file_img = $_POST[id] . "_property_" . $img;
                                    move_uploaded_file($_FILES["imgprojectedit" . ($i)]["tmp_name"], "$pathimg_property" . $file_img);
                                    $images .= $file_img . "^";
                                    $image_name .= $_POST["imgnameproject" . ($i)] . "^";
                                } else {
                                    if (isset($_POST["deleteimg" . ($i)])) {
                                        $images .= "";
                                        $image_name .= "";
                                    } else {
                                        if (trim($_POST["recentimg" . ($i)]) != "") {
                                            $images .= $_POST["recentimg" . ($i)] . "^";
                                            $image_name .= $_POST["imgnameproject" . ($i)] . "^";
                                        } else {
                                            $images .= "";
                                            $image_name .= "";
                                        }
                                    }
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

                            $update = "update property set code = '$_POST[name1]', name = '$_POST[name]', category = '$_POST[category]', location = '$_POST[location]', type ='$_POST[tipe]', landsize = '$_POST[land]',";
                            $update .= "buildsize ='$_POST[build]', bedroom = '$_POST[bedroom]', bathroom = '$_POST[bathroom]' ,living = '$_POST[living]', pool = '$_POST[pool]',garden = '$_POST[garden]' ,";
                            $update .= "parking = '$_POST[parking]',view = '$_POST[view]', furnished='$_POST[furnished]', floor = '$_POST[lantai]', price = '$_POST[price]', pricetype = '$_POST[tipeharga]',";
                            $update .= "pricenote = '$_POST[pricenote]', map = '$_POST[map]', neighborhood = '$tetangga', image = '$data_images', imagename = '$img_name', content = '$content', alias = '$alias',";
                            $update .= "meta ='$meta', year = '$_POST[year]' where id = '$_POST[id]'";


                            $cek = mysqli_query($con, "select * from $tb_property where name = '$_POST[name]' and  category =  '$_POST[category]' and type = '$_POST[tipe]' and location = '$_POST[location]' and id != '$_POST[id]'");
                            if ($ceks = mysqli_fetch_array($cek, MYSQLI_BOTH)) {
                                $hasil = "<div class=\"alert alert-danger\">";
                                $hasil .= "<p><strong>Error!!!</strong> Data Already in database, plase add another data....!</p></div>";
                            } else {
                                $insertdata = mysqli_query($con, $update) or die("Query Failed = $update");
                                if ($insertdata) {
                                    $hasil = "<div class=\"alert alert-success\">";
                                    $hasil .= "<p>Data Update Successfully....!</p></div>";
                                }
                            }
                            echo "$hasil";
                            $getdata = mysqli_query($con, "select * from $tb_property where id = '$_GET[id]'");
                            $data = mysqli_fetch_array($getdata, MYSQLI_BOTH);
                            $meta = explode("^", $data[meta]);
                            $image = explode("^", $data[image]);
                            $imagename = explode("^", $data[imagename]);
                            $content =  explode("^", $data[content]);
                        }
                        ?>
                        <div class="form-group">
                            <input type="hidden" name="id" data-required="1" class="form-control" value="<?php echo "$_GET[id]"; ?>" />
                            <label class="control-label col-md-3">Code Property
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <input type="text" name="name1" data-required="1" class="form-control" value="<?php echo $data[code]; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Name
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <input type="text" name="name" data-required="1" class="form-control" value="<?php echo $data[name]; ?>" />
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
                                            if ($i == $data[category]) {
                                                $cheked_c = "checked";
                                            } else {
                                                $cheked_c = "";
                                            }
                                        ?>
                                            <div class="md-radio">
                                                <input type="radio" id="category<?php echo "$i"; ?>" name="category" class="md-radiobtn" value="<?php echo $data_category[id]; ?>" <?php echo $cheked_c; ?>>
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
                                        if ($data_location[id] == $data[location]) {
                                            $selected = "selected";
                                        } else {
                                            $selected = "";
                                        }
                                    ?>
                                        <option value="<?php echo $data_location[id]; ?>" <?php echo $selected; ?>><?php echo $data_location[name]; ?></option>
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
                                            if ($i == $data[type]) {
                                                $cheked_c = "checked";
                                            } else {
                                                $cheked_c = "";
                                            }
                                        ?>
                                            <div class="md-radio">
                                                <input type="radio" id="tipe<?php echo "$i"; ?>" name="tipe" class="md-radiobtn" value="<?php echo $data_tipe[id]; ?>" <?php echo $cheked_c; ?>>
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
                                <input type="text" name="price" data-required="1" class="form-control" style="display: inline; width:auto;" value="<?php echo $data[price]; ?>" />
                                <select class="form-control" id="form_control_1" name="tipeharga" style="display: inline;width:auto;">
                                    <?php
                                    if ($data[pricetype] == "1") {
                                        $tp1 = "selected";
                                    } else if ($data[pricetype] == "2") {
                                        $tp2 = "selected";
                                    } else if ($data[pricetype] == "3") {
                                        $tp3 = "selected";
                                    } else if ($data[pricetype] == "4") {
                                        $tp4 = "selected";
                                    } else if ($data[pricetype] == "5") {
                                        $tp5 = "selected";
                                    } else if ($data[pricetype] == "6") {
                                        $tp6 = "selected";
                                    } else if ($data[pricetype] == "7") {
                                        $tp7 = "selected";
                                    } else if ($data[pricetype] == "8") {
                                        $tp8 = "selected";
                                    } else {
                                        $tp9 = "selected";
                                    }
                                    ?>
                                    <option value="1" <?php echo $tp1; ?>>Total</option>
                                    <option value="2" <?php echo $tp2; ?>>Per Day</option>
                                    <option value="3" <?php echo $tp3; ?>>Per Week</option>
                                    <option value="4" <?php echo $tp4; ?>>Per Month</option>
                                    <option value="5" <?php echo $tp5; ?>>Per Year</option>
                                    <option value="6" <?php echo $tp6; ?>>Per Are</option>
                                    <option value="7" <?php echo $tp7; ?>>Per 100 M<sup>2</sup></option>
                                    <option value="8" <?php echo $tp8; ?>>Per Are Per Year</option>
                                    <option value="9" <?php echo $tp9; ?>>Per 100 M<sup>2</sup> Per Year</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Price Note
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="pricenote" data-required="1" class="form-control" value="<?php echo $data[pricenote]; ?>" />
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
                                <input type="text" name="land" data-required="1" class="form-control" value="<?php echo $data[landsize]; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Building Size
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="build" data-required="1" class="form-control" value="<?php echo $data[buildsize]; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Year Build
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="year" data-required="1" class="form-control" value="<?php echo $data[year]; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">No. FLoor
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="lantai" data-required="1" class="form-control" value="<?php echo $data[floor]; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Bedroom
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="bedroom" data-required="1" class="form-control" value="<?php echo $data[bedroom]; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Bathroom
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="bathroom" data-required="1" class="form-control" value="<?php echo $data[bathroom]; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Living
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="living" data-required="1" class="form-control" value="<?php echo $data[living]; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">View
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="view" data-required="1" class="form-control" value="<?php echo $data[view]; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Others
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <?php
                                if ($data[garden] == "1") {
                                    $ck1 = "checked";
                                }
                                if ($data[pool] == "1") {
                                    $ck2 = "checked";
                                }
                                if ($data[parking] == "1") {
                                    $ck3 = "checked";
                                }
                                if ($data[furnished] == "1") {
                                    $ck4 = "checked";
                                }
                                ?>
                                <div class="md-checkbox-inline">
                                    <div class="md-checkbox">
                                        <input type="checkbox" id="Garden" name="garden" class="md-check" value="1" <?php echo $ck1; ?>>
                                        <label for="Garden">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Garden</label>
                                    </div>
                                    <div class="md-checkbox">
                                        <input type="checkbox" id="Pool" name="pool" class="md-check" value="1" <?php echo $ck2; ?>>
                                        <label for="Pool">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Pool </label>
                                    </div>
                                    <div class="md-checkbox">
                                        <input type="checkbox" id="Parking" name="parking" class="md-check" value="1" <?php echo $ck3; ?>>
                                        <label for="Parking">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Parking</label>
                                    </div>
                                    <div class="md-checkbox">
                                        <input type="checkbox" id="Furnished" name="furnished" class="md-check" value="1" <?php echo $ck4; ?>>
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
                                <textarea class="wysihtml5 form-control" rows="10" name="editor9" data-error-container="#editor9_error"><?php echo $content[0]; ?></textarea>
                                <div id="editor9_error"> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Description
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <textarea class="wysihtml5 form-control" rows="10" name="editor1" data-error-container="#editor1_error"><?php echo $content[1]; ?></textarea>
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
                                <input type="text" name="map" data-required="1" class="form-control" value="<?php echo $data[map]; ?>" />
                            </div>
                        </div>
                        <?php
                        $nb = explode("^", $data[neighborhood]);
                        $k = 0;
                        for ($b = 1; $b <= 6; $b++) {

                            $isinb = explode(",", $nb[$k]);
                            $k++;

                        ?>
                            <div class="form-group">
                                <label class="control-label col-md-3">Neighborhood <?php echo "$b"; ?>
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-9">
                                    <input type="text" name="close<?php echo "$b"; ?>" data-required="1" class="form-control" style="width: auto; display:inline;" value="<?php echo $isinb[0] ?>" />
                                    <input type="text" name="distance<?php echo "$b"; ?>" data-required="1" class="form-control" style="width: auto; display:inline;" value="<?php echo $isinb[1] ?>" />
                                </div>
                            </div>
                        <?php } ?>
                        <div class="alert alert-section">
                            Photo Gallery
                        </div>
                        <?php
                        $j = 0;
                        //echo"$data[image]";
                        for ($i = 0; $i <= 8; $i++) {
                            $j++;
                        ?>
                            <div class="form-group">
                                <label class="control-label col-md-3">Image
                                    <?php
                                    if ($j == 1) {
                                        echo " Main<span class=\"required\"> * </span>";
                                    }
                                    if ($j == 2) {
                                        echo "<span class=\"required\"> * </span>";
                                    }
                                    ?>
                                </label>
                                <div class="col-md-5">
                                    <?php
                                    if (trim($image[$i]) != "") {
                                    ?>
                                        <div class="col-md-12 noleftpadding">
                                            <img src="<?php echo "$pathimg_property" . "$image[$i]"; ?> " class="img-responsive thumbimg">
                                        </div>
                                        <div class="checkbox-list">
                                            <label>
                                                <input type="checkbox" value="1" name="deleteimg<?php echo "$j"; ?>" /> Delete Image
                                            </label>
                                        </div>
                                    <?php
                                    } else {
                                        echo "";
                                    }
                                    ?>
                                    <div class="col-md-6 noleftpadding fileinputres">
                                        <input type="file" name="imgprojectedit<?php echo "$j"; ?>" data-required="1" class="form-control" />
                                        <input type="hidden" name="recentimg<?php echo "$j"; ?>" value="<?php echo "$image[$i] "; ?>" />
                                    </div>
                                    <div class="col-md-6 nolrpadding">
                                        <input type="text" name="imgnameproject<?php echo "$j"; ?>" data-required="1" class="form-control" placeholder="Image Name" value="<?php echo "$imagename[$i]"; ?>" />
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