<?php
    class ModelPolitico extends ClasseBase{
       
        private $foto;
        private $formacao;
        private $facebook;
        private $instagram;
        private $twitter;
        private $youtube;
        private $tiktok;
        private $linkedin;
        private $whatsapp;
        private $email;
        private $site;

        public function __construct($id=0, $nome="", $foto="", $formacao="", $facebook="", $instagram="",$twitter="",$youtube="",$tiktok="",$linkedin="",$whatsapp="",$email="",$site="") {
            $this->set_id($id);
            $this->set_nome($nome);
            $this->set_foto($foto);
            $this->set_formacao($formacao);
            $this->set_facebook($facebook);
            $this->set_instagram($instagram);
            $this->set_twitter($twitter);
            $this->set_youtube($youtube);
            $this->set_tiktok($tiktok);
            $this->set_linkedin($linkedin);
            $this->set_whatsapp($whatsapp);
            $this->set_email($email);
            $this->set_site($site);
        }

        public function set_foto($foto){
            $this->foto = $foto;
        }

        public function get_foto(){
            return $this->foto;
        }

        public function set_formacao($formacao){
            $this->formacao = $formacao;
        }

        public function get_formacao(){
            return $this->formacao;
        }

        public function set_facebook($facebook){
            $this->facebook = $facebook;
        }

        public function get_facebook(){
            return $this->facebook;
        }

        public function set_instagram($instagram){
            $this->instagram = $instagram;
        }

        public function get_instagram(){
            return $this->instagram;
        }

        public function set_twitter($twitter){
            $this->twitter = $twitter;
        }

        public function get_twitter(){
            return $this->twitter;
        }

        public function set_youtube($youtube){
            $this->youtube = $youtube;
        }

        public function get_youtube(){
            return $this->youtube;
        }

        public function set_tiktok($tiktok){
            $this->tiktok = $tiktok;
        }

        public function get_tiktok(){
            return $this->tiktok;
        }

        public function set_linkedin($linkedin){
            $this->linkedin = $linkedin;
        }

        public function get_linkedin(){
            return $this->linkedin;
        }

        public function set_whatsapp($whatsapp){
            $this->whatsapp = $whatsapp;
        }

        public function get_whatsapp(){
            return $this->whatsapp;
        }

        public function set_email($email){
            $this->email = $email;
        }

        public function get_email(){
            return $this->email;
        }

        public function set_site($site){
            $this->site = $site;
        }

        public function get_site(){
            return $this->site;
        }
    }
?>