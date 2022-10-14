<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quiz extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Quiz_model');
	}

	public function index()
	{
		$dados['titulo'] = 'Sistema de Exames Online';
		$data['count_questoes'] = $this->Quiz_model->get_count_questoes();
		$data['subview'] = 'index';

		// Passa as variaveis para a view
		$this->load->vars($data);
		$this->load->vars($dados);

		$this->load->view('templates/quiz_layout');
	}

	public function questao($questao_id)
	{
		$dados['titulo'] = 'Questao do quiz';

		$data['count_questoes'] = $this->Quiz_model->get_count_questoes();
		$data['questao'] = $this->Quiz_model->get_questao($questao_id);
		$data['escolhas'] = $this->Quiz_model->get_escolhas($questao_id);

		$data['subview'] = 'questao';

		// Passa as variaveis para a view
		$this->load->vars($data);
		$this->load->vars($dados);

		$this->load->view('templates/quiz_layout');
	}

	public function process()
	{
		if (!$this->session->userdata('pontuacao')) {
			$this->session->userdata('pontuacao', 0);
		}

		$questao_id = $this->input->post('questao_id');
		$selected_escolha = $this->input->post('escolha');
		$next_questao = $questao_id + 1;

		$row = $this->Quiz_model->get_correto_escolha($questao_id);
		$correct_escolha = $row->id;

		if ($selected_escolha == $correct_escolha) {
			$this->session->pontuacao++;
		}

		$total = $this->Quiz_model->get_count_questoes();

		if ($questao_id == $total) {
			redirect('quiz/finalizacao');
		} else {
			redirect('quiz/questao/' . $next_questao);
		}
	}

	public function finalizacao()
	{
		$dados['titulo'] = 'Fim do quiz';


		$this->session->sess_destroy();
		$data['subview'] = 'finalizacao';

		// Passa as variaveis para a view
		$this->load->vars($data);
		$this->load->vars($dados);


		$this->load->view('templates/quiz_layout');
	}

	public function add()
	{
		$rules = $this->Quiz_model->rules;
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$questao_data = $this->Quiz_model->array_from_post(['questao_id', 'questao']);

			if ($this->Quiz_model->save_questao($questao_data)) {

				foreach ($this->input->post('escolhas') as $key => $value) {

					if ($this->input->post('correto') == $key + 1)
						$correto = 1;
					else
						$correto = 0;

					$escolhas_data = [
						'questao_id' => $this->input->post('questao_id'),
						'correto' => $correto,
						'escolha' => $value
					];

					if ($this->Quiz_model->save_escolhas($escolhas_data))
						continue;
				}

				$this->session->set_flashdata('msg', 'Pergunta cadastrada corretamente');
				redirect('quiz/add', 'refresh');
			}
		}
		$dados['titulo'] = 'Cadastrar pergunta';

		$data['count_questoes'] = $this->Quiz_model->get_count_questoes();
		$data['subview'] = 'add';

		// Passa as variaveis para a view
		$this->load->vars($data);
		$this->load->vars($dados);

		$this->load->view('templates/quiz_layout', $data);
	}
}
