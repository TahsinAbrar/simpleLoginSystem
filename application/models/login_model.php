<?php


/**
 * Description of login_model
 *
 * @author Tahsin Abrar
 */
class Login_Model extends CI_Model {
    //put your code here
        public function check_login_info($email_address,$password)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email_address',$email_address);
        $this->db->where('password',md5($password));
        $this->db->limit(1);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
}

?>
