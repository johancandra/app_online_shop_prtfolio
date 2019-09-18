<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Display extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data = array();
		$data['type'] = $this->get_contents_data();
		$data['sliding'] = $this->get_sliding_data();
		$data['product'] = $this->get_list_data(1,3,'Mobile','price','asc');
		$data['promo'] = $this->get_promo_data();
		$data['chart'] = json_decode('[]');
		if($this->session->userdata('firstname')){
			$newdata = array();
			$newdata['id'] = $this->session->userdata('id');
			$newdata['email'] = $this->session->userdata('email');
			$newdata['fullname'] = $this->session->userdata('fullname');
			$newdata['firstname'] = $this->session->userdata('firstname');

	        $this->load->model('display_Model');
	        $result = $this->display_Model->get_chart($newdata['id']);
	        $data['chart'] = json_decode($result[0]->chart);
			for ($c = 0; $c < count($data['chart']); $c++) {
				$data['chart'][$c]->product_name = $this->display_Model->get_product($data['chart'][$c]->product_id)[0]->name;
			}
			$newdata['chart'] = $data['chart'];
			$this->session->set_userdata($newdata);
		}else{
			$this->session->sess_destroy();
		}
		$this->load->view('display',$data);
	}

	public function view_order()
	{
		if($this->session->userdata('firstname')){
			$list_id = $this->input->get('list_id');
			$data = array();
			$data['sliding'] = $this->get_sliding_data();
	        $this->load->model('display_Model');
	        $data['product'] = $this->display_Model->get_product($list_id);
			$data['promo'] = $this->get_promo_data();
			$this->load->view('order',$data);	
		}else{
			$this->index();
		}	
	}

	public function order()
	{
		$list_id = $this->input->get('list_id');
		$total = $this->input->get('total');
        $this->load->model('display_Model');
        $result = $this->display_Model->insert_order($list_id,$total);
        echo(json_encode($result));        	
	}

	public function register()
	{
		$email = $this->input->get('email');
		$password = $this->input->get('password');
		$fullname = $this->input->get('fullname');
		$address = $this->input->get('address');
		$city = $this->input->get('city');

        $this->load->model('display_Model');
        $result = $this->display_Model->insert_user($email,$password,$fullname,$address,$city);
        echo(json_encode($result));        
	}
	public function logout()
	{
	    $this->session->sess_destroy();
	    $this->index();
	}
	public function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
        $this->load->model('display_Model');
        $result = $this->display_Model->get_user($email,$password);
        if(count($result)==0){
        	$isPasswordCorrect = false;	
        }else{
        	$isPasswordCorrect = true;
        }

		$data = array();
		$data['type'] = $this->get_contents_data();
		$data['sliding'] = $this->get_sliding_data();
		$data['product'] = $this->get_list_data(1,3,'Mobile','price','asc');
		$data['promo'] = $this->get_promo_data();
		if($isPasswordCorrect){
			$newdata = array();
			$newdata['id'] = $result[0]->id;
			$newdata['email'] = $email;
			$newdata['fullname'] = $result[0]->fullname;
			$newdata['firstname'] = explode(' ',$result[0]->fullname)[0];
			$data['chart'] = json_decode($result[0]->chart);
			for ($c = 0; $c < count($data['chart']); $c++) {
				$data['chart'][$c]->product_name = $this->display_Model->get_product($data['chart'][$c]->product_id)[0]->name;
			}
			$newdata['chart'] = $data['chart'];
			$this->session->set_userdata($newdata);
		}else{
			$this->session->sess_destroy();
		}
		$this->load->view('display',$data);
	}

	public function add_chart(){
		$product_id = $this->input->get('product_id');
		$total_item = $this->input->get('total');
		$user_id = $this->session->userdata('id');

        $this->load->model('display_Model');
        $result = $this->display_Model->add_chart($user_id,$product_id,$total_item);
        echo(json_encode($result));       		
	}

	public function clear_chart(){
		$user_id = $this->session->userdata('id');

        $this->load->model('display_Model');
        $result = $this->display_Model->clear_chart($user_id);
        echo(json_encode($result));       		
	}

	public function order_chart(){
		$user_id = $this->session->userdata('id');

        $this->load->model('display_Model');
        $result = $this->display_Model->order_chart($user_id);
        echo(json_encode($result));       		
	}

	public function get_chart($user_id){
        $this->load->model('display_Model');
        $result = $this->display_Model->get_chart($user_id);
        return $result;
	}

	public function remove_chart(){
		$user_id = $this->session->userdata('id');
		$chartnum = $this->input->get('chartnum');

        $this->load->model('display_Model');
        $result = $this->display_Model->remove_chart($user_id,$chartnum);
        return json_encode($result); 		
	}

	public function remove_and_refresh_home(){
		$data = array();
		$data['type'] = $this->get_contents_data();
		$data['sliding'] = $this->get_sliding_data();
		$data['product'] = $this->get_list_data(1,3,'Mobile','price','asc');
		$data['promo'] = $this->get_promo_data();
		if($this->session->userdata('firstname')){
			$newdata = array();
			$newdata['id'] = $this->session->userdata('id');
			$newdata['email'] = $this->session->userdata('email');
			$newdata['fullname'] = $this->session->userdata('fullname');
			$newdata['firstname'] = $this->session->userdata('firstname');
			$data['chart'] = json_decode(json_decode($this->remove_chart())[0]->chart);
			for ($c = 0; $c < count($data['chart']); $c++) {
				$data['chart'][$c]->product_name = $this->display_Model->get_product($data['chart'][$c]->product_id)[0]->name;
			}
			$newdata['chart'] = $data['chart'];
			$this->session->set_userdata($newdata);
		}else{
			$this->session->sess_destroy();
		}
		$this->load->view('display',$data);
	}

	public function get_promo_data()
	{
		$data = array();
        $this->load->model('display_Model');
        $promo = $this->display_Model->get_promo();
        $data['promo'] = $promo;
        return $data;
	}

	public function get_contents_data()
	{
		$data = array();
        $this->load->model('display_Model');
        $product_type = $this->display_Model->get_contents();
        $type = array();
        $type_list = array();

        for ($c = 0; $c < count($product_type); $c++) {
       		$obj = new stdClass();
       		$obj->type = $product_type[$c]->prod_type;
       		$obj->sub_type = array();
        	if (!in_array($obj, $type)){
        		array_push($type, $obj);
        		array_push($type_list, $product_type[$c]->prod_type);
        	}
		} 

        for ($c = 0; $c < count($product_type); $c++) {
        	$key = array_search($product_type[$c]->prod_type, $type_list);
       		$obj = new stdClass();
       		$obj->name = $product_type[$c]->prod_sub_type;
       		$obj->total_item = $product_type[$c]->total_item;
        	array_push($type[$key]->sub_type, $obj);
		}

		return $type;	
	}

	public function get_sliding_data()
	{
		$data = array();
        $this->load->model('display_Model');
        $sliding_type = $this->display_Model->get_sliding_contents();
        $type = array();
        $type_list = array();

        for ($c = 0; $c < count($sliding_type); $c++) {
       		$obj = new stdClass();
       		$obj->category = $sliding_type[$c]->category;
       		$obj->image = array();
        	if (!in_array($obj, $type)){
        		array_push($type, $obj);
        		array_push($type_list, $sliding_type[$c]->category);
        	}
		} 
        for ($c = 0; $c < count($sliding_type); $c++) {
        	$key = array_search($sliding_type[$c]->category, $type_list);
       		$obj = new stdClass();
       		$obj->name = $sliding_type[$c]->name;
       		$obj->image_slider = $sliding_type[$c]->image_slider;
        	array_push($type[$key]->image, $obj);
		}

		$data['image'] = $type;
		$data['category'] = $type_list;
        return $data;
	}

	public function get_list_data($page,$length,$sub_type,$sort,$sort_type)
	{
		$data = array();
		$pages = array();
        $this->load->model('display_Model');
        $start = ($page-1)*$length;
        $product = $this->display_Model->get_list_contents($start,$length,$sub_type,$sort,$sort_type);
        $total_item = $this->display_Model->total_product($sub_type);
        $total_prod = $this->display_Model->total_all_product();

		$data['product_'] = $product;
		$data['total_item'] = $total_item;
		$data['total_prod'] = $total_prod;
		$total_page = ceil($total_item / $length);
		$max_page = $total_page;

		if($page == $max_page){
	        for ($c = 1;$c <= $length; $c++) {
	        	if(($page+$c-3)>0){
	        		array_push($pages,$page+$c-3);
	        	}	        	
	        }			
		}else if($page == 1){			
	        for ($c = 1;$c <= $length; $c++) {
	        	if(($page+$c-1)<=$max_page){
		        	array_push($pages,$page+$c-1);
		        }
	        }
		}else{			
	        for ($c = 1;$c <= $length; $c++) {
	        	array_push($pages,$page+$c-2);
	        }
		}

        $data['page'] = $pages;
		$data['page_'] = $page;
		$data['length'] = $length;
		$data['sub_type'] = $sub_type;
		$data['sort'] = $sort;
		$data['sort_type'] = $sort_type;

        return $data;
	}

	public function view_home()
	{
		$page = $this->input->get('page');
		$length = $this->input->get('length');
		$sub_type = $this->input->get('sub_type');
		$sort = $this->input->get('sort');
		$sort_type = $this->input->get('sort_type');
		$data = array();
		$data['type'] = $this->get_contents_data();
		$data['sliding'] = $this->get_sliding_data();
		$data['product'] = $this->get_list_data($page,$length,$sub_type,$sort,$sort_type);
		$data['promo'] = $this->get_promo_data();
		$data['chart'] = json_decode('[]');
		$newdata = array();
		$newdata['id'] = $this->session->userdata('id');
		$newdata['email'] = $this->session->userdata('email');
		$newdata['fullname'] = $this->session->userdata('fullname');
		$newdata['firstname'] = $this->session->userdata('firstname');
        $this->load->model('display_Model');
        $result = $this->display_Model->get_chart($newdata['id']);
        $data['chart'] = json_decode($result[0]->chart);
		for ($c = 0; $c < count($data['chart']); $c++) {
			$data['chart'][$c]->product_name = $this->display_Model->get_product($data['chart'][$c]->product_id)[0]->name;
		}
		$newdata['chart'] = $data['chart'];
		$this->session->set_userdata($newdata);
		$this->load->view('display',$data);
	}

	public function get_prod_page()
	{
		$page = $this->input->get('page');
		$length = $this->input->get('length');
		$sub_type = $this->input->get('sub_type');
		$mode = $this->input->get('mode');

		$data = array();
		$pages = array();
        $this->load->model('display_Model');
        $total_item = $this->display_Model->total_product($sub_type);

		$total_page = ceil($total_item / $length);
		$max_page = $total_page;

		if ($mode=='next'){
			$page++;
		}else if ($mode=='before'){
			$page--;
		}

		if($page < 1){
			$page = 1;
		}else if($page > $max_page){
			$page = $max_page;
		}

		if($page == $max_page){
	        for ($c = 1;$c <= $length; $c++) {
	        	if(($page+$c-3)>0){
	        		array_push($pages,$page+$c-3);
	        	}	        	
	        }			
		}else if($page == 1){			
	        for ($c = 1;$c <= $length; $c++) {
	        	if(($page+$c-1)<=$max_page){
		        	array_push($pages,$page+$c-1);
		        }
	        }
		}else{			
	        for ($c = 1;$c <= $length; $c++) {
	        	array_push($pages,$page+$c-2);
	        }
		}
		
		$data['page'] = $pages;
		$data['page_'] = $page;
		$data['length'] = $length;
		$data['sub_type'] = $sub_type;
		$data['base_url'] = base_url();

        echo(json_encode($data));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */