<?php

class DateTimeFormatter
{
    public static function getDateTimeNow()
    {
        $dateTime = new DateTime();
        $formatter = new IntlDateFormatter(
            'id_ID',
            IntlDateFormatter::FULL,
            IntlDateFormatter::NONE,
            'Asia/Jakarta',
            IntlDateFormatter::GREGORIAN
        );

        $formatter->setPattern('EEEE, d MMMM Y');

        return $formatter->format($dateTime);
    }
}
