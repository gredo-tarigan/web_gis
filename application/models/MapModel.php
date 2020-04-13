<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MapModel extends CI_Model {
    
    public function get()
    {
        $result = $this->db->get('bangunan')->result();
        return $result;
    }

    public function getbyID($bangunan_id)
    {
        $this->db->where(['bangunan_id' => $bangunan_id]);
        $result = $this->db->get('bangunan')->row();
        return $result;
    }

    public function addMarkers($data)
    {
        $result = $this->db->insert('bangunan',$data);
        return $result;
    }

    public function deleteMarkers($bangunan_id)
    {
        $result = $this->db->delete('bangunan', array('bangunan_id' => $bangunan_id)); 
        return $result;
    }

    public function deleteAll()
    {
        $result = $this->db->truncate('bangunan'); 
        return $result;
    }

    public function updateMarkers($data)
    {
        $result = $this->db->update('bangunan', $data, array('bangunan_id' => $data['bangunan_id']));
        return $result;
    }
}