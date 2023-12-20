<?php
class Chat extends CI_Controller{
	
	/**
	 * Constructor duh
	 * - loads the model
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->model('chat_model');	
		$this->load->model('common_model');
	}
	
	/**
	 * Loads the default page for the XML example
	 * 
	 */
	public function index()
	{	
	    $this->load->view('common/header');
		$this->load->view('chat/chatView');		
		$this->load->view('common/footer');
	}
	
	/**
	 * UPDATES the DB
	 * 
	 * @param $_POST array
	 * @return bool
	 */
	public function update_visitor()
	{
	    //delete old data
        $ip = $this->input->ip_address();
		$name = $this->input->post('name');
		$message = $this->input->post('msg');
        
		$current = new DateTime();		
		$data = array('msg'=>$message,
		                'ip'=>$ip,
		            'time' => date("H:i:s"),
		            'role'=>1);
		$insertid = $this->common_model->insertData('tbl_messages',$data);
		if($insertid){
		    return true;
		}else{
		    return false;}
		
	}
	public function delete_chat()
	{
        $ip = $this->input->ip_address();
		$insertid = $this->common_model->deleteData('tbl_messages',array("ip"=>$ip));
		if($insertid){
		    return true;
		}else{
		    return false;}
		
	}
	
	/**
	 * XML Backend
	 * 
	 * @return
	 */
	public function get_all()
	{	
		//HTTP headers for XML							
		header("Content-type: text/xml");
		header("Cache-Control: no-cache");
		
		$date = date('Y-m-d');
	   // $query = $this->db->query("delete from tbl_messages where time < CURDATE() ");
	    
		
		//get the data		
		$ip = $this->input->ip_address();
		$query = $this->db->query("SELECT * FROM tbl_messages where ip = '$ip' ORDER BY id ASC")->result();
		
		$html ='';
		//Loop through all the data
			foreach($query as $row){
			    if($row->role == 0){
			        $html .= '<div class="chat_message_wrapper">
                                <ul class="chat_message">
                                    <li><p>';
			    }
			    else if($row->role == 1){
			        $html .= '<div class="chat_message_wrapper chat_message_right">
                                <ul class="chat_message">
                                    <li>
                                    <p>';
			    }
			    $html .= $row->msg;
			    $html .= '</p>
                        </li>
                        </ul>
                    </div>';
			}
			$html .= '';

		echo $html;
	}
	public function ChatAttachmentUpload(){
		 
		
		$file_data='';
		if(isset($_FILES['attachmentfile']['name']) && !empty($_FILES['attachmentfile']['name'])){	
				$config['upload_path']          = './uploads/chat/attachment';
				$config['allowed_types']        = 'jpeg|jpg|png|txt|pdf|docx|xlsx|pptx|rtf';
				//$config['max_size']             = 500;
				//$config['max_width']            = 1024;
				//$config['max_height']           = 768;
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('attachmentfile'))
				{
					echo json_encode(['status' => 0,
					'message' => '<span style="color:#900;">'.$this->upload->display_errors(). '<span>' ]); die;
				}
				else
				{
					$file_data = $this->upload->data();
					//$filePath = $file_data['file_name'];
					return $file_data;
				}
		    }
 		 
	}
	
	
}
?>