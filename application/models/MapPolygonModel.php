<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MapPolygonModel extends CI_Model {

    public function get()
    {
        $result = $this->db->get('bangunan_polygon')->result();
        return $result;
    }

    public function getbyID($bangunan_id)
    {
        $this->db->where(['id_polygon' => $bangunan_id]);
        $result = $this->db->get('bangunan_polygon')->row();
        return $result;
    }

    public function addPolygon($data)
    {
        $result = $this->db->insert('bangunan_polygon',$data);
        return $result;
    }

    public function deletePolygon($polygon_id)
    {
        $result = $this->db->delete('bangunan_polygon', array('id_polygon' => $polygon_id)); 
        return $result;
    }

    public function deleteAll()
    {
        $result = $this->db->truncate('bangunan_polygon'); 
        return $result;
    }

    public function updatePolygon($data)
    {
        $result = $this->db->update('bangunan_polygon', $data, array('id_polygon' => $data['id_polygon']));
        return $result;
    }
}