<?php

class Soal3
{
    function soal3($nil,$bagi)
    {   
        $result = 0;
        for ($i = 0; $i < $nil; $i+=$bagi) {
            if ($nil - $i >= $bagi) {
                $result ++;
            }
        }
        echo "$nil : $bagi = $result <br>";
    }

}

Soal3::soal3(7,2);
Soal3::soal3(8,4);
