<?php
    class ModelPolitico extends ClasseBase{     
        private $foto;
        private $formacao;
        private $facebook;
        private $instagram;
        private $twitter;
        private $youtube;
        private $tiktok;
        private $linkdin;
        private $whatsapp;
        private $email;
        private $site;

        public function __construct($id=0, $nome="", $foto="", $formacao="", $facebook="", $instagram="",$twitter="",$youtube="",$tiktok="",$linkdin="",$whatsapp="",$email="",$site="") 
        {
            $this->id = $id;
            $this->nome = $nome;
            $this->foto = $foto;
            $this->formacao = $formacao;
            $this->facebook = $facebook;
            $this->instagram = $instagram;
            $this->twitter = $twitter;
            $this->youtube = $youtube;
            $this->tiktok = $tiktok;
            $this->linkdin = $linkdin;
            $this->whatsapp = $whatsapp;
            $this->email = $email;
            $this->site = $site;
        }​
        
        public function __set($atrib, $value){
            $this->$atrib = $value;
        }

        public function __get($atrib){
            return $this->$atrib;
        }
    }​​

?>