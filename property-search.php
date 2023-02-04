<!-- top content -->
<?php
$getdata_top = mysqli_query($con, "select * from $tb_content where id = 'main_search'");
$data_top = mysqli_fetch_array($getdata_top, MYSQLI_BOTH);
$meta_top = explode("^", $data_top[meta]);
$name_top = explode("^", $data_top[name]);
$imgdata_top = explode("^", $data_top[image]);
$imgnamedata_top = explode("^", $data_top[imgname]);
$content_top =  explode("^", $data_top[content]);
?>
<section class="top-slide page-listing">
    <div class="main-title wrapper" style="
    background: linear-gradient(215.35deg,
                rgba(254, 216, 24, 0.9) 22.82%,
                rgba(253, 200, 26, 0.5) 46.74%,
                rgba(247, 149, 33, 1) 98.79%
            ),
            url(<?php echo "$pathimg_content" . "$imgdata_top[0]"; ?> );
        background-size: cover;">
        <h1><?php echo "$name_top[0]"; ?></h1>
        <h4>
            <?php echo "$content_top[0]"; ?>
        </h4>
    </div>
    <div>
        <!-- <img src="/assets/image/img-1.jpg" alt="" /> -->
    </div>
    <?php
    require("search-form.php");
    ?>
</section>
<!-- list -->
<!-- list property -->
<?php
// keyword
if ($_GET[keyword] != "") {
    $keyword = "and (content LIKE '%$_GET[keyword]%' or name LIKE '%$_GET[keyword]%')";
}
// location
if ($_GET[location] != "0") {
    $location = " and location = '$_GET[location]'";
}
// property
if ($_GET[category] != "0") {
    $category = " and category = '$_GET[category]'";
}
// tipe
if ($_GET[tipe] != "0") {
    $type = " and type = '$_GET[tipe]'";
}
// bedroom
if ($_GET[bedroom1] != "" and $_GET[bedroom2] != "") {
    $bedroom = " and bedroom BETWEEN $_GET[bedroom1] and $_GET[bedroom2]";
}
if ($_GET[bedroom1] != "" and $_GET[bedroom2] == "") {
    $bedroom = " and bedroom >= $_GET[bedroom1]";
}
if ($_GET[bedroom1] == "" and $_GET[bedroom2] != "") {
    $bedroom = " and bedroom <= $_GET[bedroom2]";
}

// price
if ($_GET[price1] != "" and $_GET[price2] != "") {
    $price = " and price BETWEEN $_GET[price1] and $_GET[price2]";
}
if ($_GET[price1] != "" and $_GET[price2] == "") {
    $price = " and price >= $_GET[price1]";
}
if ($_GET[price1] == "" and $_GET[price2] != "") {
    $price = " and price <= $_GET[price2]";
}

// land
if ($_GET[land1] != "" and $_GET[land2] != "") {
    $land = " and land BETWEEN $_GET[land1] and $_GET[land2]";
}
if ($_GET[land1] != "" and $_GET[land2] == "") {
    $land = " and land >= $_GET[land1]";
}
if ($_GET[land1] == "" and $_GET[land2] != "") {
    $land = " and land <= $_GET[land2]";
}

$i = 0;
$sqlRec = "SELECT COUNT(*) from $tb_property where active != '0' $keyword $location $category $type $bedroom  $price $land";
$query_data = "select * from $tb_property where active != '0' $keyword $location $category $type $bedroom  $price $land order by id DESC, active ASC  ";
//echo "$query_data";
$page = $_GET[pages];
$halaman = $root . "/page/$_GET[path1]/?keyword=$_GET[keyword]&location=$_GET[location]&category=$_GET[category]&tipe=$_GET[tipe]&bedroom1=$_GET[bedroom1]&bedroom2=$_GET[bedroom2]&price1=$_GET[price1]&price2=$_GET[price2]&land1=$_GET[land1]&land2=$_GET[land2]";
//echo"$query2";
$PAGE_DEFAULT = 1;
$PAGESIZE_DEFAULT = 1;
$PAGESIZE_LOWER_LIMIT = 9;
$PAGESIZE_UPPER_LIMIT = 100;
if (!isset($page)) $page = $PAGE_DEFAULT;
if ($page < 1 && $page != -1) $page = 1;
if (!isset($pagesize)) $pagesize = $PAGESIZE_DEFAULT;
if ($pagesize < $PAGESIZE_LOWER_LIMIT)
    $pagesize = $PAGESIZE_LOWER_LIMIT;
