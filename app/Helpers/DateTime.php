<?php


namespace App\Helpers;


class DateTime
{
    public static function handlerDateTime($date, $time)
    {
        $array_time = explode(':', $time);
        if (isset($array_time[2])) {
            $dateTime = $date . ' ' . $time ;
        } else {
            $dateTime = $date . ' ' . $time . ':00' ;
        }
        return $dateTime;
    }
}