<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Acessar extends CI_Controller {
        public function __construct() {
            parent::__construct();
			// Load the PHPExcel
            $this->load->library('PHPExcel');
        }

        public function index(){
            $data['title'] = "Acessar conta";
            $this->load->view('commons/header', $data);
            $this->load->view('acessar/acessar');
            $this->load->view('commons/footer');
        }
		
        public function dados_conta(){
            if ($_POST['cpf_usuario']) {
				$data['title'] = "Dados";
				$this->load->view('commons/header', $data);
				$this->load->view('acessar/dados_conta');
				$this->load->view('commons/footer');
			} else {
				$data['title'] = "Conta não encontrada";
				$this->load->view('commons/header', $data);
				$this->load->view('acessar/conta_nao_encontrada');
				$this->load->view('commons/footer');
			}
        }
    
		public function conta_nao_encontrada (){
			$data['title'] = "Cadastro realizado com sucesso!";
			$this->load->view('commons/header', $data);
			$this->load->view('acessar/conta_nao_encontrada');
			$this->load->view('commons/footer');
		}
	}