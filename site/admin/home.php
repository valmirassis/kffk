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
        <li class="list-group-item"><a href="home.php?empresa">Empresa</a></li>
        <li class="list-group-item"><a href="home.php?empreendimentos">Empreendimentos</a>
            <ul>
                <li><a href="home.php?empreendimentos&listar">Listar</a></li>
                <li><a href="home.php?empreendimentos&cadastrar">Cadastrar</a></li>

                
            </ul>
       </li>

       <li class="list-group-item"><a href="home.php?oportunidades">Oportunidades</a>
        <ul>
                <li><a href="home.php?oportunidades&listar">Listar</a></li>
                <li><a href="home.php?oportunidades&cadastrar">Cadastrar</a></li>                
            </ul>
    </li>
        <li class="list-group-item"><a href="logoff.php">Sair</a></li>
    </ul>
    </div>
    </div>
    <div class="col-9">
    <div class="card">
    <div class="card-header bg-warning">
        Gerenciar
  <?php 
  echo (isset($_GET['empreendimentos'])) ? "<b>Empreendimentos</b>" : '';
  echo (isset($_GET['oportunidades'])) ? "<b>Oportunidades</b>" : '';

  ?>
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
                } else if (isset($_GET['empreendimentos'])) { //Página empreendimentos
                    echo "<h1>Empreendimentos</h1>";
                    if (isset($_GET['cadastrar'])){ // formulário de cadastro de empreendimentos
                        ?>
                    <form action="empreendimentos.php" method="post">
                     Nome: <input type="text" name="nome" placeholder="Nome" class="form-control input-group2">
                     Localização: <input type="text" name="localizacao" placeholder="Localização" class="form-control input-group2">
                     Concluído:  <input type="radio" name="concluido" class="" value="1"> Sim  <input type="radio" name="concluido" class="" value="0"> Não <br>
                     Publicar:  <input type="radio" name="publicar" class="" value="1"> Sim  <input type="radio" name="publicar" class="" value="0"> Não
                   <input type="text" name="status" placeholder="Status" class="form-control input-group2">
                    Detalhes: <textarea class="ckeditor" name="descricao" class="form-control input-group2"></textarea>
                    <input type="hidden" value="1" name="cod">
                    <br>
                    <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-warning btn-block">
                </form>
                        <?php
                    } if (isset($_GET['editar'])){ // formulário de edição de empreendimentos
                        $cod = $_GET['cod'];
                        $sqlv = mysqli_query($link,"SELECT * FROM empreendimento where cod='$cod'") or die("ERRO NO SQL");
                        $dados = mysqli_fetch_array($sqlv);
                        $nome = $dados['nome'];
                        $localizacao = $dados['localizacao'];
                        $status = $dados['status'];
                        $publicar = $dados['publicar'];
                        $descricao = $dados['descricao'];
                        $concluido = $dados['concluido'];
                        ?>
                    <form action="empreendimentos.php" method="post">
                    Nome: 
                    <input type="text" name="nome" placeholder="Nome" value="<?php echo $nome; ?>" class="form-control input-group2">
                    Localização:
                    <input type="text" name="localizacao" value="<?php echo $localizacao; ?>"  placeholder="Localização" class="form-control input-group2">
                     Concluído:  <input type="radio" name="concluido" class="" value="1" <?php echo $concluido == 1 ? "checked" : "";?> >Sim  <input type="radio" name="concluido" class="" value="0" <?php echo $concluido == 0 ? "checked" : "";?>> Não <br>
                     Publicar:  <input type="radio" name="publicar" class="" value="1" <?php echo $publicar == 1 ? "checked" : "";?>> Sim  <input type="radio" name="publicar" class="" value="0" <?php echo $publicar == 0 ? "checked" : "";?>> Não
                 <br>  Status: <input type="text" name="status" placeholder="Status" class="form-control input-group2" value="<?php echo $status; ?>" >
                   Detalhes:
                    <textarea class="ckeditor" name="descricao" class="form-control input-group2"><?php echo $descricao; ?> </textarea>
                    <input type="hidden" value="<?php echo $_GET['cod']; ?>" name="cod">
                    <br>
                    <input type="submit" name="editar" value="Salvar" class="btn btn-warning btn-block">
                </form>
                        <?php
                    } 
                    
                    else { // Listar empreendimentos cadastrados
                        $sqlv = mysqli_query($link,"SELECT * FROM empreendimento ORDER BY cod DESC") or die("ERRO NO SQL");
                        $rowv = mysqli_num_rows($sqlv);

                    while($rowv = mysqli_fetch_assoc($sqlv)){
                        $cod = $rowv['cod'];
                    $status = $rowv['status'];
                    $concluido = $rowv['concluido'] == '1' ? "Sim" : "Não";
                    $publicar = $rowv['publicar'] == '1' ? "Sim" : "Não";
                    $nome = $rowv['nome'];
                    $localizacao = $rowv['localizacao'];
echo "<div class='alert alert-dark destaque' role='alert'> 
        <div>  $nome - $localizacao <br>";
echo "Concluido: ".$concluido;
echo " | Publicar: ".$publicar; 
echo "</div><div>";
echo "<a href='home.php?empreendimentos&editar&cod=$cod'><i class='fas fa-edit'></i></a>
<a href='empreendimentos.php?imagens&cod=$cod'><i class='fas fa-image'></i></a>
<a href='empreendimentos.php?videos&cod=$cod''><i class='fab fa-youtube'></i></a>


</div></div>";
}
                    }
                    
            //   ##########################################################################################################################
                } else if (isset($_GET['oportunidades']))  { //Página oportunidades
                    echo "<h1>Oportunidades</h1>";
                    if (isset($_GET['cadastrar'])){ // formulário de cadastro de oportunidades
                        ?>
                    <form action="oportunidades.php" method="post">
                     Nome: <input type="text" name="nome" placeholder="Nome" class="form-control input-group2">
                     Localização: <input type="text" name="localizacao" placeholder="Localização" class="form-control input-group2">
                     Publicar:  <input type="radio" name="publicar" class="" value="1"> Sim  <input type="radio" name="publicar" class="" value="0"> Não
                   <br>  Detalhes: <textarea class="ckeditor" name="descricao" class="form-control input-group2"></textarea>
                  
                    <br>
                    <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-warning btn-block">
                </form>
                        <?php
                    } if (isset($_GET['editar'])){ // formulário de edição de oportunidades
                        $cod = $_GET['cod'];
                        $sqlv = mysqli_query($link,"SELECT * FROM oportunidade where cod='$cod'") or die("ERRO NO SQL");
                        $dados = mysqli_fetch_array($sqlv);
                        $nome = $dados['nome'];
                        $localizacao = $dados['localizacao'];
                        $publicar = $dados['publicar'];
                        $descricao = $dados['descricao'];
                        ?>
                    <form action="oportunidades.php" method="post">
                    Nome: 
                    <input type="text" name="nome" placeholder="Nome" value="<?php echo $nome; ?>" class="form-control input-group2">
                    Localização:
                    <input type="text" name="localizacao" value="<?php echo $localizacao; ?>"  placeholder="Localização" class="form-control input-group2">
                     Publicar:  <input type="radio" name="publicar" class="" value="1" <?php echo $publicar == 1 ? "checked" : "";?>> Sim  <input type="radio" name="publicar" class="" value="0" <?php echo $publicar == 0 ? "checked" : "";?>> Não
                <br>
                   Detalhes:
                    <textarea class="ckeditor" name="descricao" class="form-control input-group2"><?php echo $descricao; ?> </textarea>
                    <input type="hidden" value="<?php echo $_GET['cod']; ?>" name="cod">
                    <br>
                    <input type="submit" name="editar" value="Salvar" class="btn btn-warning btn-block">
                </form>
                        <?php
                    } 
                    
                    else { // Listar empreendimentos cadastrados
                        $sqlv = mysqli_query($link,"SELECT * FROM oportunidade ORDER BY cod DESC") or die("ERRO NO SQL");
                        $rowv = mysqli_num_rows($sqlv);
                        if ($rowv == 0) {
                            echo "Não há oportunidades cadastradas";
                        }
                    while($rowv = mysqli_fetch_assoc($sqlv)){
                        $cod = $rowv['cod'];                                   
                    $publicar = $rowv['publicar'] == '1' ? "Sim" : "Não";
                    $nome = $rowv['nome'];
                    $localizacao = $rowv['localizacao'];
echo "<div class='alert alert-dark destaque' role='alert'> 
        <div>  $nome - $localizacao <br>";
echo "  Publicar: ".$publicar; 
echo "</div><div>";
echo "<a href='home.php?oportunidades&editar&cod=$cod'><i class='fas fa-edit'></i></a>
<a href='oportunidades.php?imagens&cod=$cod'><i class='fas fa-image'></i></a>
<a href='oportunidades.php?videos&cod=$cod''><i class='fab fa-youtube'></i></a>


</div></div>";
}
                    }
                    
              
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
