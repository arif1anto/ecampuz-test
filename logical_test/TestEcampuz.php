<?php

class TestEcampuz
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

// SELECT a.mhs_nim, a.mhs_nama, b.nilai FROM tb_mahasiswa a
// INNER JOIN tb_mahasiswa_nilai b ON a.mhs_id=b.mhs_id
// INNER JOIN tb_matakuliah c ON c.mk_id=b.mk_id
// WHERE c.mk_kode='MK303'
// ORDER BY b.nilai DESC 
// LIMIT 1

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

TestEcampuz::soal1();
TestEcampuz::soal3(7,2);
TestEcampuz::soal3(8,4);
TestEcampuz::soal4(8,4);
