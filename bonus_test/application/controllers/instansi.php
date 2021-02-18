<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Instansi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('instansi_model','Log_model'));
        $this->load->library('form_validation');
    }

public function index($act ='', $id ='') {
            $this->load->library('Ajax_pagination');
            $config['target']      = '#tbl_data';
            $config['base_url']    = base_url().'instansi/search';
            $this->ajax_pagination->initialize($config);
            $data = array(
                'act'       => $act,
                'id_sct'    => $id, 
                'instansi_data' => NULL,
                'q'         => NULL,
                'pagination'=> $this->ajax_pagination->create_script(),
                'total_rows'=> NULL,
                'start'     => NULL,
            );

            $this->load->view('template');
            $this->load->view('instansi/Instansi_home', $data);
            $this->load->view('footer');
            $this->session->unset_userdata('message');
        }

public function search($pg=0)
    {
        $this->load->library('Ajax_pagination');
        $this->perPage = 10;
        $page = $this->input->post('page');

        if(!$page){
            $start = $pg;
        }else{
            $start = $page;
        }
        $q = $this->input->post('keyword');
        $field = $this->input->post('name');
        $value = $this->input->post('value');
        $param = array($field[0] => $value[0]);
        for ($i=0; $i < count($field); $i++) { 
            $param[$field[$i]] = $value[$i];
        }
        
        $totalRec = 20;
        if ($this->input->post('limit')=='true') {
            $start = 0;
            if ($totalRec > $this->perPage) {
                $totalRec = $this->perPage;
            }
        } else {
            $totalRec = $this->instansi_model->total_rows($q, $param);
        }
            $order = 'ASC';
        if ($this->input->post('desc')=='true') {
            $order = 'DESC';
        }
        $dat = $this->instansi_model->get_limit_data($this->perPage, $start, $q, $param, $order);
        
        $config['target']      = '#tbl_data';
        $config['keyword']     = '#keyword';
        $config['num_links']   = 3;
        $config['base_url']    = base_url().'instansi/search';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $this->ajax_pagination->initialize($config);
        
        $data = array(
            'instansi_data' => $dat,
            'q' => $q,
            'pagination' => $this->ajax_pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            );

        $this->load->view('instansi/ajax', $data, FALSE);
    }

public function read() 
    {
        $id = $this->input->post("inskd");
        $row = $this->instansi_model->get_by_id($id);

        $data = array(
                'button' => '',
                'action' => '',
				'inskd' => isset($row->inskd) ? $row->inskd : "",
				'insnm' => isset($row->insnm) ? $row->insnm : "",
				'insalamat' => isset($row->insalamat) ? $row->insalamat : "",
				'instelp' => isset($row->instelp) ? $row->instelp : "",
	    );
        $this->load->view('instansi/Instansi_read', $data);
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => 'create_action',
            'inskd'    => $this->instansi_model->nourut(),
			'insnm' => set_value('insnm'),
			'insalamat' => set_value('insalamat'),
			'instelp' => set_value('instelp'),
	);

            $this->load->view('instansi/Instansi_form', $data);
        }

    public function create_action() {

        $data = array(
        "inskd" => $this->input->post("inskd"),
				'insnm' => $this->input->post('insnm',TRUE),
				'insalamat' => $this->input->post('insalamat',TRUE),
				'instelp' => $this->input->post('instelp',TRUE),
	    );

        if ($this->input->post("btn")=="Simpan") {
            $this->instansi_model->insert($data);
            $this->Log_model->log("CREATE Instansi No. ".$this->input->post('inskd',TRUE)." ");
            echo "simpan";
        } else {
            $this->instansi_model->update($this->input->post('inskd', TRUE), $data);
            $this->Log_model->log("EDIT Instansi No. ".$this->input->post('inskd',TRUE)." ");
            echo "edit";
        }

        }

        public function update() 
        {
            $id = $this->input->post("inskd");
            $row = $this->instansi_model->get_by_id($id);

            $data = array(
                'button' => 'Update',
                'action' => 'update_action',
				'inskd' => set_value('inskd', $row->inskd),
				'insnm' => set_value('insnm', $row->insnm),
				'insalamat' => set_value('insalamat', $row->insalamat),
				'instelp' => set_value('instelp', $row->instelp),
	    );
            $this->load->view('instansi/Instansi_form', $data);
            }

            public function update_action() 
            {
                $data = array(
				'insnm' => $this->input->post('insnm',TRUE),
				'insalamat' => $this->input->post('insalamat',TRUE),
				'instelp' => $this->input->post('instelp',TRUE),
	    );

                $this->instansi_model->update($this->input->post('inskd', TRUE), $data);
                $this->Log_model->log("EDIT Instansi No. ".$this->input->post('inskd',TRUE)." ");
                echo "edit";
            }

            public function delete() 
            {
                $id = $this->input->post("inskd");
                $row = $this->instansi_model->get_by_id($id);
                if (count($row)>0) {
                    $this->instansi_model->delete($id);
                    echo "OK";
                } else {
                    echo "notfound";
                }
            }

}

