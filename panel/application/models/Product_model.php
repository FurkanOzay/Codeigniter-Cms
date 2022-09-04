<?php

class Product_model extends CI_Model {

    public $tableName = "products";

    public function __construct()
    {
        parent::__construct();

    }

    public function get($where = array()){
        return $this->db->where($where)->get($this->tableName)->row();
    }

    /* Tüm kayıtları getirecek olan metot */
    public function get_all($where = array()){
        return $this->db->where($where)->get($this->tableName)->result();
    }

    /* Veritabanına ekleme yapacak olan metot */
    public function add($data = array()){
        /* Add isimli metoda array gönderdiğimizde metot bize bu arrayi döndürecek. */
        return $this->db->insert($this->tableName, $data);
    }

}