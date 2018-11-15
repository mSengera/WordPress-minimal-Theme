<?php

/* =====================================================================================================================
 * === Function: is_open() =============================================================================================
 * =====================================================================================================================
 * @return: Bool
 * @param: $oeffnungszeiten
 * @demoparam: $oeffnungszeiten = array(
 *                  'Montag' => array('09:00' => '13:00', '15:00' => '18:00'),
 *                  'Dienstag' => array('09:00' => '13:00', '15:00' => '18:00'),
 *                  'Mittwoch' => array('09:00' => '13:00', '15:00' => '18:00'),
 *                  'Donnerstag' => array('09:00' => '13:00', '15:00' => '18:00'),
 *                  'Freitag' => array('09:00' => '13:00', '15:00' => '18:00'),
 *                  'Samstag' => array(),
 *                  'Sonntag' => array()
 *              );
 */

function is_open($oeffnungszeiten) {
    date_default_timezone_set('Europe/Berlin');

    $wochentage = array(
        1 => 'Montag',
        2 => 'Dienstag',
        3 => 'Mittwoch',
        4 => 'Donnerstag',
        5 => 'Freitag',
        6 => 'Samstag',
        7 => 'Sonntag'
    );

    $aktuell_geoeffnet    = false;
    $aktueller_wochentag  = date('N');
    $aktuelle_uhrzeit     = date('H:i');
    $aktuelle_uhrzeit_int = _timeToInt($aktuelle_uhrzeit);

    foreach ( $oeffnungszeiten[$wochentage[$aktueller_wochentag]] as $startzeit => $endzeit ) {
        $startzeit_int = _timeToInt($startzeit);
        $endzeit_int   = _timeToInt($endzeit);

        if (($aktuelle_uhrzeit_int >= $startzeit_int) && ($aktuelle_uhrzeit_int <= $endzeit_int)) {
            $aktuell_geoeffnet = true;
        }
    }

    return $aktuell_geoeffnet;
}

function _timeToInt($time) {
    $time_int = (int)str_replace(':', '', $time);
    return $time_int;
}