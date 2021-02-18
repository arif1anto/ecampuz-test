<?php

class Soal1
{

    function soal1()
    {
        $aplikasi[1] = 'gtAkademik';
        $aplikasi[2] = 'gtFinansi';
        $aplikasi[3] = 'gtPerizinan';
        $aplikasi[4] = 'eCampuz';
        $aplikasi[5] = 'eOviz';

        $i = 1;
        while($i <= count($aplikasi)) {
          echo "$aplikasi[$i] <br>";
          $i++;
        }

    }



}

Soal1::soal1();
