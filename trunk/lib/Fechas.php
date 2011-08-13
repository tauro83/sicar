<?php

/*************************************************
  * NOMBRE: Fechas.class.php
  * DESCRIPCION: Clase que contiene funciones de manipulacion de fechas, personalizacion de las mismas
  * FECHA DE CREACION: 21-07-2011
  * AUTOR: Jhonny Pincay
   **************************************************/

class Fechas {
    /*************************************************
        *Nombre: getFechaPersonalizada($fecha)
        *Parametros:
                  - $fecha : Representa una fecha de entrada.

        *Descripción: Transforma una fecha de formato  yyyy-mm-dd  a Nombre mes  numero dia de año
                      Ej: 2011-07-27 a Julio 27 de 2011
        * Autor: Jhonny Pincay
     **************************************************/

    public static function getFechaPersonalizada($fecha) {
        $date = format_datetime($fecha, 'M', 'es_CL');
        $date2 = format_datetime($fecha, 'i', 'es_CL');
        $parte = explode("-", $date2);
        return ucwords($date) . ' ' . $parte[0];
    }

    /*************************************************
        *Nombre: getFechaHoraPersonalizada($fecha)
        *Parametros:
                  - $fecha : Representa una fecha de entrada.

        *Descripción: Transforma una fecha de formato  yyyy-mm-dd  a Nombre mes  numero dia de año junto con la hora
                      Ej: 2011-07-27 09:00 a Julio 27 de 2011, 09:00
        * Autor: Jhonny Pincay
     **************************************************/

    public static function getFechaHoraPersonalizada($fecha) {
        $date = format_datetime($fecha, 'M', 'es_CL');
        $date2 = format_datetime($fecha, 'i', 'es_CL');
        $parte = explode("-", $date2);
        return ucwords($date) . ' ' . $parte[0] . ', ' . format_datetime($fecha, 't', 'es_EC');
    }

     /*************************************************
        *Nombre: getMesCorto($fecha)
        *Parametros:
                  - $fecha : Representa una fecha de entrada.

        *Descripción: devuelve el mes de la fecha en formato corto

        * Autor: Jhonny Pincay
     **************************************************/

    public static function getMesCorto($fecha) {
        $date = format_datetime($fecha, 'M', 'es_CL');
        $parte = explode(" ", $date);
        return substr((ucwords($parte[0])), 0, 3);
    }

     /*************************************************
        *Nombre: getDia($fecha)
        *Parametros:
                  - $fecha : Representa una fecha de entrada.

        *Descripción: Retorna el nombre del día de una fecha.
        * Autor: Jhonny Pincay
     **************************************************/

    public static function getDia($fecha) {
        $date = format_datetime($fecha, 'M', 'es_CL');
        $parte = explode(" ", $date);
        return $parte[1];
    }

     /*************************************************
        *Nombre: getDays($date1, $date2)
        *Parametros:
                  - $date1: Representa una fecha de entrada.
                  - $date2: Representa una fecha de entrada.

        *Descripción: Retorna el numero de dias comprendido entre dos fechas

        * Autor: Jhonny Pincay
     **************************************************/
    public static function getDays($date1, $date2) {
        $date1 = explode('-', $date1);
        $date2 = explode('-', $date2);
        $date1 = gregoriantojd($date1[1], $date1[2], $date1[0]);
        $date2 = gregoriantojd($date2[1], $date2[2], $date2[0]);
        return $date1 - $date2;
    }
}