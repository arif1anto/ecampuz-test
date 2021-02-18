SELECT a.mhs_nim, a.mhs_nama, b.nilai FROM tb_mahasiswa a
INNER JOIN tb_mahasiswa_nilai b ON a.mhs_id=b.mhs_id
INNER JOIN tb_matakuliah c ON c.mk_id=b.mk_id
WHERE c.mk_kode='MK303'
ORDER BY b.nilai DESC 
LIMIT 1
