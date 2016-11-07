<?php

namespace App\Helpers;


class DateTime
{

    static public function getDateTimeFormat()
    {
        return self::getDateFormat() . ' ' . self::getTimeFormat();
    }

    static public function getDateFormat()
    {
        return 'm/d/Y';
    }

    static public function getTimeFormat()
    {
        return 'g:i A';
    }

    /*
     * Format datetime from UCT to local
     *
     * @param int|string $datetime
     * @param string $format
     *
     * @return string
     */
    static public function formatGmtDatetime($format, $datetime)
    {
        $format = $format ?: self::getDateTimeFormat();
        $datetime = is_numeric($datetime) ? $datetime : strtotime($datetime);
        return date($format, $datetime);
    }


    /*
     * Format datetime from UCT to local
     *
     * @param int|string $datetime
     * @param string $format
     *
     * @return string
     */
    static public function formatDatetime($format, $datetime)
    {
        $format = $format ?: self::getDateTimeFormat();
        $localDatetime = self::getLocalTime($datetime);
        return date($format, $localDatetime);
    }

    /*
     * get datetime from UCT to local
     *
     * @param int|string $datetime
     *
     * @return int
     */
    static public function getLocalTime($datetime)
    {
        $datetime = is_numeric($datetime) ? $datetime : strtotime($datetime);
        return $datetime + 7 * 3600;
    }
}
