<?php
//general
$getdata = mysqli_query($con, "select * from $tb_content where id = 'general'");
$data = mysqli_fetch_array($getdata, MYSQLI_BOTH);
$name = explode("^", $data[name]);
$content =  explode("^", $data[content]);

?>
<section class="why">
    <div class="wrapper">
        <div>
            <h2>
                <?php echo "$name[1]";  ?>
            </h2>
            <h5><?php echo "$name[8]";   ?></h5>
            <div class="why-list">
                <i class="<?php echo "$name[5]"; ?>"></i>
                <div>
                    <h4><?php echo "$name[2]"; ?></h4>
                    <p>
                        <?php echo "$content[1]"; ?>
                    </p>
                </div>
            </div>
            <div class="why-list">
                <i class="<?php echo "$name[6]"; ?>"></i>
                <div>
                    <h4><?php echo "$name[3]"; ?></h4>
                    <p>
                        <?php echo "$content[2]"; ?>
                    </p>
                </div>
            </div>
            <div class="why-list">
                <i class="<?php echo "$name[7]"; ?>"></i>
                <div>
                    <h4><?php echo "$name[4]"; ?></h4>
                    <p>
                        <?php echo "$content[3]"; ?>
                    </p>
                </div>
            </div>
        </div>
        <div>
            <a href="<?php echo $wa_link; ?>" class="link-svg"><i class="icon-whatsapp1"></i> Start Discuss With Us
            </a>
        </div>
    </div>
</section>