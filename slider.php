<section>
    <div class="block no-padding">
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-featured-sec">
                        <ul class="main-slider-sec text-arrows">
                            <li class="slideHome"><img src="images/resource/mslider3.jpg" alt="" /></li>
                            <li class="slideHome"><img src="images/resource/mslider2.jpg" alt="" /></li>
                            <li class="slideHome"><img src="images/resource/mslider1.jpg" alt="" /></li>
                        </ul>
                        <div class="job-search-sec">
                            <div class="job-search">
                                <h3>The Easiest Way to Get Your New Job</h3>
                                <span>Find Jobs, Employment & Career Opportunities</span>
                                <form class="searchbar row" method="get" action="search.php">
                                    <div class="row">
                                        <div class="col-lg-7 col-md-5 col-sm-12 col-xs-12">
                                            <div class="job-field">
                                                <input type="text" name="keyword" class="form-control" placeholder="What are you looking for"/>
                                                <i class="la la-keyboard-o"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">
                                            <div class="job-field">
                                                <select class="chosen-city" name="city">
                                                    <option value="">-- Select a Location --</option>
                                                    <?php
                                                    $CITY = City::all();
                                                    foreach ($CITY as $cit) {
                                                        if ($city == $cit['id']) {
                                                            ?>
                                                            <option value="<?php echo $cit['id']; ?>" selected><?php echo $cit['name']; ?></option> 
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <option value="<?php echo $cit['id']; ?>"><?php echo $cit['name']; ?></option> 
                                                            <?php
                                                        }
                                                    }
                                                    ?> 
                                                </select>
                                                <i class="la la-map-marker"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-2 col-sm-12 col-xs-12">
                                            <input type="hidden" value="" name="name" id="name"/>
                                            <button class="btn"><i class="la la-search" aria-hidden="true"></i></button>
                                        </div> 
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="scroll-to">
                            <a href="#scroll-here" style="color: #3A428C;" title=""><i class="la la-arrow-down"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>