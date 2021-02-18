<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class log_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->db->_protect_identifiers=false;
    }

    function get_by_id($id)
    {
        $this->db->where('LogSeq', $id);
        return $this->db->get('trlog')->row();
    }
    
    function total_rows($key = NULL, $param=NULL) {
        $q = $this->db->select('*')
        ->from('trlog t')
        ->join("msuserid u","u.UsrANo=t.LogLsUsr");
        if (isset($param['kolom']) && $param['kolom']!="") {
            $q = $q->where("(".$param['kolom']." LIKE '%".$key."%')",NULL,FALSE);
        }
        if (isset($param['kolom1']) && $param['kolom1']!="") {
            $q = $q->where("(".$param['kolom1']." LIKE '%".$param['input1']."%')",NULL,FALSE);
        }
        if (isset($param['kode_field']) && $param['kode_field']!="") {
            $q = $q->where("(".$param['kode_field']." LIKE '%".$param['input2']."%')",NULL,FALSE);
        }
        return $this->db->count_all_results();
    }

    function get_limit_data($limit, $start = 0, $key = NULL, $param=NULL, $order = "DESC") {
        $q = $this->db->select('*')
        ->from('trlog t')
        ->join("msuserid u","u.UsrANo=t.LogLsUsr")
        ->limit($limit, $start)
        ->order_by('LogLsUpd' ,'DESC')
        ->order_by($param['kolom'] ,$order);
        if (isset($param['kolom']) && $param['kolom']!="") {
            $q = $q->where("(".$param['kolom']." LIKE '%".$key."%')",NULL,FALSE);
        }
        if (isset($param['kolom1']) && $param['kolom1']!="") {
            $q = $q->where("(".$param['kolom1']." LIKE '%".$param['input1']."%')",NULL,FALSE);
        }
        if (isset($param['kode_field']) && $param['kode_field']!="") {
            $q = $q->where("(".$param['kode_field']." LIKE '%".$param['input2']."%')",NULL,FALSE);
        }
        return $this->db->get()->result();
    }


    function insert($data)
    {
        $this->db->insert('trlog', $data);
    }

    function nourut()
    {
        $pre = getconfig("pre");
        $pre = ($pre!=""?$pre:"yk");
        $no = $this->db->query("select MAX(RIGHT(LogSeq,3)) as LogSeq from trlog limit 1");
        $autoId = (int) $no->row()->LogSeq;
        $autoId++;
        $NewID = $pre."".sprintf("%03s",$autoId);
        return $NewID;
    }

    function log($ket = null){
        if ($ket!=null) {
          $data = array(
            'LogLsUpd'  => date("ymdHi"),
            'LogLsUsr'  => $this->session->userdata('user_id'),
            'LogKet'    => $ket
        );

        $this->db->insert("trlog",$data);
    }
}

function akses_terakhir($kode){
    $q = $this->db->where("UsrANo", $kode)
    ->get("msuserid")
    ->row();
    return isset($q->UsrNm)? "Akses Terakhir oleh ".$q->UsrNm:"Akses Terakhir oleh ".$kode;
}

function lastuser($join,$kode, $id, $kondisi = ""){
        // $user = $this->session->userdata("user_id");
    $q = $this->db->join($join." j","u.UsrANo=j.$kode")
    ->where("j.".$id,$kondisi)
    ->get("msuserid u")
    ->row();
    return isset($q->UsrNm)?$q->UsrNm:"";
}

function in_hisstok($jnstr = "",$data)
    {
        if ($data['in']!=0 || $data['out']!=0) {
            $data['jnstr'] = $jnstr;
            $this->db->insert("hisstok",$data);
        }
    }

}
