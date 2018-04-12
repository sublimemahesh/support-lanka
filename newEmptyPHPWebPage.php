<?php
foreach ($COMPANY as $com) {
    ?>
    <div class="emply-resume-list square col-md-12 col-sm-12">
        <div class="emply-resume-thumb">
            <a href="company.php?company=<?php echo $com['id']; ?>" title="">
                <img src="upload/company/<?php echo $com['logo_image']; ?>" alt=""/> 
            </a>
        </div>
        <div class="emply-resume-info">

            <h3><a href="#" title=""><?php echo $com['name']; ?></a></h3>
            <span>
                <i>
                    <?php
                    $INDUSTRY = new Industry($com['industry']);
                    echo $INDUSTRY->name;
                    ?>
                </i>
            </span>
            <p><i class="la la-map-marker"></i>
                <?php
                $CITY = new City($com['city']);
                echo $CITY->name;
                ?>

            </p>
        </div>
        <div class="shortlists" style="float: right;">
            <div class="">
                <?php
                for ($ran = 0; $ran <= 4; $ran++) {

                    if ($com['rank'] > $ran) {
                        ?>
                        <span class="fav-job" style="color:yellow; ">
                            <i class="la la-star"></i>
                        </span> 
                        <?php
                    } else {
                        ?>
                        <span class="fav-job"><i class="la la-star"></i></span>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
        <div class="shortlists" style="float: right; padding-top: 36px;">
            <a href="company.php?company=<?php echo $com['id']; ?>" title="">View Profile <i class="la la-plus"></i></a>
        </div>

    </div>
    <?php
}
?>