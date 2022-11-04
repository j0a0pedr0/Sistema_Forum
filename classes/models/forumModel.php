<?php
    namespace Models;

    class forumModel
    {

        public function listarForum(){
            $listarForuns = \Mysql::conectar()->prepare("SELECT * FROM `tb_foruns`");
            $listarForuns->execute();
            $foruns = $listarForuns->fetchAll();
            include('classes/views/homeForum.php');
        }
        public function cadastrarForum(){
            if(isset($_POST['cadastrar_forum'])){
                $titulo_forum = $_POST['titulo_forum'];
                $sql = \Mysql::conectar()->prepare("INSERT INTO `tb_foruns` VALUES (null,?)");
                $sql->execute(array($titulo_forum));
                echo '<script>alert("forum cadastrado com sucesso");</script>';
            }
        }
        public function verificarForum($idForum){
            $sql = \Mysql::conectar()->prepare("SELECT id FROM `tb_foruns` WHERE id = ?");
            $sql->execute(array($idForum));
            if($sql->rowCount() == 1){
                
            }else{
                die('O forum não existe :(');
            }
        }


        public function listarTopicos($idForum){
            $forumNome = \Mysql::conectar()->prepare("SELECT * FROM `tb_foruns` WHERE id =?");
            $forumNome->execute(array($idForum));
            $forumInfo = $forumNome->fetch();

            $listarTopicos = \Mysql::conectar()->prepare("SELECT * FROM `tb_forum.topicos` WHERE forum_id=?");
            $listarTopicos->execute(array($idForum));
            $topicos = $listarTopicos->fetchAll();
            include('classes/views/topicosForum.php');
        }

        public function cadastrarTopicos(){
            if(isset($_POST['cadastrar_topico'])){
                $titulo_topico = $_POST['titulo_topico'];
                $forum_id = $_POST['forum_id'];
                $cadastrarTopicos = \Mysql::conectar()->prepare("INSERT INTO `tb_forum.topicos` VALUES (null,?,?)");
                $cadastrarTopicos->execute(array($forum_id,$titulo_topico));
                echo '<script>alert("Topico cadastrado com sucesso");</script>';
            }
        }


        public function responderPosts(){
            if(isset($_POST['responder_post'])){
                $nomePost = $_POST['nome_post'];
                $mensagemPost = $_POST['mensagem_post'];
                $topicoId = $_POST['topico_id'];
                $sql = \Mysql::conectar()->prepare("INSERT INTO `tb_forum.posts` VALUES (null,?,?,?)");
                $sql->execute(array($topicoId,$nomePost,$mensagemPost));
                echo '<script>alert("post Respondido com sucesso");</script>';
            }
        }

        public function verificarPosts($arr){

            $verifica = \Mysql::conectar()->prepare("SELECT id FROM `tb_forum.topicos` WHERE id =?");
            $verifica->execute(array($arr['2']));
            if($verifica->rowCount() == 1){
                
            }else{
                die('Não Existe esse Post!!');
            }
        }

        public function listarPosts($arr){
            $postInfo = \Mysql::conectar()->prepare("SELECT * FROM `tb_forum.topicos` WHERE id = ?");
            $postInfo->execute(array($arr[2]));
            $postInfo = $postInfo->fetchAll();

            $nomeForum = \Mysql::conectar()->prepare("SELECT nome FROM `tb_foruns` WHERE id = ?");
            $nomeForum->execute(array($postInfo[0]['forum_id']));
            $nomeForum = $nomeForum->fetch()['nome'];

            $pegarPosts = \Mysql::conectar()->prepare("SELECT * FROM `tb_forum.posts` WHERE topico_id = ?");
            $pegarPosts->execute(array($arr[2]));
            $pegarPosts = $pegarPosts->fetchAll();
            include('classes/views/postsForum.php');
        }
    }

?>