<?php
require("include/db.php");
require("include/live.php");
//general
$getdata = mysqli_query($con, "select * from $tb_content where id = 'general'");
$data = mysqli_fetch_array($getdata, MYSQLI_BOTH);
$meta = explode("^", $data[meta]);
$name = explode("^", $data[name]);
$imgdata = explode("^", $data[image]);
$imgnamedata = explode("^", $data[imgname]);
$content =  explode("^", $data[content]);

//contact
$getdatacontact = mysqli_query($con, "select * from $tb_content where id = 'contact'");
$datacontact = mysqli_fetch_array($getdatacontact, MYSQLI_BOTH);
$contentcontact = explode("^", $datacontact[content]);
//wa link
$wa_link = str_replace("phone=", "phone=$contentcontact[5]", $wap_link);

require("header.php");
?>
<!-- top content -->
<section class="top-slide">
    <div class="main-title wrapper">
        <h1><?php echo "$name[0]"; ?></h1>
        <h4>
            <?php echo "$content[0]"; ?>
        </h4>
    </div>
    <div>
        <img src="<?php echo $pathimg_content . $imgdata[0]; ?>" alt="" />
    </div>
    <?php
    require("search-form.php");
    ?>
</section>
<!-- list -->
<section class="listing wrapper">
    <h2>Our Perfect Place in Bali</h2>
    <div>
        <!-- list property -->
        <?php
        $tableproperty = mysqli_query($con, "select * from $tb_property where active != '0' order by id DESC, active ASC limit 6");
        while ($dataproperty = mysqli_fetch_array($tableproperty, MYSQLI_BOTH)) {
            $nameproperty = explode("^", $dataproperty[name]);
            $imgproperty = explode("^", $dataproperty[image]);
            $imgnameproperty = explode("^", $dataproperty[imageimage]);
            $categoryproperty = getname($tb_category, $dataproperty[category], $con);
            $typeproperty = getname($tb_type, $dataproperty[type], $con);
            $aliastype = getalias($tb_type, $dataproperty[type], $con);
            $locationproperty = getname($tb_location, $dataproperty[location], $con);
            $imgpropertythumb = $pathimg_property . $imgproperty[0];
            $price = rupiah($dataproperty[price]);
        ?>

            <div class="thumb-property">
                <div>
                    <h5><?php echo $nameproperty[0]; ?></h5>
                    <span><?php echo $dataproperty[code]; ?></span>
                </div>
                <div>
                    <a href="<?php echo $root . "/page/baliproperty/" . strtolower($categoryproperty) . "/" . strtolower($aliastype) . "/" . $dataproperty[alias] . "/" . $dataproperty[id]; ?>">
                        <img src="<?php echo $imgpropertythumb; ?>" alt="<?php echo $imgnameproperty[0]; ?>" srcset="" /></a>
                    <?php
                    if ($dataproperty[active] == "2") {
                    ?>
                        <div class="sold"><strong>PROPERTY SOLD</strong></div>
                    <?php
                    } else {
                    ?>
                        <div><?php echo $price; ?> <span>(<?php echo $typeproperty; ?>)</span></div>
                    <?php } ?>
                </div>
                <div>
                    <i class="icon-map-1"><span><?php echo $categoryproperty; ?></span></i>
                    <i class="icon-square"><span><?php echo $dataproperty[landsize]; ?> M<sup>2</sup></span></i>
                    <i class="icon-bedroom"><span><?php echo $dataproperty[bedroom]; ?> Bedroom</span></i>
                    <i class="icon-bathroom"><span><?php echo $dataproperty[bathroom]; ?> Bathroom</span></i>
                </div>
            </div>
            </a>
        <?php } ?>

    </div>
    <div class="btm-link">
        <a href="" class="link-big">Find More Perfect Property in Bali</a>
    </div>
</section>
<?php
require("common.php");
require("footer.php");
?>