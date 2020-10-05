<?php

$week = date('l');


switch ($week) {
    case "Saturday":
        $week_day = "<h6 class='text-'>  শনিবার </h6>";
        break;
    case "Sunday":
        $week_day = "<h6 class='text-whit'> রবিবার </h6>";
        break;
    case "Monday":
        $week_day = "<h6 class='text-whit'> সোমবার </h6>";
        break;
    case "Tuesday":
        $week_day = "<h6 class='text-'> মঙ্গলবার </h6>";
        break;
        
    case "Wednesday":
        $week_day = "<h6 class='text-'> বুধবার </h6>";
        break;

    case "Thursday":
        $week_day = "<h6 class='text-whit'> বৃহস্পতিবার </h6>";
        break;

   case "Friday":
        $week_day = "<h6 class='text-whit'>  শুক্রবার </h6>";
        break;
    
}

?>