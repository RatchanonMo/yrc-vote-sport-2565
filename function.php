<?php

    function colorstatus(){
        if($_SESSION['s_color'] == '1'){
            echo "เทอดจรรยา (สีเหลือง)";
        }else if($_SESSION['s_color'] == '2'){
            echo "สามัคคี (สีแดง)";
        }else if($_SESSION['s_color'] == '3'){
            echo "ศรีวัฒนา (สีเขียว)";
        }else if($_SESSION['s_color'] == '4'){
            echo "การุณรักษ์ (สีม่วง)";
        }else if($_SESSION['s_color'] == '5'){
            echo "ภักดิ์พิรีย์ (สีฟ้า)";
        }
    }

    function color(){
        if($_SESSION['s_color'] == '1'){
            echo "#ffc107";
        }else if($_SESSION['s_color'] == '2'){
            echo "#dc3545";
        }else if($_SESSION['s_color'] == '3'){
            echo "#198754";
        }else if($_SESSION['s_color'] == '4'){
            echo "#7952b3";
        }else if($_SESSION['s_color'] == '5'){
            echo "#0d6efd";
        }
    }

  

    function colorbtn(){
        if($_SESSION['s_color'] == '1'){
            echo "warning";
        }else if($_SESSION['s_color'] == '2'){
            echo "danger";
        }else if($_SESSION['s_color'] == '3'){
            echo "success";
        }else if($_SESSION['s_color'] == '4'){
            echo "light";
        }else if($_SESSION['s_color'] == '5'){
            echo "primary";
        }
    }

    function video(){
        if($_SESSION['s_color'] == '1'){
            echo '<iframe style="border-radius:20px" src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2FYupparaj.Committee%2Fvideos%2F3033533940232668%2F&show_text=false&width=560&t=0" width="560" height="314" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>';
        }else if($_SESSION['s_color'] == '2'){
            echo '<iframe style="border-radius:20px" src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2FYupparaj.Committee%2Fvideos%2F652715309406346%2F&show_text=false&width=560&t=0" width="560" height="314" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write;  picture-in-picture; web-share" allowFullScreen="true"></iframe>';
        }else if($_SESSION['s_color'] == '3'){
            echo '<iframe style="border-radius:20px" src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2FYupparaj.Committee%2Fvideos%2F613636106589393%2F&show_text=false&width=560&t=0" width="560" height="314" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>';
        }else if($_SESSION['s_color'] == '4'){
            echo '<iframe style="border-radius:20px" src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2FYupparaj.Committee%2Fvideos%2F657341375624415%2F&show_text=false&width=560&t=0" width="560" height="314" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>';
        }else if($_SESSION['s_color'] == '5'){
            echo '<iframe style="border-radius:20px" src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2FYupparaj.Committee%2Fvideos%2F917339445648425%2F&show_text=false&width=560&t=0" width="560" height="314" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>';
        }
    }

?>