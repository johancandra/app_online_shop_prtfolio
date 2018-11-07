<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cms_Model extends CI_Model{
    public $cms;

    public function __construct()
    {
        // $this->load does not exist until after you call this
        parent::__construct(); // Construct CI's core so that you can use it

        $this->cms = new stdClass();
        $this->cms->product_list = new stdClass();
        $this->cms->product_list->table = 'list_table';
        $this->cms->product_type = new stdClass();
        $this->cms->product_type->table = 'product_type_table';
        $this->cms->order = new stdClass();
        $this->cms->order->table = 'order_table';
        $this->cms->promo = new stdClass();
        $this->cms->promo->table = 'promo_table';
        $this->cms->slide_promo = new stdClass();
        $this->cms->slide_promo->table = 'sliding_table';
        $this->cms->user = new stdClass();
        $this->cms->user->table = 'user_table';

        $this->load->database();
    }

    function get_admin($email,$password) {        
        $this->db->select('*');
        $this->db->from('admin_table');
        $this->db->where('email', $email);
        $this->db->where('password', md5($password));
        $query = $this->db->get();
        return $result = $query->result();
    }

    function get_list_total($type) {
        $this->db->select('*');
        $this->db->from($this->cms->$type->table);
        return $result = $this->db->count_all_results();
    }

    function get_list_data($type,$start,$length,$sort,$sort_type) {
        $this->db->select('*');
        $this->db->order_by($sort, $sort_type); 
        $query = $this->db->get($this->cms->$type->table,$length,$start);
        return $result = $query->result();
    }

    function get_product_list_total() {
        $this->db->select('*');
        $this->db->from('list_table');
        return $result = $this->db->count_all_results();
    }

    function get_product_list_data($start,$length,$sort,$sort_type) {
        $this->db->select('*');
        $this->db->order_by($sort, $sort_type); 
        $query = $this->db->get('list_table',$length,$start);
        return $result = $query->result();
    }

    function get_by_id($id,$type) {
        $this->db->select('*');
        $this->db->from($this->cms->$type->table);
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $result = $query->result();
    }

    function update_($type,$id,$var) {
        $data = array();
        $this->db->where('id', $id);
        $result = $this->db->update($this->cms->$type->table, $var);
        return $result;
    }

    function delete_($type,$id) {
        $data = array();
        $this->db->where('id', $id);
        $result = $this->db->delete($this->cms->$type->table);
        return $result;
    }

    function add_($type,$var) {
        $data = array();
        $this->db->set($var);
        $result = $this->db->insert($this->cms->$type->table);
        return $result;
    }

    function remove_product_list_data($id) {
        $result = $this->db->delete('product_list_table', array('id' => $id)); 
        return $result;
    }
}