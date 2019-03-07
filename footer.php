<footer>
    <div class="block block-p">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-xs-6 col-sm-3 ">
                    <div class="widget">
                        <div class="about_widget">
                            <div class="footer-title"  >
                                <a href="index.php" title=""><img src="images/resource/logo11.png" alt=""  id="footer-logo-width"/></a>
                            </div>

                            <div class="link_widgets">
                                <div class="row">
                                    <div class="center-block">
                                        <a href="member/login.php" title="Member Registration">Join Us </a>
                                        <a href="company/login.php" title="">Post Jobs</a>
                                    </div>
                                </div>
                            </div>

                        </div><!-- About Widget -->
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6  col-sm-3 ">
                    <div class="widget">
                        <div class="about_widget">
                            <h3 class="footer-title " id="footer-title-res">Contact Us</h3>
                            <span>Sampatha Adurathwila , Poddala, Galle</span>
                            <span>Sri Lanka</span>
                            <span>091 224 5333 </span>
                           <span> 071 724 5333 | 070 229 6679</span>
                            <span>info@supportlanka.lk</span>
                            <div class="social">
                                <a href="#" title=""><i class="fa fa-facebook"></i></a>
                                <a href="#" title=""><i class="fa fa-twitter"></i></a>
                                <a href="#" title=""><i class="fa fa-linkedin"></i></a>
                                <a href="#" title=""><i class="fa fa-pinterest"></i></a>
                                <a href="#" title=""><i class="fa fa-behance"></i></a>
                            </div>
                        </div><!-- About Widget -->
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6  col-sm-3  ">
                    <div class="widget">
                        <h3 class="footer-title">Quick Links</h3>
                        <div class="link_widgets">
                            <div class="row">
                                <div class="">
                                    <a href="index.php" title="">Home </a>
                                    <a href="all_member.php" title="">Members </a>
                                    <a href="all_employers.php" title="">Employers </a>
                                    <a href="vacancy.php" title="">Vacancy </a>
                                    <a href="about_us.php" title="">About Us </a>
                                    <a href="contact_us.php" title="">Contact Us </a>	
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6  col-sm-3 ">
                    <div class="widget">
                        <h3 class="footer-title">Find Jobs</h3>
                        <div class="link_widgets">
                            <div class="row">
                                <div class="col-lg-12">

                                    <?php
                                    $industry = Industry::all();
                                    if (count($industry) > 0) {
                                        foreach ($industry as $key => $ind) {
                                            if ($key < 6) {
                                                ?>

                                                <a href="all_employers.php?industry=<?php echo $ind['id']; ?>" title=""><?php echo $ind['name']; ?></a>	
                                                <?php
                                            }
                                        }
                                    } else {
                                        ?> 
                                        <b>No vacancy in the database.</b> 
                                        <?php
                                    }
                                    ?> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-line">
        <span>@<?php echo date("Y"); ?> Copy Right by Support Lanka</span>
        <a style="color: #fff;" href="http://www.sublime.lk/">
            <b> Design By- www.sublime.lk</b>
        </a>
    </div>
    <div id="google_translate_element"></div>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element');
        }
    </script>
    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" type="text/javascript"></script>

    <script type="text/javascript">
        $('.translation-links a').click(function () {
            var lang = $(this).data('lang');
            var $frame = $('.goog-te-menu-frame:first');
            if (!$frame.size()) {
                alert("Error: Could not find Google translate frame.");
                return false;
            }
            $frame.contents().find('.goog-te-menu2-item span.text:contains(' + lang + ')').get(0).click();
            return false;
        });
    </script>
</footer>


