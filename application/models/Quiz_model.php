<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quiz_model extends CI_Model
{

    public $rules = array(
        'questao_id' => array(
            'field' => 'questao_id',
            // 'label' => 'Número',
            'rules' => 'trim|required'
        ),
        'questao' => array(
            'field' => 'questao',
            'label' => 'Pergunta',
            // 'rules' => 'trim|required'
        ),
        'escolhas' => array(
            'field' => 'escolhas[]',
            'label' => 'Alternativa',
            'rules' => 'trim|required'
        ),
        'correto' => array(
            'field' => 'correto',
            'label' => 'Respuesta',
            'rules' => 'trim|required'
        )
    );

    //   Retorna o total de perguntas
    public function get_count_questoes()
    {
        return $this->db->count_all('questoes');
    }

    public function get_questao($questao_id)
    {
        $this->db->where('questao_id', $questao_id);
        return $this->db->get('questoes')->row();
    }

    public function get_escolhas($questao_id)
    {
        $this->db->where('questao_id', $questao_id);
        return $this->db->get('escolhas')->result();
    }

    public function get_correto_escolha($questao_id)
    {
        $this->db->where(['questao_id' => $questao_id, 'correto' => 1]);
        return $this->db->get('escolhas')->row();
    }

    public function save_questao($data)
    {
        $result = $this->db->insert('questoes', $data);

        return $result ? TRUE : FALSE;
    }

    public function save_escolhas($data)
    {
        $result = $this->db->insert('escolhas', $data);

        return $result ? TRUE : FALSE;
    }

    public function array_from_post($fields)
    {
        $data = [];

        foreach ($fields as $value) {
            $data[$value] = $this->input->post($value);
        }

        return $data;
    }
}