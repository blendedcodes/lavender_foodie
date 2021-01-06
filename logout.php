<?php     
    session_start();
    session_destroy();
      
    header("Location: http://localhost:8808/lavender_foodie/index.php")
;?>