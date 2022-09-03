<?php

//Product classı her yüklendiğinde ...
class Product extends  CI_Controller {

    //... ortak olarak yüklenmesini istediğimiz tüm aksiyonları burada tamamlıyoruz.
    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "product_v";
    }

    //index metodu altına sadece listeleme yapmak istediğimiz kodları kontrol ediyoruz.
    public function index(){

        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

}