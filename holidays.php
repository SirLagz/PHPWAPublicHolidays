<?php
$hols = array();

$dtNewYear = new DateTime();
$dtNewYear->setDate($dtNewYear->format('Y'),1,1);
$newyear = $dtNewYear->format('N');
if($newyear > 5) {
        $dtNewYear->modify('next weekday');
}
$hols[] = $dtNewYear->format('d-m');

$ausday = date("N",mktime(0,0,0,1,26));
if($ausday > 5) {
        $hols[] = date("d-m",strtotime("next weekday",mktime(0,0,0,1,26)));
} else {
        $hols[] = date("d-m",mktime(0,0,0,1,26));
}
$hols[] = date("d-m",strtotime("first monday of march")); // labour day (WA)

$hols[] = date("d-m",strtotime("last friday",easter_date())); // easter friday
$hols[] = date("d-m",strtotime("next monday",easter_date())); // easter monday;

$anzac = date("N",mktime(0,0,0,4,25));
if($anzac > 5) {
        $hols[] = date("d-m",strtotime("next weekday",mktime(0,0,0,4,25)));
} else {
        $hols[] = date("d-m",mktime(0,0,0,4,25));
}

$hols[] = date("d-m",strtotime("first monday of june")); // WA Day
$hols[] = date("d-m",strtotime("last monday of september")); // Queens birthday

$christmas = date("N",mktime(0,0,0,12,25));
$boxing = date("N",mktime(0,0,0,12,26));
if($christmas < 6 && $boxing < 6) {
        $hols[] = date("d-m",mktime(0,0,0,12,25));
        $hols[] = date("d-m",mktime(0,0,0,12,26));
} elseif($boxing == 6) {
        $hols[] = date("d-m",mktime(0,0,0,12,25));
        $hols[] = date("d-m",strtotime("next weekday",mktime(0,0,0,12,26)));
} elseif($christmas == 6) {
        $hols[] = date("d-m",strtotime("next weekday",mktime(0,0,0,12,25)));
        $hols[] = date("d-m",strtotime("+1 day",strtotime("next weekday",mktime(0,0,0,12,26))));
} elseif($christmas == 7) {
        $hols[] = date("d-m",strtotime("next weekday",mktime(0,0,0,12,25)));
        $hols[] = date("d-m",strtotime("+1 day",mktime(0,0,0,12,26)));
}

?>
