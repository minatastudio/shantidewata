<section class="detail-property wrapper">
    <div>
        <div class="main-img">
            <img src="<?php echo $pathimg_property . $imgproperty[0]; ?>" alt="<?php echo $imgnameproperty[0]; ?>" />
        </div>

        <div class="right-detail">
            <div>
                <h1><?php echo $data[name]; ?></h1>
                <ul class="list-top">
                    <li>
                        <i class="icon-square"><span><?php echo $data[landsize]; ?> M<sup>2</sup></span></i>
                    </li>
                    <?php if ($_GET[path2] == "land" or $_GET[path2] == "commercial" or $_GET[path2] == "business") {
                    ?>
                        <li>
                            <i class="icon-map-1"><span><?php echo $locationproperty; ?></i>
                        </li>
                        <li>
                            <i class="icon-certificate"><span><?php echo $typeproperty; ?></i>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li>
                            <i class="icon-bedroom"><span><?php echo $data[bedroom]; ?> Bedroom</span></i>
                        </li>
                        <li>
                            <i class="icon-bathroom"><span><?php echo $data[bathroom]; ?> Bathroom</span></i>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <?php
                if ($data[active] == "2") {
                    $pricing = "PROPERY SOLD";
                } else {
                    $pricing = rupiah($data[price]);
                }
                $tipeharga = pricing($data[pricetype]);
                ?>
                <h5 class="price"><?php echo $pricing; ?><span><?php echo $tipeharga; ?></span></h5>
                <ul class="sum-detail">
                    <li><span>Ref ID </span><span><?php echo $data[code]; ?></span></li>
                    <li><span>Location</span><span><?php echo $locationproperty; ?></span></li>
                    <li>
                        <span>Listing Type</span><span><?php echo $categoryproperty; ?></span>
                    </li>
                    <li>
                        <span>Property Type </span><span><?php echo $typeproperty; ?></span>
                    </li>
                    <li>
                        <span>Land Size</span><span><?php echo $data[landsize]; ?> M<sup>2</sup></span>
                    </li>
                    <?php if ($_GET[path2] != "land") {
                    ?>
                        <li>
                            <span>Building Size</span><span><?php echo $data[buildsize]; ?> M<sup>2</sup></span>
                        </li>
                        <li>
                            <span>Floor</span><span><?php echo $data[floor]; ?></span>
                        </li>
                        <li><span>Year Built</span><span><?php echo $data[year]; ?></span></li>

                    <?php } ?>
                    <li>
                        <span>Price Type</span><span><?php echo $data[pricenote]; ?></span>
                    </li>
                </ul>
                <div class="link-request">
                    <a href="" class="link-svg"><i class="icon-mail"></i> Request A Visit</a>
                    <a href="" class="link-svg"><i class="icon-whatsapp"></i> Contact Us</a>
                </div>
            </div>
        </div>

        <div class="description">
            <h2><?php echo $data[name]; ?></h2>
            <p>
                <?php echo $content[1]; ?>
            </p>
        </div>
        <?php if ($_GET[path2] == "villa") {
        ?>
            <!-- features -->
            <div class="features">
                <h5>Features</h5>
                <ul>
                    <li><span>Bedrooms</span><span><?php echo $data[bedroom]; ?></span></li>
                    <li><span>Living</span><span><?php echo $data[living]; ?></span></li>
                    <li><span>Pool</span><span><?php echo $pool = yes($data[pool]); ?></span></li>
                    <li><span>Bathrooms</span><span><?php echo $data[bathroom]; ?></span></li>
                    <li><span>Garden</span><span><?php echo $pool = yes($data[garden]); ?></span></li>
                    <li><span>Parking</span><span><?php echo $pool = yes($data[parking]); ?></span></li>
                    <li><span>View</span><span><?php echo $data[view]; ?></span></li>
                    <li><span>Furnished</span><span><?php echo $pool = yes($data[furnished]); ?></span></li>
                    <li><span>Floor</span><span><?php echo $data[floor]; ?></span></li>
                </ul>
            </div>
            <!-- Appliances -->
        <?php }
        if ($_GET[path2] != "land") {
        ?>
            <div class="facilities">
                <h5>Facilities & Amenities</h5>
                <?php
                $facilities = str_replace("<li>", "<li><i class=\"icon-right-arrow\"></i>", $content[0]);
                echo $facilities; ?>
            </div>
        <?php } ?>
        <!-- Neighborhood -->
        <div class="neighborhood">
            <h5>Neighborhood</h5>
            <ul>
                <?php
                $nb = explode("^", $data[neighborhood]);
                for ($b = 0; $b < count($nb); $b++) {
                    if (strlen($nb[$b]) > 2) {
                        $ng = explode(",", $nb[$b]);
                        echo "<li><span>$ng[0]</span><i class=icon-car><span>$ng[1]</span></i></li>";
                    } else {
                        echo "";
                    }
                }
                ?>
            </ul>
        </div>

        <!-- Map -->
        <div class="map-detail">
            <iframe src="<?php echo $data[map]; ?>" width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="gallery-image">
            <div class="area">
                <?php
                for ($i = 1; $i <= 8; $i++) {
                    if ($imgproperty[$i] != "") {
                ?>

                        <div class="thumb-img">
                            <img src="<?php echo $pathimg_property . $imgproperty[$i]; ?>" alt="<?php echo $imgnameproperty[$i]; ?>" onclick="openModal();currentSlide(<?php echo $i; ?>)" class="hover-shadow cursor" />
                        </div>

                <?php
                    }
                }
                ?>
            </div>
        </div>
        <div id="myModal" class="modal">
            <span class="close cursor" onclick="closeModal()">&times;</span>
            <div class="modal-content">
                <?php
                for ($i = 1; $i <= 8; $i++) {
                    if ($imgproperty[$i] != "") {
                ?>
                        <div class="mySlides">
                            <div class="numbertext"><?php echo $imgnameproperty[$i]; ?></div>
                            <img src="<?php echo $pathimg_property . $imgproperty[$i]; ?>" alt="<?php echo $imgnameproperty[$i]; ?>" style="width: 100%" />
                        </div>

                <?php }
                } ?>

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>


            </div>
        </div>
    </div>
</section>