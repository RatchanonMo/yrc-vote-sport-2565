<div class="sidebar" style="">
    <div class="sidebar__top">
        <a class="sidebar__logo">
            <img class="sidebar__pic" src="img/logo6.svg" alt="" />
        </a>
        <button class="sidebar__burger"></button>
        <button class="sidebar__close" style="background:none;font-size:x-large;color:#aeb0c2">
            <i class="fal fa-times"></i>
        </button>
    </div>
    <div class="sidebar__wrapper">
        <div class="sidebar__inner">
            <div class="sidebar__group">
                <div class="sidebar__caption caption-sm">
                    <?php
                    if ($_SESSION['s_permission'] > 0) {
                        echo "<span>เมนูสำหรับ</span>แอดมิน";
                    } else {
                        echo "เมนู<span>ต่างๆ</span>";
                    }
                    ?>

                </div>
                <div class="sidebar__menu">

                    <?php
                    if ($_SESSION['s_permission'] > 0) {
                    ?>
                        <a class="sidebar__item 
                        <?php
                        if ($_SERVER['PHP_SELF'] == "/yrc-e-vote-sport-2565/manage_candidate.php") {
                            echo "active";
                        } else {
                            echo "";
                        }
                        ?>
                        " href="manage_candidate.php">
                            <div style="font-size:22px;padding:0px 20px 0px 14px">
                                <i class="fas fa-user-cog"></i>
                            </div>
                            <div class="sidebar__text">ระบบจัดการผู้ลงสมัคร</div>
                        </a>
                        <a class="sidebar__item 
                        <?php
                        if ($_SERVER['PHP_SELF'] == "/yrc-vote-sport2565/ranking.php") {
                            echo "active";
                        } else {
                            echo "";
                        }
                        ?>
                        " href="ranking.php">
                            <div style="font-size:22px;padding:0px 20px 0px 14px">
                                <i class="fas fa-vote-yea"></i>
                            </div>
                            <div class="sidebar__text">คะแนนสูงสุด</div>
                        </a>
                    <?php } else { ?>
                        <a class="sidebar__item 
                        <?php
                        if ($_SERVER['PHP_SELF'] == "/yrc-e-vote-sport-2565/vote.php") {
                            echo "active";
                        } else {
                            echo "";
                        }
                        ?>
                        " href="vote.php">
                            <div style="font-size:22px;padding:0px 20px 0px 14px">
                                <i class="fas fa-vote-yea"></i>
                            </div>
                            <div class="sidebar__text">ลงคะแนนเสียง</div>
                        </a>
                    <?php } ?>



                </div>
            </div>
        </div>
    </div>
    <div class="sidebar__bottom">
        <a class="sidebar__item signout" href="./process/logout.php">
            <div style="font-size:22px;padding:0px 15px 0px 3px">
                <i class="fal fa-sign-out-alt"></i>
            </div>
            <div class="sidebar__text ">ออกจากระบบ</div>
        </a>
    </div>
</div>