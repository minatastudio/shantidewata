<div class="search-form wrapper">
    <form action="<?php echo $root . "/page/property-search/"; ?>" enctype="multipart/form-data" method="GET" id="searchform">
        <h3>Find Your <span>Best Property</span></h3>
        <?php
        if ($_GET[path2] != "") {
            if (strpos($_GET[path2], "keyword")) {
                $reset_url = $root . "/" . "page/$_GET[path1]" . "/";
            } else {
                $reset_url = $root . "/" . "page/$_GET[path1]" . "/" . "$_GET[path2]" . "/";
            }
        } else {
            if ($_GET[path1] != "") {
                $reset_url = $root . "/" . "page/$_GET[path1]" . "/";
            } else {
                $reset_url = $root;
            }
        }

        ?>
        <div>
            <a href="<?php echo $reset_url; ?>" class="resetbutton"><svg viewBox="0 0 21 21" xmlns="http://www.w3.org/2000/svg">
                    <g fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round" transform="matrix(0 1 1 0 2.5 2.5)">
                        <path d="m3.98652376 1.07807068c-2.38377179 1.38514556-3.98652376 3.96636605-3.98652376 6.92192932 0 4.418278 3.581722 8 8 8s8-3.581722 8-8-3.581722-8-8-8" />
                        <path d="m4 1v4h-4" transform="matrix(1 0 0 -1 0 6)" />
                    </g>
                </svg><span>Reset</span></a>
            <input type="text" name="keyword" placeholder="Search Keyword" value="<?php echo $_GET[keyword]; ?>" />
            <select id="location" class="w15" name="location">
                <option value="0">Location</option>
                <?php
                $i = 0;
                $tipe_property = mysqli_query($con, "select * from $tb_location where active = '1'");
                while ($data_tipe = mysqli_fetch_array($tipe_property, MYSQLI_BOTH)) {
                    $i++;
                    if ($_GET[location] == $data_tipe[id]) {
                        $selected = "selected";
                    } else {
                        $selected = "";
                    }
                ?>
                    <option value="<?php echo $data_tipe[id]; ?>" <?php echo $selected; ?>><?php echo $data_tipe[name]; ?></option>
                <?php } ?>
            </select>
            <select id="property" class="w15" name="category">
                <option value="0">Property</option>
                <?php
                $i = 0;
                $tipe_property = mysqli_query($con, "select * from $tb_category where active = '1'");
                while ($data_tipe = mysqli_fetch_array($tipe_property, MYSQLI_BOTH)) {
                    $i++;
                    if ($_GET[location] == $data_tipe[id]) {
                        $selected = "selected";
                    } else {
                        $selected = "";
                    }
                ?>
                    <option value="<?php echo $data_tipe[id]; ?>" <?php echo $selected; ?>><?php echo $data_tipe[name]; ?></option>
                <?php } ?>
            </select>
            <select id="tipe" class="w15" name="tipe">
                <option value="0">Type</option>
                <?php
                $i = 0;
                $tipe_property = mysqli_query($con, "select * from $tb_type where active = '1'");
                while ($data_tipe = mysqli_fetch_array($tipe_property, MYSQLI_BOTH)) {
                    $i++;
                    if ($_GET[location] == $data_tipe[id]) {
                        $selected = "selected";
                    } else {
                        $selected = "";
                    }
                ?>
                    <option value="<?php echo $data_tipe[id]; ?>" <?php echo $selected; ?>><?php echo $data_tipe[name]; ?></option>
                <?php } ?>
            </select>
            <input type="text" name="bedroom1" placeholder="Min Bedroom" class="w15" value="<?php echo $_GET[bedroom1]; ?>" />
            <input type="text" name="bedroom2" placeholder="Max Bedroom" class="w15" value="<?php echo $_GET[bedroom2]; ?>" />
            <input type=" text" name="price1" placeholder="Min Price" value="<?php echo $_GET[price1]; ?>" />
            <input type=" text" name="price2" placeholder="Max Price" value="<?php echo $_GET[price2]; ?>" />
            <input type="text" name="land1" placeholder="Min Land Size (M2)" value="<?php echo $_GET[land1]; ?>" />
            <input type="text" name="land2" placeholder="Max Land Size (M2)" value="<?php echo $_GET[price2]; ?>" />
            <button type="submit">
                <i class="icon-search"></i> Search
            </button>
        </div>
    </form>
</div>