if ($pagesize > $PAGESIZE_UPPER_LIMIT)
    $pagesize = $PAGESIZE_UPPER_LIMIT;
// kita perlu mengetahui jumlah record dulu jika menginginkan halaman
// terakhir
//echo" $sqlHasil ";
//$sqlRec = "SELECT COUNT(*) FROM $tb_offer where active='1'";

$hasil = mysqli_query($con, $sqlRec);

list($total_rows) = mysqli_fetch_row($hasil);

// konversi dari $page & $pagesize menjadi $count & $offset untuk klausa
// LIMIT MySQL
//echo"$total_rows == ";
if ($page == -1) {
    $count = $pagesize;
    $offset = $total_rows - $pagesize;
} else {
    $count = $pagesize;
    $offset = ($page - 1) * $pagesize;
}

// buat bar navigasi prev, next, first, last, pages...
$last_page      = ceil($total_rows / $pagesize);  // hlm terakhir = jml hlm
$adjacent_pages_links = ($page > 6 ? "<span class=default_page>...</span>" : "");
for ($i = $page - 5; $i < $page; $i++) {
    if ($i < 1) continue;
    $adjacent_pages_links .= "" . "<a href=$halaman&pages=$i class=page_link>$i</a>";
}
$adjacent_pages_links .= "<span class=selected_page>$page</span>";
for ($i = $page + 1; $i < ($page + 6); $i++) {
    if ($i > $last_page) break;
    $adjacent_pages_links .= "" .
        "<a href=$halaman&pages=$i class=page_link>$i</a>";
}
$adjacent_pages_links .= ($page + 5 < $last_page ? "<span class=default_page>...</span>" : "");
$navigasi = "<table border=0 cellspacing=0 cellpadding=0 width=100% align=center class=no-border><tr>" .
    "<td class=paging_area>" . ($page == 1 ? "<span class=default_page>&laquo;</span>" :
        "<a href=$halaman" . "&pages=" . ($page - 1) . " class=page_link>&laquo;</a>") .
    ($page == 1 ? "<span class=default_page>First</span>" :
        "<a href=$halaman" . "&pages=1 class=page_link>First</a>") . "$adjacent_pages_links" .
    ($page == $last_page ? "<span class=default_page>Last</span>" :
        "<a href=$halaman" . "&pages=$last_page class=page_link>Last</a>") .
    ($page == $last_page ? "<span class=default_page>&raquo;</span>" :
        "<a href=$halaman" . "&pages=" . ($page + 1) . " class=page_link>&raquo;</a>") .
    "</td>" . "</tr></table>";

$tableproperty = mysqli_query($con, "$query_data LIMIT $offset, $count");
?>
<section class="listing wrapper">
    <h2>Search Result Property <span>( <?php echo $total_rows; ?> Property Founded )</span></h2>
    <div>
        <?php
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
            $tipeharga = pricing($dataproperty[pricetype]);

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
                        <div><?php echo $price . $tipeharga;  ?> <span>(<?php echo $typeproperty; ?>)</span></div>
                    <?php } ?>
                </div>
                <div>
                    <i class="icon-map-1"><span><?php echo $locationproperty; ?></span></i>
                    <i class="icon-square"><span><?php echo $dataproperty[landsize]; ?> M<sup>2</sup></span></i>
                    <?php
                    if ($dataproperty[category] == "1") {
                    ?>
                        <i class="icon-bedroom"><span><?php echo $dataproperty[bedroom]; ?> Bedroom</span></i>
                        <?php
                        if ($dataproperty[type] == "2") {
                        ?>
                            <i class="icon-money"><span><?php echo $dataproperty[pricenote]; ?></span></i>
                        <?php
                        } else {
                        ?>
                            <i class="icon-bathroom"><span><?php echo $dataproperty[bathroom]; ?> Bathroom</span></i>

                        <?php
                        }
                        ?>
                    <?php } else { ?>
                        <i class="icon-certificate"><span><?php echo  $typeproperty; ?></span></i>
                        <i class="icon-money"><span><?php echo $dataproperty[pricenote]; ?></span></i>
                    <?php
                    }
                    ?>
                </div>
            </div>
            </a>
        <?php } ?>

    </div>
    <div class="navigasi">
        <?php
        echo "$navigasi";
        ?>
    </div>
</section>