<?php

//Product classı her yüklendiğinde ...
class Product extends  CI_Controller {

    //... ortak olarak yüklenmesini istediğimiz tüm aksiyonları burada tamamlıyoruz.
    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "product_v";

        $this->load->model("product_model");

    }

    //index metodu altına sadece listeleme yapmak istediğimiz kodları kontrol ediyoruz.
    public function index(){

        $viewData = new stdClass();

        /* Tablodan Verilerin Getirilmesi */
        $items = $this->product_model->get_all();
        /* 1 - Veritabanında ki  verileri getir */
        /* 2 - items isimli değişkene yazdır */

        /* print_r($items); */
        /* items'ı ekrana yazdır. */
        /* View'e gönderilecek değişkenlerin set edilmesi.
        Veritabanından gelen verileri viewde göstermek istiyorsak bu item'ı view'e göndermemiz gerekiyor. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

}