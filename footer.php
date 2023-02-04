<footer>
    <div class="wrapper">
        <div class="right">
            <h2>Perfect Links Property</h2>
            <ul>
                <li><a href="<?php echo $root . "/page/villa/rental"; ?>">Villa Rental</a></li>
                <li><a href="<?php echo $root . "/page/villa/sale"; ?>">Villa Sale</a></li>
                <li><a href="<?php echo $root . "/page/commercial/sale"; ?>">Commercial sale</a></li>
                <li><a href="<?php echo $root . "/page/land/sale"; ?>">Land Sale</a></li>
                <li><a href="<?php echo $root . "/page/management"; ?>">Property Management</a></li>
            </ul>
            <ul>
                <li><a href="<?php echo $root . "/page/marketing"; ?>">Marketing</a></li>
                <li><a href="<?php echo $root . "/page/design"; ?>">Design</a></li>
                <li><a href="<?php echo $root . "/page/build"; ?>">Build Property</a></li>
                <li class="sosmed">
                    <a href="<?php echo "$contentcontact[6]"; ?>" target="_blank"><i class="icon-facebook"></i></a><a href="<?php echo "$contentcontact[7]"; ?>" target="_blank"><i class="icon-instagram"></i></a>
                </li>
            </ul>
        </div>
        <div class="left">
            <img src="<?php echo $root; ?>/assets/image/logo.webp" alt="" />
            <ul>
                <li>
                    <div><i class="icon-map"></i></div>
                    <div>
                        <?php echo "$contentcontact[2]"; ?>
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
            </ul>
        </div>
    </div>
    <div class="copyright">
        <div class="wrapper">
            <div>
                <?php echo $copyright1; ?>
            </div>
            <div>
                <?php echo $copyright2; ?>
            </div>
        </div>
    </div>
</footer>
<script>
    // search-box open close js code
    let navbar = document.querySelector('.navbar');
    // sidebar open close js code
    let navLinks = document.querySelector('.nav-links');
    let menuOpenBtn = document.querySelector('.navbar .icon-menu');
    let menuCloseBtn = document.querySelector('.nav-links .icon-close');
    menuOpenBtn.onclick = function() {
        navLinks.style.left = '0';
    };
    menuCloseBtn.onclick = function() {
        navLinks.style.left = '-100%';
    };

    // sidebar submenu open close js code
    let htmlcssArrow = document.querySelector('.htmlcss-arrow');
    htmlcssArrow.onclick = function() {
        navLinks.classList.toggle('show1');
    };
    let moreArrow1 = document.querySelector('.arrow-sub1');
    moreArrow1.onclick = function() {
        navLinks.classList.toggle('show2');
    };
    let jsArrow = document.querySelector('.js-arrow');
    jsArrow.onclick = function() {
        navLinks.classList.toggle('show3');
    };
    let moreArrow2 = document.querySelector('.arrow-sub2');
    moreArrow2.onclick = function() {
        navLinks.classList.toggle('show4');
    };
    let moreArrow3 = document.querySelector('.arrow-sub3');
    moreArrow3.onclick = function() {
        navLinks.classList.toggle('show5');
    };
    // select
    var mylocation = new Select('#location', {
        // auto show the live filter
        filtered: 'auto',
        // auto show the live filter when the options >= 8
        filter_threshold: 8,
        // custom placeholder
        filter_placeholder: 'Search Location',
    });
    var myproperty = new Select('#property', {
        // auto show the live filter
        filtered: 'auto',
        // auto show the live filter when the options >= 8
        filter_threshold: 8,
        // custom placeholder
        filter_placeholder: 'Search Location',
    });
    var mytipe = new Select('#tipe', {
        // auto show the live filter
        filtered: 'auto',
        // auto show the live filter when the options >= 8
        filter_threshold: 8,
        // custom placeholder
        filter_placeholder: 'Search Location',
    });

    function resetfunction() {
        document.getElementsByName("bedroom1").values = "";
    }

    function openModal() {
        document.getElementById('myModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('myModal').style.display = 'none';
    }

    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides((slideIndex += n));
    }

    function currentSlide(n) {
        showSlides((slideIndex = n));
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName('mySlides');
        var dots = document.getElementsByClassName('demo');
        var captionText = document.getElementById('caption');
        if (n > slides.length) {
            slideIndex = 1;
        }
        if (n < 1) {
            slideIndex = slides.length;
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = 'none';
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(
                ' active',
                ''
            );
        }
        slides[slideIndex - 1].style.display = 'block';
        dots[slideIndex - 1].className += ' active';
        captionText.innerHTML = dots[slideIndex - 1].alt;
    }
</script>
</body>

</html>