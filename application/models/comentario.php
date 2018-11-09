<?php

class comentario extends CI_Model
{

    public function getComentarios($fecha, $chofer)
    {
        $this->load->database();
        $query = $this->db->query(
            "select * from comentarios where comentario = '".$fecha."' AND chofer = '".$chofer."' order by fecha_envio desc"
        );
        return $query->result();
    }

    public function insertarComentario($datos)
    {
        $this->load->database();
        $this->db->insert('comentarios', $datos);
    }
}