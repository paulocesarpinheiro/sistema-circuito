<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Circuito extends CI_Controller
{
    public function __Construct()
    {
        parent::__Construct();
        $this->load->model('circuito_model');
    }

    public function index()
    {
        $query['circuitos'] = $this->circuito_model->getAll();
        $this->load->view('circuito', $query);
    }

    public function new()
    {
        $this->load->view('new_circuito');
    }

    public function edit($id)
    {
        $query['circuito'] = $this->circuito_model->get($id);
        $this->load->view('edit_circuito', $query);
    }

    public function insert()
    {
        $circuito['nome'] = $this->input->post('nome');
		$circuito['telefone'] = $this->input->post('telefone');
        $circuito['valor'] = $this->input->post('valor');

		$insert = $this->circuito_model->insert($circuito);

        if($insert){
            $this->session->set_flashdata('success', 'Circuito criado com sucesso!');
        }else{
            $this->session->set_flashdata('error', 'Não foi possivel cadastrar o Circuito!');
        }
        $query['circuitos'] = $this->circuito_model->getAll();
        $this->load->view('circuito', $query);
    }

    public function delete($id)
    {
        $this->circuito_model->delete($id);
    }

    public function update($circuito_id)
    {
        $circuito['nome'] = $this->input->post('nome');
		$circuito['telefone'] = $this->input->post('telefone');
        $circuito['valor'] = $this->input->post('valor');

		$insert = $this->circuito_model->update($circuito, $circuito_id);

        if($insert){
            $this->session->set_flashdata('success', 'Circuito atualizado com sucesso!');
        }else{
            $this->session->set_flashdata('error', 'Não foi possivel atulizar o Circuito!');
        }
        $query['circuitos'] = $this->circuito_model->getAll();
        $this->load->view('circuito', $query);
    }
    

}
