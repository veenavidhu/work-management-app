<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DailyTask extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        
        if ( ! $this->session->userdata('logged_in'))
        { 
            redirect(base_url().'login');
        }
    }

    public function index()
    {
        $this->load->view('staff/header');
        $this->load->view('staff/apply-DailyTask');
        $this->load->view('staff/footer');
    }

    public function approve()
    {
        $staff=$this->session->userdata('userid');
        $data['content']=$this->DailyTask_model->select_Task_forApprove();
        $this->load->view('admin/header');
        $this->load->view('admin/approve-task',$data);
        $this->load->view('admin/footer');
    }

    public function manage()
    {
        $data['content']=$this->DailyTask_model->select_dailyTask();
        $this->load->view('admin/header');
        $this->load->view('admin/manage-task',$data);
        $this->load->view('admin/footer');
    }

    public function view()
    {
        $staff=$this->session->userdata('userid');
        $data['content']=$this->DailyTask_model->select_workList_byStaffID($staff);
        $this->load->view('staff/header');
        $this->load->view('staff/view-DailyTask',$data);
        $this->load->view('staff/footer');
    }

    public function insert_approve($id)
    {
        $data=$this->DailyTask_model->update_dailyTask(array('status'=>1),$id);
        if($this->db->affected_rows() > 0)
        {
            $this->session->set_flashdata('success', "Task Approved Succesfully"); 
        }else{
            $this->session->set_flashdata('error', "Sorry, Task Approve Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function insert_reject($id)
    {
        $data=$this->DailyTask_model->update_dailyTask(array('status'=>2),$id);
        if($this->db->affected_rows() > 0)
        {
            $this->session->set_flashdata('success', "Task Rejected Succesfully"); 
        }else{
            $this->session->set_flashdata('error', "Sorry, Task Reject Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function insert()
    {
        $this->form_validation->set_rules('jobTitle', 'Title', 'required');
        $this->form_validation->set_rules('jobDate', 'Job Date', 'required');
        $this->form_validation->set_rules('StartTime', 'Start Time', 'required');
        $this->form_validation->set_rules('EndTime', 'End Time', 'required');
        //$this->form_validation->set_rules('txtdescription', 'De', 'required');
        

        $staff=$this->session->userdata('userid');
        $jobTitle=$this->input->post('jobTitle');
        $jobDate=$this->input->post('jobDate');
        $StartTime=$this->input->post('StartTime');
        $StartTime = str_replace("am", "AM", $StartTime);
        $EndTime=$this->input->post('EndTime');
        $EndTime = str_replace("pm", "PM", $EndTime);
        $txtdescription=$this->input->post('txtdescription');
         if($this->form_validation->run() !== false)
        {
        $data=$this->DailyTask_model->insert_task(array('staff_id'=>$staff,'jobTitle'=>$jobTitle,'jobDate'=>$jobDate,'startTime'=>$StartTime,'endTime'=>$EndTime,'description'=>$txtdescription));
        if($data==true)
        {
            $this->session->set_flashdata('success', "New Task Applied Succesfully"); 
        }else{
            $this->session->set_flashdata('error', "Sorry, New Task Apply Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
        }
        else{
            $this->index();
            return false;

        } 
        
    }







}
