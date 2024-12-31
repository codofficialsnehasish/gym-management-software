<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mediaupload {

private $_CI; // make a private class variable here. 

public function __construct()
{
    $this->_CI =& get_instance();
}

public function doUpload($file){
    if(!empty($_FILES)){
        // File upload configuration
        $basefolder='./uploads/media/';
        $year = date("Y");   
        $month = date("m");   
        $filename = $basefolder.$year;   
        $filename2 = $filename."/".$month;
        if(!file_exists($filename)){
                mkdir($filename,0777);
                fopen($filename."/index.html", "w");
            }
        
        if(!file_exists($filename2)){
                mkdir($filename2,0777);
                fopen($filename2."/index.html", "w");
            }
        
        $uploadPath = $filename2.'/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'jpg|jpeg|png|gif';;
        
        // Load and initialize upload library
        $this->_CI->load->library('upload', $config);
        $this->_CI->upload->initialize($config);
        
        // Upload file to the server
        if($this->_CI->upload->do_upload($file)){
            $fileData = $this->_CI->upload->data();
            $uploadData['file_name'] = $fileData['file_name'];
            $uploadData['uploaded_on'] = date("Y-m-d H:i:s");
            $uploadData['file_path'] = substr($uploadPath, 2);
            // Insert files info into the database
            $configs = array(
                'tblName' => 'media',
                'data' => $uploadData
            );
            return $this->_CI->insert_model->insert_data($configs);
            // return $insert;
             
        }
    }else{
        return 0;
    }

}

public function doUploadFile($file){
    if(!empty($_FILES)){
        // File upload configuration
        $basefolder='./uploads/media/files/';
        $year = date("Y");   
        $month = date("m");   
        $filename = $basefolder.$year;   
        $filename2 = $filename."/".$month;
        if(!file_exists($filename)){
                mkdir($filename,0777);
                fopen($filename."/index.html", "w");
            }
        
        if(!file_exists($filename2)){
                mkdir($filename2,0777);
                fopen($filename2."/index.html", "w");
            }
        
        $uploadPath = $filename2.'/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'xls|pdf|doc|docx|xlsx';;
        
        // Load and initialize upload library
        $this->_CI->load->library('upload', $config);
        $this->_CI->upload->initialize($config);
        
        // Upload file to the server
        if($this->_CI->upload->do_upload($file)){
            $fileData = $this->_CI->upload->data();
            $uploadData['file_name'] = $fileData['file_name'];
            $uploadData['uploaded_on'] = date("Y-m-d H:i:s");
            $uploadData['file_path'] = substr($uploadPath, 2);
            // Insert files info into the database
            $configs = array(
                'tblName' => 'media',
                'data' => $uploadData
            );
            return $this->_CI->insert_model->insert_data($configs);
            // return $insert;
             
        }
    }else{
        return 0;
    }

}

public function doUploadAny($file){
    if(!empty($_FILES)){
        // File upload configuration
        $basefolder='./uploads/media/files/';
        $year = date("Y");   
        $month = date("m");   
        $filename = $basefolder.$year;   
        $filename2 = $filename."/".$month;
        if(!file_exists($filename)){
                mkdir($filename,0777);
                fopen($filename."/index.html", "w");
            }
        
        if(!file_exists($filename2)){
                mkdir($filename2,0777);
                fopen($filename2."/index.html", "w");
            }
        
        $uploadPath = $filename2.'/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'jpg|jpeg|png|gif|xls|pdf|doc|docx|xlsx';;
        
        // Load and initialize upload library
        $this->_CI->load->library('upload', $config);
        $this->_CI->upload->initialize($config);
        
        // Upload file to the server
        if($this->_CI->upload->do_upload($file)){
            $fileData = $this->_CI->upload->data();
            $uploadData['file_name'] = $fileData['file_name'];
            $uploadData['uploaded_on'] = date("Y-m-d H:i:s");
            $uploadData['file_path'] = substr($uploadPath, 2);
            // Insert files info into the database
            $configs = array(
                'tblName' => 'media',
                'data' => $uploadData
            );
            return $this->_CI->insert_model->insert_data($configs);
            // return $insert;
             
        }
    }else{
        return 0;
    }

}

function do_upload_rename($upload_path = null, $field_name = null, $name=null, $overwrite = true) {
    if (empty($_FILES[$field_name]['name'])) {
        return null;
    } else {
        //-----------------------------
        $ci =& get_instance();
        $ci->load->helper('url');  

        //folder upload
        $file_path = $upload_path;
        if (!is_dir($file_path))
            mkdir($file_path, 0755,true);
        //ends of folder upload 

        //set config 
        $config = [
            'upload_path'   => $file_path,
            'allowed_types' => 'jpg|png|pdf', 
            'overwrite'     => $overwrite,
            'file_name'     => $name,
            'maintain_ratio' => true,
            'width'          => 1920,
            'height'         => 1200,
            'remove_spaces' => true,
            'file_ext_tolower' => true 
        ]; 
        $ci->load->library('upload', $config);

        if (!$ci->upload->do_upload($field_name)) {
            return false;
        } else {
            $file = $ci->upload->data();
            return $file_path.$file['file_name'];
        }
    }
}   

public function do_resize($file_path = null, $width = null, $height = null) {
    $ci =& get_instance();
    $ci->load->library('image_lib');
    $config = [
        'image_library'  => 'gd2',
        'source_image'   => $file_path,
        'create_thumb'   => false,
        'maintain_ratio' => false,
        'width'          => $width,
        'height'         => $height,
    ]; 
    $ci->image_lib->initialize($config);
    $ci->image_lib->resize();
}

}