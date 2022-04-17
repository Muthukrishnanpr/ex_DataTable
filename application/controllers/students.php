<?php

class Students extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('studentDetails');
    }

    public function index()
    {
        $this->load->view('studentDetails');
    }

    public function getData()
    {
        $draw = $this->input->post('draw');
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $order = $this->input->post('order');

        $col = 0;
        $sort = "";

        if (!empty($order)) {
            foreach ($order as $o) {
                $col = $o['column']; //Column name
                $sort = $o['dir']; //choose dir asc or desc
            }
        }
        $columns_valid = [
            'Name', 'Address', 'PhoneNumber', 'Age', 'CouseId', 'CourseName'
        ];
        $order_by=null;

        if(isset($columns_valid[$col])) {
            $order_by = $columns_valid[$col];
        }

        $total_posts = $this->studentDetails->getTotalData();

        $posts = $this->studentDetails->getData($length, $start, $order_by, $sort);
        $data = [];
        foreach ($posts->result() as $post) {
            $data[] = [
                //  $post->RollNo,
                $post->Name,
                $post->Address,
                $post->PhoneNumber,
                $post->Age,
                $post->CourseId,
                $post->CourseName,
            ];
        }

        $output = [
            'draw' => $draw,
            'recordsTotal' => $total_posts,
            'recordsFiltered' => $total_posts,
            'data' => $data
        ];
        echo json_encode($output);
        exit();
    }
}
