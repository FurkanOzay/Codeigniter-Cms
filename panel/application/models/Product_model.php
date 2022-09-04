<?php

class Product_model extends CI_Model {

    public $tableName = "products";

    public function __construct()
    {
        parent::__construct();

    }

    /* Tüm kayıtları getirecek olan metot */
    public function get_all(){
        return $this->db->get($this->tableName)->result();
    }

    /* Veritabanına ekleme yapacak olan metot */
    public function add($data = array()){
        /* Add isimli metoda array gönderdiğimizde metot bize bu arrayi döndürecek. */
        return $this->db->insert($this->tableName, $data);
    }

}