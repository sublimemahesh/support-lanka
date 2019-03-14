
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Modal Example</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

</body>
</html>

<div class="emply-resume-list square col-md-12 col-sm-12">
                                            <div class="emply-resume-thumb">
                                                <a href="member.php?member=<?php echo $member['id']; ?>" title="">
                                                    <img src="upload/member/<?php echo $member['profile_picture']; ?>" alt=""/> 
                                                </a>
                                            </div>
                                            <div class="emply-resume-info ">
                                                <h3><a href="member.php?member=<?php echo $member['id']; ?>" title=""> <?php echo $member['name']; ?></a></h3>
                                                <span>
                                                    <a href="member.php?member=<?php echo $member['id']; ?>" >
                                                        <i>
                                                            <?php
                                                            $SKILLDETAIL = SkillDetail::GetSkillByMember($member['id']);

                                                            foreach ($SKILLDETAIL as $skill_d) {

                                                                $SKILL = new Skill($skill_d['skill']);

                                                                $INDUSTRY = new Industry($SKILL->industry);

                                                                echo $INDUSTRY->name;
                                                                ?> 
                                                                /  
                                                                <?php
                                                                $SKIL = new Skill($skill_d['skill']);
                                                                echo $SKIL->name . '&nbsp;' . '&nbsp;' . '&nbsp;';
                                                            }
                                                            ?> 
                                                        </i>
                                                    </a>
                                                </span>
                                                <p><i class="la la-map-marker"></i>
                                                    <?php
                                                    $CITY = new City($member['city']);
                                                    echo $CITY->name;
                                                    ?>
                                                    , 
                                                    <?php echo $member['home_address']; ?>
                                                </p>
                                            </div>
                                            <div class="shortlists" style="float: right;">
                                                <div class="">
                                                    <?php
                                                    for ($ran = 0; $ran <= 4; $ran++) {

                                                        if ($member['rank'] > $ran) {
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
                                            <div class="shortlists" id="new-p-element" >
                                                <a href="member.php?member=<?php echo $member['id']; ?>" title="">View Profile <i class="la la-plus"></i></a>
                                            </div>

                                        </div>
>>>>>>> #262 Member re correction in admin re correction
