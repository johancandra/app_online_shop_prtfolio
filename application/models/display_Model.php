<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class display_Model extends CI_Model{
    public function __construct()
    {
        // $this->load does not exist until after you call this
        parent::__construct(); // Construct CI's core so that you can use it

        $this->load->database();
    }

    function get_contents() {
        $this->db->select('*');
        $this->db->from('product_type_table');
        $query = $this->db->get();
        return $result = $query->result();
    }

    function insert_user($email,$password,$fullname,$address,$city) {
        $data = array();
        $data['email'] = $email;
        $data['password'] = md5($password);
        $data['fullname'] = $fullname;
        $data['address'] = $address;
        $data['city'] = $city;

        $status = $this->db->insert('user_table', $data); 
        return $status;
    }

    function get_chart($user_id){    
        $this->db->select('*');
        $this->db->from('user_table');
        $this->db->where('id', $user_id);
        $query = $this->db->get();
        return $result = $query->result();
    }

    function clear_chart($user_id){  
        $this->db->select('*');
        $this->db->from('user_table');
        $this->db->where('id', $user_id);
        $query = $this->db->get();
        $chart = json_decode($query->result()[0]->chart); 
        foreach ($chart as $key => $value) {
            $this->db->select('*');
            $this->db->from('list_table');
            $this->db->where('id', $value->product_id);
            $query = $this->db->get();
            $total_item = $query->result()[0]->total_item; 

            $data = array('total_item' => $total_item + $value->total);        
            $this->db->where('id', $value->product_id);
            $result =  $this->db->update('list_table', $data);
        }

        $data = array('chart' => json_encode(array()));
        $this->db->where('id', $user_id);
        return $result =  $this->db->update('user_table', $data);
    }

    function order_chart($user_id){  
        $this->db->select('*');
        $this->db->from('user_table');
        $this->db->where('id', $user_id);
        $query = $this->db->get();
        $result = $query->result()[0]->chart;

        $data = array();
        $data['user_id'] = $user_id;
        $data['chart'] = $result;
        $data['order_date'] = date("Y-m-d H:i:s");

        $status = $this->db->insert('order_table', $data);
        if($status){            
            $data = array('chart' => json_encode(array()));
            $result =  $this->db->update('user_table', $data);
        } else {
            $result = false;
        }
        return $result;
    }

    function add_chart($user_id,$product_id,$total){  
        $this->db->select('*');
        $this->db->from('user_table');
        $this->db->where('id', $user_id);
        $query = $this->db->get();
        $result = json_decode($query->result()[0]->chart); 
        $this->db->select('*');
        $this->db->from('list_table');
        $this->db->where('id', $product_id);
        $query = $this->db->get();
        $total_item = json_decode($query->result()[0]->total_item); 

        if($total_item >= $total){
            $obj = new stdClass();
            $obj->product_id = $product_id;
            $obj->total = $total;
            array_push($result,$obj);
        }
        $data = array('chart' => json_encode($result));
        
        $this->db->where('id', $user_id);
        $result =  $this->db->update('user_table', $data);

        if($total_item < $total){
            $result = array('error' => 'Total item exceed');
        }else{
            $data = array('total_item' => $total_item-$total);        
            $this->db->where('id', $product_id);
            $result =  $this->db->update('list_table', $data);            
        }

        return $result;
    }

    function remove_chart($user_id,$chartnum){  
        $this->db->select('*');
        $this->db->from('user_table');
        $this->db->where('id', $user_id);
        $query = $this->db->get();
        $result = json_decode($query->result()[0]->chart);
        $data = array();
        for ($c = 0; $c < count($result); $c++) {
            if($c != $chartnum){
                array_push($data,$result[$c]);       
            }
        }
        $data_ = array('chart' => json_encode($data));
        $this->db->where('id', $user_id);
        $this->db->update('user_table', $data_);         
        $this->db->select('*');
        $this->db->from('user_table');
        $this->db->where('id', $user_id);
        $query = $this->db->get();
        return $result = $query->result();
    }

    function get_product($id) {        
        $this->db->select('*');
        $this->db->from('list_table');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $result = $query->result();
    }

    function get_user($email,$password) {        
        $this->db->select('*');
        $this->db->from('user_table');
        $this->db->where('email', $email);
        $this->db->where('password', md5($password));
        $query = $this->db->get();
        return $result = $query->result();
    }

    function get_user_by_id($id) {        
        $this->db->select('*');
        $this->db->from('user_table');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $result = $query->result();
    }

    function get_promo() {
        $this->db->select('*');
        $this->db->from('promo_table');
        $query = $this->db->get();
        return $result = $query->result();
    }

    function get_sliding_contents() {
        $this->db->select('*');
        $this->db->from('sliding_table');
        $query = $this->db->get();
        return $result = $query->result();
    }

    function get_list_contents($start,$length,$sub_type,$sort,$sort_type) {
        $this->db->select('*');
        $this->db->where('sub_type', $sub_type);
        $this->db->order_by($sort, $sort_type); 
        $query = $this->db->get('list_table',$length,$start);
        return $result = $query->result();
    }

    function total_product($sub_type) {
        $this->db->select('*');
        $this->db->from('list_table');
        $this->db->where('sub_type', $sub_type);
        return $result = $this->db->count_all_results();
    }

    function total_all_product() {
        $this->db->select('*');
        $this->db->from('list_table');
        return $result = $this->db->count_all_results();
    }
}