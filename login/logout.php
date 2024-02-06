<?php

    include ('../app/config.php');
    session_destroy();
    header('Location:'.APP_URL."/login");

