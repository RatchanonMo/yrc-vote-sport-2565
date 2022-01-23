<div class="header" style="background: rgba( 0, 0, 0, 0.3 );
backdrop-filter: blur( 12px );
-webkit-backdrop-filter: blur( 12px );
">
    <button class="header__burger"></button>


    <form action="./process/search.php" method="post" class="header__search" style="text-align:center;font-size:larger" > 
    
    <div style="opacity: 0;">
        <input  class="header__input" type="text" placeholder="ค้นหารายชื่อ" />
        <button type="submit" name="search" class="header__btn-search" style="background:none;z-index:1000;color: #aeb0c2;">
            <i class="fas fa-search" style="color: #aeb0c2;"></i>
        </button>
    </div>
    </form>


    <div class="header__control" style="opacity: 0;">
        <a class="header__item header__item_search" href="#">
            <i class="fas fa-search" style="font-size:large"></i>
        </a>
    </div>

    <div class="header__item header__item_profile">
        <a class="header__head" href="#">
            <img class="header__pic" src="./img/user.png" />
        </a>
        <div class="header__body">

            <a class="header__link signout" href="./process/logout.php">
                <div class="header__img">
                    <i class="fal fa-sign-out-alt"></i>
                </div>
                ออกจากระบบ
            </a>
        </div>
    </div>
</div>

<button class="btn " onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-chevron-up"></i></button>

<script>
    //Get the button
    var mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>

<script>
    var province = [<?php echo $php_list ?>];

    $('#auto1').autocomplete({
        source: [province],
        limit: 10
    });
</script>