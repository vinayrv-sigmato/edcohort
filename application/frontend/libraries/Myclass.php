<?php
class Myclass
{
    function picture($img='')
    {

			$config['upload_path'] = getcwd().'/uploads/user/temp/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->CI =& get_instance();
			$config['max_width'] = '10241';
			$config['max_height'] = '7681';
			$config['encrypt_name'] = TRUE;
			$this->CI->load->library('upload', $config);
			if ($this->CI->upload->do_upload($img))
			{
				$newdata = $this->CI->upload->data();
				$img_new = $newdata['file_name'];
				$config['image_library'] = 'gd2';
			    //$config['source_image'] = getcwd().'/upload_image/thumb/'.$img_new;
				$config['source_image'] = getcwd().'/uploads/user/temp/'.$img_new;
				$config['new_image'] = getcwd().'/uploads/user/'.$img_new;
				$config['create_thumb'] = FALSE;
			    $config['maintain_ratio'] = FALSE;
			    $config['width'] = 250;
			    $config['height'] = 250;
				
			//print_r($config);
			$this->CI->load->library('image_lib', $config);
		    $this->CI->image_lib->resize();
			
			//unlink original image
			unlink(getcwd().'/uploads/user/temp/'.$img_new);
			return $img_new;
			}
		}

	function upload_pic($img='',$path='')
	{



						$config['upload_path'] = $path;  //getcwd().'/upload_image/full';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
						$this->CI =& get_instance();
						$config['max_width'] = '10241';
						$config['max_height'] = '7681';
						$config['encrypt_name'] = TRUE;
						$this->CI->load->library('upload', $config);
						if ($this->CI->upload->do_upload($img))
						{
							$newdata = $this->CI->upload->data();
							$img_new = $newdata['file_name'];
							$config['image_library'] = 'gd2';
						    //$config['source_image'] = getcwd().'/upload_image/thumb/'.$img_new;
							$config['source_image'] = $path.'/'.$img_new;
							$config['new_image'] = $path.'/thumb/'.$img_new;
							$config['create_thumb'] = false;
						    $config['maintain_ratio'] = TRUE;
						    $config['width'] = 250;
						    $config['height'] = 250;
							
						//print_r($config);
						$this->CI->load->library('image_lib', $config);
					    $this->CI->image_lib->resize();
						//$this->CI->image_lib->initialize($config);
						//$this->CI->image_lib->resize();
						//$this->CI->image_lib->clear();
						$return = array('status'=>1,'name'=>$img_new);
						return $return;
						} else {
							$return = array('status'=>0,'name'=>$this->CI->upload->display_errors());
							return $return;
						}
					
			}
//////////////////// upload audio files /////////////////////////////////////////////////////////////////
	function upload_audio($file='')
	{

		$config['upload_path'] = getcwd().'/uploads/audio';
		$config['allowed_types'] = '*';
		$this->CI =& get_instance();
		$config['max_size'] = '2048';
		$config['encrypt_name'] = TRUE;
		$this->CI->load->library('upload', $config);
		if ($this->CI->upload->do_upload($file))
		{
			$newdata = $this->CI->upload->data();
			$img_new = $newdata['file_name'];
			$return = array('status'=>1,'name'=>$img_new);
			return $return;
		} else {
			$return = array('status'=>0,'name'=>$this->CI->upload->display_errors());
			return $return;
		}
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////
	function create_user_thumbinal($img='',$path='',$width='150',$height='150')
	{
						$this->CI =& get_instance();
						    $img_new = $img;
							$config['image_library'] = 'gd2';
							//$new_path = getcwd().'/uploads/level/';
						    //$config['source_image'] = getcwd().'/upload_image/thumb/'.$img_new;
							$config['source_image'] = $path.'/temp/'.$img_new;
							$config['new_image'] = $path.'/'.$img_new;
							$config['create_thumb'] = false;
						    $config['maintain_ratio'] = TRUE;
						    $config['width'] = $width;
						    $config['height'] = $height;
						    $config['thumb_marker'] = '';
						   
							
						//print_r($config);
						$this->CI->load->library('image_lib');
						$this->CI->image_lib->initialize($config);
					    if(!$this->CI->image_lib->resize()){
					    	 echo $this->CI->image_lib->display_errors();exit;
					    } else {
					    	return $img_new;	
					    }
						//$this->CI->image_lib->initialize($config);
						//$this->CI->image_lib->resize();
						$this->CI->image_lib->clear();
						
						
					
			}
////////////////////////////////////////////////////////////////////////////////////////////////////////
	function uploadMultiImage($uploadData,$fieldName,$uploadPath,$thumbPath,$thumbwidth,$thubHeight)
	{
		if($uploadData)
		{
			$this->CI =& get_instance();
			$this->CI->load->library('upload');
			$config['upload_path'] = getcwd().$uploadPath;
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['encrypt_name'] = TRUE;
			//$config['overwrite'] = TRUE;
			$this->CI->upload->initialize($config);
			$returndata = '';
			for($i=0;$i<count($uploadData['name']);$i++)
			{
				$config['upload_path'] = '';
				$config['upload_path'] = getcwd().$uploadPath;
				$_FILES[$fieldName]['name']= $uploadData['name'][$i];
        		$_FILES[$fieldName]['type']= $uploadData['type'][$i];
				$_FILES[$fieldName]['tmp_name']= $uploadData['tmp_name'][$i];
				$_FILES[$fieldName]['error']= $uploadData['error'][$i];
				$_FILES[$fieldName]['size']= $uploadData['size'][$i];    
				$uploaded_img_data = '';
				if ($this->CI->upload->do_upload($fieldName))
				{
					$uploaded_img_data = $this->CI->upload->data();
					$config['image_library'] = 'gd2';
					$config['source_image'] = getcwd().$uploadPath.$uploaded_img_data['file_name'];
					//$config['create_thumb'] = TRUE;
					
					$config['maintain_ratio'] = TRUE;
					$config['width'] = $thumbwidth;
					$config['height'] = $thubHeight;
					$config['new_image'] = getcwd().$thumbPath.$uploaded_img_data['file_name'];
					$this->CI->load->library('image_lib', $config);
					$this->CI->image_lib->initialize($config);
					$this->CI->image_lib->resize();
					$this->CI->image_lib->clear();
					
					$returndata[]= $uploaded_img_data['file_name'];
				}
				else
				{
					//$returndata .='<div class="alert alert-error">'.$this->upload->display_errors().'</div>';
				}
			}
			$returndata = ($returndata=='') ? $this->CI->upload->display_errors() : $returndata;
			return $returndata;
		}
	}

	function uploadImage($uploadData,$fieldName,$uploadPath,$uploadPath1,$thumbwidth,$thubHeight)
	{
		if($uploadData['name'])
		{
			$this->CI =& get_instance();
			$this->CI->load->library('upload');
			$config['upload_path'] = getcwd().$uploadPath;
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['encrypt_name'] = TRUE;
			//$config['overwrite'] = TRUE;
			$this->CI->upload->initialize($config);
			if ($this->CI->upload->do_upload($fieldName))
			{
				$uploaded_img_data = $this->CI->upload->data();
				$config['image_library'] = 'gd2';
				$config['source_image'] = getcwd().$uploadPath.$uploaded_img_data['file_name'];
				//$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width'] = $thumbwidth;
				$config['height'] = $thubHeight;
				$config['new_image'] = getcwd().$uploadPath1.$uploaded_img_data['file_name'];
				$this->CI->load->library('image_lib', $config);
				$this->CI->image_lib->initialize($config);
				$this->CI->image_lib->resize();
				$this->CI->image_lib->clear();
				@unlink(getcwd().'/upload_media/deal/'.$uploaded_img_data['file_name']);
				return $uploaded_img_data['file_name'];
				//return '<img src="'.base_url().'images'.$uploadPath.$uploaded_img_data['file_name'].'">';;
			}
			else
			{
				return '<div class="alert alert-error">'.$this->CI->upload->display_errors().'</div>';
			}
		}
	}	

	function uploadTestimonialImage($uploadData,$fieldName,$uploadPath,$uploadPath1,$thumbwidth,$thubHeight)
	{
		if($uploadData['name'])
		{
			$this->CI =& get_instance();
			$this->CI->load->library('upload');
			$config['upload_path'] = getcwd().$uploadPath;
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['encrypt_name'] = TRUE;
			//$config['overwrite'] = TRUE;
			$this->CI->upload->initialize($config);
			if ($this->CI->upload->do_upload($fieldName))
			{
				$uploaded_img_data = $this->CI->upload->data();
				$config['image_library'] = 'gd2';
				$config['source_image'] = getcwd().$uploadPath.$uploaded_img_data['file_name'];
				//$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = FALSE;
				$config['width'] = $thumbwidth;
				$config['height'] = $thubHeight;
				$config['new_image'] = getcwd().$uploadPath1.$uploaded_img_data['file_name'];
				$this->CI->load->library('image_lib', $config);
				$this->CI->image_lib->initialize($config);
				$this->CI->image_lib->resize();
				$this->CI->image_lib->clear();
				@unlink(getcwd().'/upload_media/deal/'.$uploaded_img_data['file_name']);
				return $uploaded_img_data['file_name'];
				//return '<img src="'.base_url().'images'.$uploadPath.$uploaded_img_data['file_name'].'">';;
			}
			else
			{
				return '<div class="alert alert-error">'.$this->CI->upload->display_errors().'</div>';
			}
		}
	}	

}
?>