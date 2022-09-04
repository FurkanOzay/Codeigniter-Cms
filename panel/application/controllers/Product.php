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

    public function new_form(){
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function save(){

        //Form verilerinin kontrol edilmesini, girilmesini, doğru mu girildiğini ve aynı verinin girilip
        // girilmediğini kontrol etmek için form-validation kütüphanesini ekliyoruz.
        $this->load->library("form_validation");
        //Kurallar yazılır
        //set_rules içine default 3 kural alır.
        $this->form_validation->set_rules("title", "Başlık","required|trim");
        //set_message içerisine bir array alır.
        $this->form_validation->set_message(
            array(
                //field Başlık alanı kısmını dinamik çekmek için tanımlanmıştır.
                "required" => "<b>{field}</b> alanı boş geçilemez."
            )
        );

        //Form Validation Çalıştırlır. Bu durum true ya da false değer döner.
        $validate = $this->form_validation->run();
        if($validate){

            $insert = $this->product_model->add(
                array(
                    "title"         => $this->input->post("title"),
                    "description"   => $this->input->post("description"),
                    "url"           => convertToSeo($this->input->post("title")),
                    "rank"          => 0,
                    "isActive"      => 1,
                    "createdAt"     =>date("Y-m-d H:i:s")
                )
            );

            if($insert){
                redirect(base_url("product"));
            }else{
                redirect(base_url("product"));
            }

        }else{

            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = "";
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

}