<?php

require __DIR__ . "/html/topo.php";

include __DIR__ . "/class/google-calendar-api.php";

$calendar = new GoogleCalendarApi();
$calendarios = $calendar->GetCalendarsList($_SESSION['access_token']);
$listaEventos = $calendar->getEventsList($calendarios[0]['id'], $_SESSION['access_token']);

echo "<pre>";
echo "Lista de eventos: <br>";
print_r($listaEventos);
echo "</pre>";

require __DIR__ . "/html/fundo.php";