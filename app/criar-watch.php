<?php

require __DIR__ . "/html/topo.php";

include __DIR__ . "/class/google-calendar-api.php";

$calendar = new GoogleCalendarApi();
$calendarios = $calendar->GetCalendarsList($_SESSION['access_token']);

$retorno = $calendar->setWatch($calendarios[0]['id'], $_SESSION['access_token']);

var_dump($retorno);

require __DIR__ . "/html/fundo.php";