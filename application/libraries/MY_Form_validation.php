<?php

class MY_Form_validation extends CI_Form_validation {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Return all validation errors
     *
     * @access  public
     * @return  array
     */
    public function run($module = '', $group = '') {
        (is_object($module)) AND $this->CI = &$module;
        return parent::run($group);
    }

    function get_all_errors() {
        $error_array = array();
        if (count($this->_error_array) > 0) {
            if (ENVIRONMENT == "production" && !$this->_is_unique_exist) {
                return_data(false, "Invalid Request", array());
            }
            foreach ($this->_error_array as $k => $v) {
                $error_array[$k] = $v;
            }
            return $error_array;
        }
        return false;
    }

    // check uinqeness in case of existing record
    public function edit_unique($str, $field) {

        sscanf($field, '%[^.].%[^.].%[^.]', $table, $field, $id);
        return isset($this->CI->db) ? ($this->CI->db->limit(1)->get_where($table, array($field => $str, 'id !=' => $id))->num_rows() === 0) : FALSE;
    }

    public function stream_edit_unique($str, $field) {

        sscanf($field, '%[^.].%[^.].%[^.].%[^.]', $table, $field, $id, $parent_id);
        return isset($this->CI->db) ? ($this->CI->db->limit(1)->get_where($table, array($field => $str, 'id !=' => $id, 'parent_id =' => $parent_id))->num_rows() === 0) : FALSE;
    }

    public function stream_add_unique($str, $field) {

        sscanf($field, '%[^.].%[^.].%[^.]', $table, $field, $parent_id);
        return isset($this->CI->db) ? ($this->CI->db->limit(1)->get_where($table, array($field => $str, 'parent_id =' => $parent_id))->num_rows() === 0) : FALSE;
    }

    public function menu_add_unique($str, $field) {

        sscanf($field, '%[^.].%[^.].%[^.]', $table, $field, $parent_id);
        return isset($this->CI->db) ? ($this->CI->db->limit(1)->get_where($table, array($field => $str, 'menu_for =' => $parent_id))->num_rows() === 0) : FALSE;
    }

    public function menu_add_parent_unique($str, $field) {

        sscanf($field, '%[^.].%[^.].%[^.]', $table, $field, $parent_id);
        return isset($this->CI->db) ? ($this->CI->db->limit(1)->get_where($table, array($field => $str, 'parent_id =' => $parent_id))->num_rows() === 0) : FALSE;
    }

}
