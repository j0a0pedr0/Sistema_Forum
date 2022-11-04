<?php 
    namespace controller;


    class forumController
    {
        private $forumModel;

        public function __construct(){
            $this->forumModel = new \Models\forumModel;
        }

        public function home(){
            $this->forumModel->cadastrarForum();
            $this->forumModel->listarForum();
        }

        public function topicos($idForum){
            $this->forumModel->cadastrarTopicos();
            $this->forumModel->verificarForum($idForum);
            $this->forumModel->listarTopicos($idForum);
        }
        public function postsingle($arr){
            $this->forumModel->responderPosts();
            $this->forumModel->verificarPosts($arr);
            $this->forumModel->listarPosts($arr);
        }
    }

?>