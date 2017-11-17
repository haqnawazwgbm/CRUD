<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_Home extends CI_Controller {

	 function __construct() {
        parent::__construct();

    }

    public function index() {
        $con['conditions'] = array();
        $data['users'] = $this->Common_Model->getRows($con, 'users');
    	$this->load->view('home', $data);
    }

    public function user_form() {
        $this->load->view('user_form');
    }

    public function store() {
        if ($this->input->post('submitUser')) {
                $this->form_validation->set_rules('name', 'name', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
               
                $userData = array(
                    'name' => strip_tags($this->input->post('name')),
                    'email' => strip_tags($this->input->post('email')),
                    'status' => strip_tags($this->input->post('status'))
                ); 
                if ($this->form_validation->run() == true) {
                    $id = $this->Common_Model->insert($userData, 'users');
                    if($id){

                            $this->session->set_flashdata('success', array('message' => 'Record successfully.'));
                            redirect('Site_Home');
                    }else{
                         $this->session->set_flashdata('danger', array('message' => 'Something went wrong. Please try again.'));
                        redirect('Site_Home');
                        
                    }
                } else {
 
                    $this->session->set_flashdata('danger', array('message' => 'Something went wrong. Please try again.'));
                    $con['conditions'] = array();
                    $data['users'] = $this->Common_Model->getRows($con, 'users');   
                    $this->load->view('home', $data);
                }

        }
    }

    public function edit_form($id) {
        $user = $this->Common_Model->getRows(array('id' => $id), 'users');
        echo json_encode($user);
        exit;
    }

      public function edit() {
        if ($this->input->post('submitUser')) {
                $this->form_validation->set_rules('name', 'name', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required');

                $id = $this->input->post('id');
                $userData = array(
                    'id' => $id,
                    'name' => strip_tags($this->input->post('name')),
                    'email' => strip_tags($this->input->post('email')),
                    'status' => $this->input->post('status')
                );

                 $condition = array('id' => $id);
                 if ($this->form_validation->run() == true) {

                    $update = $this->Common_Model->update($userData, $condition, 'users');
                    if($update){
                        $this->session->set_flashdata('success', array('message' => 'Record updated successfully.'));
                        redirect('Site_Home');
                    }else{
                        $this->session->set_flashdata('warning', array('message' => 'Something went wrong. Please try again.'));
                        redirect('Site_Home');
                    }
                } else {
                $this->session->set_flashdata('danger', array('message' => 'Something went wrong. Please try again.'));
                $con['conditions'] = array();
                $data['users'] = $this->Common_Model->getRows($con, 'users');
                //load the view
                $this->load->view('home', $data);
                }
        }
    }

     public function delete($id) {
        $condition = array('id' => $id);
        $this->Common_Model->delete($condition, 'users');
        $this->session->set_flashdata('success', array('message' => 'Record deleted successfully.'));
        redirect('Site_Home/');
    }

}