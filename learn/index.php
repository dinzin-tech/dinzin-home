<?php

require_once("src/db.php");

// header('location: https://learn.dinzin.in/dashboard/study.php?course=1');
// exit;

$currentTime = new DateTime();
// $currentTime = new DateTime('2024/08/08 15:30');
$currentTime->setTimezone(new DateTimeZone('Asia/Kolkata'));

// print_r($currentTime->format('Y-m-d H:i:s'));

$launchTime = new DateTime('2024/08/08 15:30');
$launchTime->setTimezone(new DateTimeZone('Asia/Kolkata'));

$timeDiff = $currentTime->diff($launchTime);

$gotofile = '';
if ($timeDiff->invert == 0) { // launch time is in the future
    if ($timeDiff->d > 0 || $timeDiff->h > 0 || $timeDiff->i > 0) {
        $dashboard = 0;
        $gotofile = 'launching.html';
    } else {
        // $gotofile = 'landing.html';
        header('location: https://learn.dinzin.in/dashboard/study.php?course=1');
        exit;
        $dashboard = 1;
        $gotofile = 'launching.html';
       // header('Location: https://www.learn.dinzin.in/dashboard');
        //exit;
    }
} else {
    header('location: https://learn.dinzin.in/dashboard/study.php?course=1');
    exit;
    // launch time is in the past
    // $gotofile = 'landing.html';
    $dashboard = 1;
    $gotofile = 'launching.html';
}

ob_start();
include "$gotofile";
$pageStatus = ob_get_clean();
echo "$pageStatus";

?>