<!-- top detail -->
<section class="contact wrapper">
    <div>
        <div class="description">
            <h1><?php echo $datacontact[name]; ?></h1>
            <h2><?php echo "$contentcontact[9]"; ?>
            </h2>
        </div>
        <div class="form">
            <input type="text" placeholder="Full Name" name="name" />
            <input type="text" placeholder="Email" name="email" />
            <input type="tel" placeholder="Phone Number" name="phone" />
            <input type="text" placeholder="Country" name="country" />
            <input type="text" placeholder="State" name="state" />
            <input type="text" placeholder="Number Guest" name="guest" />
            <input type="date" placeholder="Check In" name="checkin" />
            <input type="date" placeholder="Check Out" name="checkout" />
            <textarea name="" id="" cols="30" rows="10" placeholder="Special Request"></textarea>
        </div>
        <div>
            <button type="submit" value="send inquiry">
                Send Request
            </button>
        </div>
        <div class="address">
            <div>
                <img src="<?php echo "$pathimg_content" . "$data[image]"; ?>" alt="" />
            </div>
            <div>
                <img src="/assets/image/logo.webp" alt="" />
                <ul>
                    <li>
                        <div><i class="icon-map"></i></div>
                        <div><?php echo "$contentcontact[2]"; ?>
                        </div>
                    </li>
                    <li>
                        <div><i class="icon-whatsapp1"></i></div>
                        <div><?php echo "$contentcontact[5]"; ?></div>
                    </li>
                    <li>
                        <div><i class="icon-mail"></i></div>
                        <div><?php echo "$contentcontact[3]"; ?></div>
                    </li>
                    <li class="sosmed">
                        <a href="<?php echo "$contentcontact[6]"; ?>"><i class="icon-facebook"></i></a><a href="<?php echo "$contentcontact[7]"; ?>"><i class="icon-instagram"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>