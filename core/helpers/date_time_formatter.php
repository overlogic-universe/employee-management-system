<?php

class DateTimeFormatter
{
    public static function getDateTimeNow()
    {
        $day = strftime('%A');
        $date = strftime('%d');
        $month = strftime('%B');
        $year = strftime('%Y');

        return "$day, $date $month $year";
    }
}
