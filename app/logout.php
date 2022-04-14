<?php

unset($_SESSION['access_token']);

session_destroy();

header("Location: /v/6.01/teste/CalendarAPI/app/login.php");