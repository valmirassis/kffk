    <?php
  require_once("verifica.php");
    include ('../conecta.php');
  $cod_usuario = $_SESSION['cod'];
    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ambiente Restrito: ... Kffk Empreendimentos...</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <header>
    <div class="container">
            <!-- <img src="../img/KFFK-empreendimentos.png" class="img-responsive" style="width: 250px;"> -->
    </div>
    <script type="text/javascript">
// Inicialização do KCFinder
function openKCFinder(field) {
    window.KCFinder = {
        callBack: function(url) {
            field.value = url;
            window.KCFinder = null;
        }
    };
    window.open('../kcfinder/browse.php?type=images&dir=files/public', 'kcfinder_textbox',
        'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
        'resizable=1, scrollbars=0, width=800, height=600'
    );
}
</script>
        </header>
    <div class="container">
    <div class="row">
    <div class="col-3">
    <div class="card">
    <div class="card-header bg-warning">
    Administração
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><a href="?empresa">Empresa</a></li>
        <li class="list-group-item"><a href="?empreendimentos">Empreendimentos</a>
            <ul>
                <li><a href="?empreendimentos&listar">Listar</a></li>
                <li><a href="?empreendimentos&cadastrar">Cadastrar</a></li>

                
            </ul>
       </li>

        <li class="list-group-item"><a href="?oportunidades">Oportunidades</a></li>
        <li class="list-group-item"><a href="logoff.php">Sair</a></li>
    </ul>
    </div>
    </div>
    <div class="col-9">
    <div class="card">
    <div class="card-header bg-warning">
    Administração
    </div>
        <div class="card-body">
            <?php
                if(isset($_GET['empresa'])){
                    echo "<h1>Empresa</h1>";  
                    $sql = mysqli_query($link,"SELECT * FROM paginas WHERE cod=1") or die ("Houve erro na gravação dos dados" . mysqli_error());  
                    $dados = mysqli_fetch_array($sql);
                    $empresa = $dados['conteudo'];
                
                    ?>
                    <form action="?empresa" method="post">
                    <textarea class="ckeditor" name="empresa" ><?php echo $empresa ?></textarea>
                    <input type="hidden" value="1" name="cod">
                    <br>
                    <input type="submit" name="salvar" value="Salvar" class="btn btn-warning btn-block">
                </fom>
                <?php
                    if(isset($_POST['salvar'])){
                        $empresa = $_POST['empresa'];
                        $cod = $_POST['cod'];
                        $sql = mysqli_query($link,"UPDATE paginas SET conteudo='$empresa' WHERE cod=$cod") or die ("Houve erro na gravação dos dados" . mysqli_error());
                        if ($sql){
                        echo "<br>Página alterada!";
                        echo "<meta http-equiv='refresh' content='0;URL=home.php?empresa'> ";
                        }
                    }
                } else if (isset($_GET['empreendimentos'])) {
                    echo "<h1>Empreendimentos</h1>";
                    if (isset($_GET['cadastrar'])){
                        ?>
                    <form action="empreendimentos.php" method="post">
                    <input type="text" name="nome" placeholder="Nome" class="form-control input-group2">
                    <input type="text" name="localizacao" placeholder="Localização" class="form-control input-group2">
                     Concluído:  <input type="radio" name="concluido" class="" value="1"> Sim  <input type="radio" name="concluido" class="" value="0"> Não <br>
                     Publicar:  <input type="radio" name="publicar" class="" value="1"> Sim  <input type="radio" name="publicar" class="" value="0"> Não
                   <input type="text" name="status" placeholder="Status" class="form-control input-group2">
                    <textarea class="ckeditor" name="descricao" class="form-control input-group2"></textarea>
                    <input type="hidden" value="1" name="cod">
                    <br>
                    <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-warning btn-block">
                </fom>
                        <?php
                    } if (isset($_GET['editar'])){
                        $sqlv = mysqli_query($link,"SELECT * FROM empreendimento where cod=$_GET['cod']") or die("ERRO NO SQL");
                        $dados = mysqli_fetch_array($sqlv);
                        $nome = $dados['nome'];
                        $localizacao = $dados['localizacao'];
                        $status = $dados['status'];
                        $descricao = $dados['descricao'];
                        $concluido = $dados['concluido'];
                        ?>
                    <form action="empreendimentos.php" method="post">
                    <input type="text" name="nome" placeholder="Nome" value="<?php echo $nome; ?>" class="form-control input-group2">
                    <input type="text" name="localizacao" value="<?php echo $localizacao; ?>"  placeholder="Localização" class="form-control input-group2">
                     Concluído:  <input type="radio" name="concluido" class="" value="1" <?php echo $concluido = 1 ? "checked" : "";?> >Sim  <input type="radio" name="concluido" class="" value="0" <?php echo $concluido = 0 ? "checked" : "";?>> Não <br>
                     Publicar:  <input type="radio" name="publicar" class="" value="1" <?php echo $status = 1 ? "checked" : "";?>> Sim  <input type="radio" name="publicar" class="" value="0" <?php echo $status = 0 ? "checked" : "";?>> Não
                   <input type="text" name="status" placeholder="Status" class="form-control input-group2">
                    <textarea class="ckeditor" name="descricao" class="form-control input-group2"><?php echo $descricao; ?> </textarea>
                    <input type="hidden" value="<?php echo $_GET['cod']; ?>" name="cod">
                    <br>
                    <input type="submit" name="editar" value="Salvar" class="btn btn-warning btn-block">
                </fom>
                        <?php
                    } 
                    
                    else {
                        $sqlv = mysqli_query($link,"SELECT * FROM empreendimento ORDER BY cod DESC") or die("ERRO NO SQL");
                        $rowv = mysqli_num_rows($sqlv);

                    while($rowv = mysqli_fetch_assoc($sqlv)){
                        $cod = $rowv['cod'];
                    $status = $rowv['status'];
                    $concluido = $rowv['concluido'];
                    $publicar = $rowv['publicar'];
                    $nome = $rowv['nome'];
                    $localizacao = $rowv['localizacao'];
echo "<div class='alert alert-dark' role='alert'>   $nome - $localizacao <br>";
echo "Concluido: ".$concluido = 1 ? "Sim" : "Não";
echo " | Publicar: ".$publicar = 1 ? "Sim" : "Não";
echo "<a href='home.php?empreendimentos&editar&cod=$cod'><i class='fas fa-edit'></i></a></div>";
}
                    }
                    
              
                } else if (isset($_GET['oportunidades'])) {
                    echo "<h1>Oportunidades</h1>";
                } else {
                    echo "Selecione um item no menu ao lado";
                }
            ?>
        </div>
    </div>
    </div>
    </div>
    </div>

    <script src="../ckeditor/ckeditor.js"></script>        
<script>
CKEDITOR.editorConfig = function(config) {
 config.filebrowserBrowseUrl = 'kcfinder/browse.php?type=files';
 config.filebrowserImageBrowseUrl = 'kcfinder/browse.php?type=images';
 config.filebrowserFlashBrowseUrl = 'kcfinder/browse.php?type=flash';
 config.filebrowserUploadUrl = 'kcfinder/upload.php?type=files';
 config.filebrowserImageUploadUrl = 'kcfinder/upload.php?type=images';
 config.filebrowserFlashUploadUrl = 'kcfinder/upload.php?type=flash';
};
</script>
    </body>
    </html>
