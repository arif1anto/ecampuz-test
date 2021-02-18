<?php

class Soal4
{

    function soal4()
    {   
        for ($i = 1; $i < 50; $i++) {
            echo "$i => ";
            if ($i % 3 == 0) {
                echo 'Foo';
            }
            if ($i % 5 == 0) {
                echo 'Bar';
            }
            echo '<br>';
        }
    }


}

Soal4::soal4(8,4);
