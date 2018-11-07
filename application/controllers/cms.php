<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cms extends CI_Controller {

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
	public $cms;

	public function __construct() {
	    parent::__construct();
	    $this->cms = new stdClass();
	    $this->cms->product_list = new stdClass();
		$this->cms->product_list->page = 'cms_tables';
	    $this->cms->product_list->page_name = 'Product List';
		$this->cms->product_list->sub_page_menu_ = 'Product';
		$this->cms->product_list->page_menu_ = 'Tables';
	    $this->cms->product_list->table_column = array();
		array_push($this->cms->product_list->table_column,'id'); 
		array_push($this->cms->product_list->table_column,'name'); 
		array_push($this->cms->product_list->table_column,'price_curr'); 
		array_push($this->cms->product_list->table_column,'price'); 
		array_push($this->cms->product_list->table_column,'description'); 
		array_push($this->cms->product_list->table_column,'sub_type'); 
		array_push($this->cms->product_list->table_column,'image');	 
		array_push($this->cms->product_list->table_column,'total_item');	       
	    $this->cms->product_type = new stdClass();
		$this->cms->product_type->page = 'cms_tables';
	    $this->cms->product_type->page_name = 'Product Type';
		$this->cms->product_type->sub_page_menu_ = 'Product';
		$this->cms->product_type->page_menu_ = 'Tables';
	    $this->cms->product_type->table_column = array();
		array_push($this->cms->product_type->table_column,'id'); 
		array_push($this->cms->product_type->table_column,'prod_type'); 
		array_push($this->cms->product_type->table_column,'prod_sub_type'); 
		array_push($this->cms->product_type->table_column,'total_item');       
	    $this->cms->order = new stdClass();
		$this->cms->order->page = 'cms_tables';
	    $this->cms->order->page_name = 'Order';
		$this->cms->order->sub_page_menu_ = 'Order';
		$this->cms->order->page_menu_ = 'Tables';
	    $this->cms->order->table_column = array();
		array_push($this->cms->order->table_column,'id'); 
		array_push($this->cms->order->table_column,'user_id'); 
		array_push($this->cms->order->table_column,'chart'); 
		array_push($this->cms->order->table_column,'order_date');     
	    $this->cms->promo = new stdClass();
		$this->cms->promo->page = 'cms_tables';
	    $this->cms->promo->page_name = 'Promo';
		$this->cms->promo->sub_page_menu_ = 'Promo';
		$this->cms->promo->page_menu_ = 'Tables';
	    $this->cms->promo->table_column = array();
		array_push($this->cms->promo->table_column,'id'); 
		array_push($this->cms->promo->table_column,'name'); 
		array_push($this->cms->promo->table_column,'img_url'); 
		array_push($this->cms->promo->table_column,'description'); 
		array_push($this->cms->promo->table_column,'promo');    
	    $this->cms->slide_promo = new stdClass();
		$this->cms->slide_promo->page = 'cms_tables';
	    $this->cms->slide_promo->page_name = 'Slide Promo';
		$this->cms->slide_promo->sub_page_menu_ = 'Promo';
		$this->cms->slide_promo->page_menu_ = 'Tables';
	    $this->cms->slide_promo->table_column = array();
		array_push($this->cms->slide_promo->table_column,'id'); 
		array_push($this->cms->slide_promo->table_column,'image_slider'); 
		array_push($this->cms->slide_promo->table_column,'category'); 
		array_push($this->cms->slide_promo->table_column,'name');       
	    $this->cms->user = new stdClass();
		$this->cms->user->page = 'cms_tables';
	    $this->cms->user->page_name = 'User';
		$this->cms->user->sub_page_menu_ = 'User';
		$this->cms->user->page_menu_ = 'Tables';
	    $this->cms->user->table_column = array();
		array_push($this->cms->user->table_column,'id'); 
		array_push($this->cms->user->table_column,'email'); 
		array_push($this->cms->user->table_column,'password'); 
		array_push($this->cms->user->table_column,'fullname'); 
		array_push($this->cms->user->table_column,'address'); 
		array_push($this->cms->user->table_column,'city'); 
		array_push($this->cms->user->table_column,'chart');      
	}

	public function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
        $this->load->model('cms_Model');
        $result = $this->cms_Model->get_admin($email,$password);
        if(count($result)==0){
        	$isPasswordCorrect = false;	
        }else{
        	$isPasswordCorrect = true;
        }

		if($isPasswordCorrect){
			$newdata = array();
			$newdata['id'] = $result[0]->id;
			$newdata['email'] = $email;
			$newdata['isadmin'] = true;
			$this->session->set_userdata($newdata);
		}else{
			$this->session->sess_destroy();
		}

		$this->index();
	}
	public function logout()
	{
	    $this->session->sess_destroy();
	    $this->index();
	}

	public function index()
	{
		$data['page'] = 'cms_home';
		$data['page_name'] = 'Home';
		$data['sub_page_menu_'] = 'Home';
		$data['page_menu_'] = 'Home';
		$data['table_column'] = array();
		$this->load->view('cms',$data);
	}

	public function check_sess(){
		if(!$this->session->userdata('isadmin')){
			redirect('http://localhost/app_online_shop/cms');
		}
	}

	public function view_(){
		$this->check_sess();
		$type = $this->input->get('type');
		$data['type'] = $type;
		$data['page'] = $this->cms->$type->page;
		$data['page_name'] = $this->cms->$type->page_name;
		$data['sub_page_menu_'] = $this->cms->$type->sub_page_menu_;
		$data['page_menu_'] = $this->cms->$type->page_menu_;
		$data['table_column'] = $this->cms->$type->table_column;
		$page = $this->input->get('page');
		$length = $this->input->get('length');
		$sort = $this->input->get('sort');
		$sort_type = $this->input->get('sort_type');
		$data['length'] = $length;
		$data['sort'] = $sort;
		$data['sort_type'] = $sort_type;
	    $this->load->model('cms_Model');
        $start = ($page-1)*$length;
        $total_item = $this->cms_Model->get_list_total($type);
        $data['page_'] = $page;
        $data['max_page'] = ceil($total_item / $length);
        $data['pages'] = array();

		if($page == $data['max_page']){
	        for ($c = 1;$c <= $length; $c++) {
	        	if((($page+$c-3)>0)&&(($page+$c-3)<=$data['max_page'])){
	        		array_push($data['pages'],$page+$c-3);
	        	}	        	
	        }			
		}else if($page == 1){			
	        for ($c = 1;$c <= $length; $c++) {
	        	if(($page+$c-1)<=$data['max_page']){
		        	array_push($data['pages'],$page+$c-1);
		        }
	        }
		}else{			
	        for ($c = 1;$c <= $length; $c++) {
	        	if($page+$c-2 <= $data['max_page']){
		        	array_push($data['pages'],$page+$c-2);
		        }
	        }
		}

	    $data['prod_list'] = $this->cms_Model->get_list_data($type,$start,$length,$sort,$sort_type);
		$this->load->view('cms',$data);
	}

	public function get_prod_page()
	{
		$this->check_sess();
		$type = $this->input->get('type');
		$page = $this->input->get('page');
		$length = $this->input->get('length');
		$sub_type = $this->input->get('sub_type');
		$mode = $this->input->get('mode');

		$data = array();
		$pages = array();
        $this->load->model('cms_Model');
        $total_item = $this->cms_Model->get_list_total($type);

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
	        	if((($page+$c-3)>0)&&(($page+$c-3)<=$data['max_page'])){
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
	        	if($page+$c-2 <= $max_page){
		        	array_push($pages,$page+$c-2);
		        }
	        }
		}
		
		$data['page'] = $pages;
		$data['page_'] = $page;
		$data['length'] = $length;
		$data['base_url'] = base_url();

        echo(json_encode($data));
	}

	public function get_by_id(){
		$this->check_sess();
		$type = $this->input->get('type');
		$id = $this->input->get('id');
	    $this->load->model('cms_Model');
	    $data = $this->cms_Model->get_by_id($id,$type);
	    echo json_encode($data);
	}

	public function update_(){
		$this->check_sess();
		$type = $this->input->get('type');
		$id = $this->input->get('id');
		$var = $this->input->get();
        unset($var['id']);
        unset($var['type']);
	    $this->load->model('cms_Model');
	    $data = $this->cms_Model->update_($type,$id,$var);
	    echo json_encode($data);
	}

	public function delete_(){
		$this->check_sess();
		$type = $this->input->get('type');
		$id = $this->input->get('id');
		$var = $this->input->get();
        unset($var['id']);
        unset($var['type']);
	    $this->load->model('cms_Model');
	    $data = $this->cms_Model->delete_($type,$id);
	    echo json_encode($data);
	}

	public function add_(){
		$this->check_sess();
		$type = $this->input->get('type');
		$var = $this->input->get();
        unset($var['id']);
        unset($var['type']);
	    $this->load->model('cms_Model');
	    $data = $this->cms_Model->add_($type,$var);
	    echo json_encode($data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */