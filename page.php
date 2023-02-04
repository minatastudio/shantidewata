<?php
require("include/db.php");
require("include/live.php");
//general
if ($_GET[path5] != "") {
    $target_data = $_GET[path5];
    $tb_target = "property";
} else {
    if ($_GET[path1] == "villa") {
        $target_data = "main_villa";
    }
    if ($_GET[path1] == "land") {
        $target_data = "main_land";
    }
    if ($_GET[path1] == "commercial") {
        $target_data = "main_commercial";
    }
    if ($_GET[path1] == "business") {
        $target_data = "main_business";
    }
    if ($_GET[path1] == "villa-rental") {
        $target_data = "main_rental";
    }
    if ($_GET[path1] == "property-search") {
        $target_data = "main_search";
    }
    if ($_GET[path1] == "about") {
        $target_data = "about";
    }
    if ($_GET[path1] == "contact") {
        $target_data = "contact";
    }
    if ($_GET[path1] == "design") {
        $target_data = "design";
    }
    if ($_GET[path1] == "marketing") {
        $target_data = "marketing";
    }
    if ($_GET[path1] == "build") {
        $target_data = "build";
    }
    if ($_GET[path1] == "management") {
        $target_data = "management";
    }
    $tb_target = "content";
}
$getdata = mysqli_query($con, "select * from $tb_target where id = '$target_data'");
$data = mysqli_fetch_array($getdata, MYSQLI_BOTH);
$meta = explode("^", $data[meta]);
$image = explode("^", $data[image]);
$imagename = explode("^", $data[imagename]);
$content =  explode("^", $data[content]);
$imgproperty = explode("^", $data[image]);
$imgnameproperty = explode("^", $data[imagename]);
$categoryproperty = getname($tb_category, $data[category], $con);
$typeproperty = getname($tb_type, $data[type], $con);
$locationproperty = getname($tb_location, $data[location], $con);
$name_g =  explode("^", $data[name]);


//contact
$getdatacontact = mysqli_query($con, "select * from $tb_content where id = 'contact'");
$datacontact = mysqli_fetch_array($getdatacontact, MYSQLI_BOTH);
$contentcontact = explode("^", $datacontact[content]);
//wa link
$wa_link = str_replace("phone=", "phone=$contentcontact[5]", $wap_link);

require("header.php");
if ($_GET[path1] == "baliproperty") {
    require("baliproperty.php");
}
if ($_GET[path1] == "villa" or $_GET[path1] == "land" or $_GET[path1] == "commercial" or $_GET[path1] == "business" or $_GET[path1] == "villa-rental") {
    require("listing.php");
}
if ($_GET[path1] == "property-search") {
    require("property-search.php");
}
if ($_GET[path1] == "contact") {
    require("contact.php");
}

if ($_GET[path1] == "about") {
    require("about.php");
}
if ($_GET[path1] == "marketing") {
    require("marketing.php");
}
if ($_GET[path1] == "management") {
    require("management.php");
}
if ($_GET[path1] == "build") {
    require("build.php");
}
if ($_GET[path1] == "design") {
    require("design.php");
}
?>




<?php
if ($_GET[path1] == "baliproperty") {
    require("smilar.php");
}
require("common.php");
require("footer.php");
?>