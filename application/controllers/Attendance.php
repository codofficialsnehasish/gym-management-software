<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->table_name='attendance';
		$this->view_path='attendance/';
		//$this->output->enable_profiler(TRUE);
        $this->load->library('upload');   
	}

	public function index()
	{
        if ($this->permission->method('attendance', 'read')->access()) {
            $header['pagecss']="contentCss";
            $header['title']='Attendance';
            $this->load->view('partials/header',$header);
            $attendancecon = array(
                'tblName'=>$this->table_name,
                'where'=> array(
                    'date' => date('Y-m-d'),
                )
            );
            $data['allitems'] = $this->select->getResult($attendancecon);
            // $data['allitems']=$this->select->select_table($this->table_name,'id','asc');
            $data['attendance_members']=$this->select->custom_qry("SELECT * FROM `attendance` GROUP BY employee_code;");
            $this->load->view($this->view_path.'content',$data);
            $script['pagescript']='contentScript';
            $this->load->view('partials/footer',$script);
        }else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}

    public function generate_attendance_report(){
        if ($this->permission->method('attendance', 'read')->access()) {
            $this->form_validation->set_rules('start_date', 'Start Date', 'required');
            $this->form_validation->set_rules('end_date', 'End Date', 'required');
			if ($this->form_validation->run() == false) {
				$this->session->set_flashdata('errors', validation_errors());
				//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
				redirect($this->agent->referrer());
			}
            $header['pagecss']="contentCss";
            $header['title']='Attendance';
            $this->load->view('partials/header',$header);

            $data['start_date'] = $start_date = $this->input->post('start_date', true);
            $data['end_date'] = $end_date = $this->input->post('end_date', true);
            $attendance_member_id = $this->input->post('attendance_member_id', true);

            if(!empty($attendance_member_id)){
                $data['allitems']=$this->select->custom_qry("SELECT * FROM `attendance`
                                                            WHERE employee_code = ".$attendance_member_id."
                                                            AND `date` BETWEEN '" . $start_date . "' AND '" . $end_date . "'
                                                            ");
            }else{
                $data['allitems']=$this->select->custom_qry("SELECT * FROM `attendance`
                                                            WHERE `date` BETWEEN '" . $start_date . "' AND '" . $end_date . "'
                                                            ");
            }
            $data['attendance_members']=$this->select->custom_qry("SELECT * FROM `attendance` GROUP BY employee_code;");
            $this->load->view($this->view_path.'content',$data);
            $script['pagescript']='contentScript';
            $this->load->view('partials/footer',$script);
        }else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
    }


	public function process()
	{
        if ($this->permission->method('attendance', 'create')->access()) {
            // Set upload configuration
            $config['upload_path']   = './uploads/'; // Directory to store uploaded files
            $config['allowed_types'] = 'csv';       // Allow only CSV files
            $config['max_size']      = 2048;        // Max size in KB (2MB)

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file')) {
                // File upload failed
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('errors', $error);
                redirect($this->agent->referrer());
            } else {
                $data = $this->upload->data();
                $file_path = $data['full_path'];

                // Read and process the CSV file
                if (($handle = fopen($file_path, 'r')) !== false) {
                    $header = fgetcsv($handle);

                    while (($row = fgetcsv($handle)) !== false) {
                        $original_date = $row[0];
                        $db_date = DateTime::createFromFormat('m/d/Y', $original_date)->format('Y-m-d');
                        $employee_code = $row[1];  

                        $user_data = $this->select->select_single_data('users','employee_code',$employee_code);
                        // print_r($user_data[0]->id); die;
                        if(!empty($user_data)){
                            $attendance_data = array(
                                "date" => $db_date,
                                "user_id" => $user_data[0]->id,
                                "employee_code" => $row[1],
                                "employee_name" => $row[2],
                                "company" => $row[3],
                                "department" => $row[4],
                                "category"=> $row[5],
                                "designation" => $row[6],
                                "grade" => $row[7],
                                "team" => $row[8],
                                "shift" => $row[9],
                                "in_time" => $row[10],
                                "out_time" => $row[11],
                                "duration" => $row[12],
                                "late_by" => $row[13],
                                "early_by" => $row[14],
                                "status" => $row[15],
                                "punch_records" => $row[16],
                                "overtime" => $row[17],
                            );

                            $attendancecon = array(
                                'tblName'=>'attendance',
                                'where'=> array(
                                    'date' => $db_date,
                                    'employee_code' => $employee_code,
                                )
                            );
                            $existing_record = $this->select->getResult($attendancecon);
                            if ($existing_record) {
                                $configs = array(
                                    'tblName' => 'attendance',
                                    'data' => $attendance_data,
                                    'where' => array('id'=>$existing_record['id'])
                                );
                                $update=$this->edit_model->edit($configs);
                            }else{
                                $configs = array(
                                    'tblName' => 'attendance',
                                    'data' => $attendance_data
                                );
                                $this->insert_model->insert_data($configs);
                            }

                        }

                    }
                    fclose($handle);
                    unlink($file_path);
                    $this->session->set_flashdata('success', 'CSV file processed successfully.');
                    // redirect($this->agent->referrer());
                    redirect('/attendance');
                } else {
                    $this->session->set_flashdata('error', 'Unable to open the CSV file.');
                    // redirect($this->agent->referrer());
                    redirect('/attendance');
                }
            }
        }else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}

}
