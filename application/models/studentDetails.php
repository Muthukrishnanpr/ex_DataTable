<?php

class studentDetails extends CI_Model
{
    public function getData($limit, $offset, $order_by, $sort)
    {
        // return $this->db->query("SELECT * FROM students LEFT JOIN studentcourse ON
        // students.RollNo = studentcourse.RollNo");
        $query = $this->db->select('*');
        $query = $this->db->from('students');
        $query = $this->db->join('studentcourse', 'studentcourse.RollNo = students.RollNo', 'left');
        $query = $this->db->limit($limit, $offset);
        if (!empty($order_by)) {
            $query = $this->db->order_by($order_by, $sort);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getTotalData()
    {
        $query = $this->db->select('COUNT(*) as total_posts', FALSE);
        $query = $this->db->from('students');
        $query = $this->db->join('studentcourse', 'studentcourse.RollNo = students.RollNo', 'left');
        $query = $this->db->get();
        $result = $query->row();
        if ($result) {
            return $result->total_posts;
        }
        return 0;
    }
}
