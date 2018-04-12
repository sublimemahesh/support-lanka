<footer>
    <div class="block">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 column">
                    <div class="widget">
                        <div class="about_widget">
                            <div class="footer-title">
                                <a href="index.php" title=""><img src="images/resource/logo11.png" alt="" /></a>
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
                <div class="col-lg-3 column">
                    <div class="widget">
                        <div class="about_widget">
                            <h3 class="footer-title">Contact Us</h3>
                            <span>Sri Dewamitta RD, Galle.</span>
                            <span>SRi Lanka</span>
                            <span>+949 1312 44 77</span>
                            <span>info@sublime.lk</span>
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
                <div class="col-lg-3 column">
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
                <div class="col-lg-3 column">
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
        <span>@<?php echo date("Y"); ?> Sri Lanka Cycling Designed by</span>
        <a style="color: #fff;" href="http://www.sublime.lk/">
            <b>www.sublime.lk</b>
        </a>
    </div>

</footer>


