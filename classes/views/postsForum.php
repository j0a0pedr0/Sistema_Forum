
<h2>Você está em <a href="<?php echo INCLUDE_PATH; ?>">Fórum</a> > <a href="<?php echo INCLUDE_PATH; ?><?php echo $arr[1]; ?>"><?php echo $nomeForum; ?> > </a><u><?php echo $postInfo[0]['nome']; ?></u></h2>

<h3>Visualizando os Posts do topico: <?php echo $postInfo[0]['nome']; ?></h3>

    <?php foreach($pegarPosts as $key => $value){ ?>
        <div style="background-color: #ccc;border-radius:18px;padding:5px 14px;margin-bottom:20px;">
            <h3><?php echo $value['nome']; ?></h3>
            <p><?php echo $value['mensagem']; ?></p>
        </div>
    <?php } ?>


<h4>Responder esse Post</h4>
<form method="POST">
    <input type="text" name="nome_post">
    <textarea name="mensagem_post" placeholder="Sua resposta..."></textarea>
    <input type="hidden" name="topico_id" value="<?php echo $arr[2]; ?>">
    <input type="submit" name="responder_post" value="Cadastrar!">
</form>