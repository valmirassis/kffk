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
                <li><a href="home.php?empreendimentos&listar">Listar</a></li>
                <li><a href="home.php?empreendimentos&cadastrar">Cadastrar</a></li>

                
            </ul>
       </li>

        <li class="list-group-item"><a href="home.php?oportunidades">Oportunidades</a></li>
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
  require_once("verifica.php");
    include ('../conecta.php');
  $cod_usuario = $_SESSION['cod'];
    
if (isset($_POST['cadastrar'])){
    $nome = $_POST['nome'];
    $localizacao = $_POST['localizacao'];
    $descricao = $_POST['descricao'];
    $status = $_POST['status'];
    $concluido = $_POST['concluido'];
    $publicar = $_POST['publicar'];
    date_default_timezone_set('America/Sao_Paulo');
    $log = date('d/m/Y H:i:s', time());
    $sql = mysqli_query($link,"INSERT INTO empreendimento(`cod`, `nome`, `localizacao`,`descricao`,`status`,`publicar`, `concluido`, `log`) VALUES 
    ('','$nome','$localizacao','$descricao','$status', '$publicar', '$concluido', '$log')") or die ("Houve erro na gravação dos dados" . mysqli_error()); 

    if($sql) {
        echo "<script>alert('Empreendimento cadastrado com sucesso');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=home.php?empreendimentos&listar'> ";  
    } else {
      echo "<script>alert('Ocorreu algum erro. Tente novamente!');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=home.php?empreendimentos&listar'> "; 
    }
} else if (isset($_POST['editar'])){
  $cod = $_POST['cod'];
  $nome = $_POST['nome'];
  $localizacao = $_POST['localizacao'];
  $descricao = $_POST['descricao'];
  $status = $_POST['status'];
  $concluido = $_POST['concluido'];
  $publicar = $_POST['publicar'];
  date_default_timezone_set('America/Sao_Paulo');
  $log = date('d/m/Y H:i:s', time());
  $sql = mysqli_query($link,"UPDATE empreendimento SET nome='$nome', localizacao='$localizacao', descricao='$descricao', concluido=$concluido, publicar=$publicar WHERE cod=$cod ") or die ("Houve erro na gravação dos dados" . mysqli_error()); 

if($sql) {
  echo "<script>alert('Empreendimento alterado com sucesso');</script>";
  echo "<meta http-equiv='refresh' content='0;URL=home.php?empreendimentos&listar'> ";  
} else {
echo "<script>alert('Ocorreu algum erro. Tente novamente!');</script>";
  echo "<meta http-equiv='refresh' content='0;URL=home.php?empreendimentos&listar'> "; 
}

} else if (isset($_GET['imagens'])){
  echo "<h2> Fotos cadastradas</h2>";
  $cod = $_GET['cod'];
  $sql = mysqli_query($link,"SELECT * FROM emp_fotos WHERE cod_emp=$cod") or die("ERRO NO SQL".mysqli_error());
$row = mysqli_num_rows($sql);
if ($row == 0) {
echo "Não há fotos cadastradas para este empreendimento";
} else {
while($row = mysqli_fetch_assoc($sql)){
?>
<a href="fotos/<?php echo $cod.'/'.$row['nome_foto']; ?>" target="_blank">
<img src="fotos/<?php echo $cod.'/'.$row['nome_thumb']; ?>" alt=" <?php echo $row['descricao']; ?>"  class="link" width="140"/></a>
<a class="link"  href="uploadfotos.php?excluir&cod=<?php echo $row['cod']; ?>"><i class="fas fa-trash-alt"></i></a>


<?php
}
}
?>

<h3 class="titulo">Inserir foto</h3>

<form method="post" action="uploadfotos.php?upload" enctype="multipart/form-data">
	<input type="hidden" name="cod" value="<?php echo $cod; ?>"/>
     <input type="hidden" name="campos" value="0" id="campos" />
          <div id="eventDates"></div>

         [ <a href="#" class="link" onClick="addEvent();">Adicionar campos</a> ] <br /> 
         <input type="submit"  value="Cadastrar" name="cadastrar" class="btn btn-warning btn-block"> <br />
          
  </form>


<?php
// ####################################################   VÍDEOS ########################################################
} else if (isset($_GET['videos'])){ // mostrar vídeos cadastrados
  echo "<h2> Vídeos cadastrados</h2>";
  $cod = $_GET['cod'];
  $sql = mysqli_query($link,"SELECT * FROM emp_videos WHERE cod_emp=$cod") or die("ERRO NO SQL".mysqli_error());
  $row = mysqli_num_rows($sql);
  if ($row == 0) {
  echo "Não há vídeos cadastrados para este empreendimento";
  } else {
  while($row = mysqli_fetch_assoc($sql)){
    $cod_video = $row['cod'];
  $titulo = $row['nome'];
  $descricao = $row['descricao'];
  $id_youtube = $row['id_youtube'];
  echo "<div class='alert alert-dark destaque' role='alert'> 
        <div><b> $titulo</b>  <br>";
echo "Descricao: $descricao <br>";
echo "<iframe width='560' height='315' src='https://www.youtube.com/embed/$id_youtube' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
echo "</div><div>";
echo "<a href='empreendimentos.php?editar_video&cod_video=$cod_video'><i class='fas fa-edit'></i></a>
<a href='empreendimentos.php?excluir_video&cod_video=$cod_video'><i class='fas fa-trash-alt'></i></a>


</div></div>";

   }

 
  }
?>
<hr>
<!-- Formulário para cadastro de vídeo -->
<h2> Cadastrar vídeo</h2>
 <form action="empreendimentos.php" method="post">
  Título:
                    <input type="text" name="nome" placeholder="Título do vídeo " class="form-control input-group2">
         Id do vídeo:           <input type="text" name="id_youtube" placeholder="Id do vídeo no Youtube " class="form-control input-group2">
          
                
                   Descrição: <textarea name="descricao" class="form-control input-group2"></textarea>
                    <input type="hidden" value="<?php echo $cod ?>" name="cod">
                    <br>
                    <input type="submit" name="cadastrarVideo" value="Cadastrar" class="btn btn-warning btn-block">
                </form>
  <?php
} else if (isset($_POST['cadastrarVideo'])){ // Cadastrar novo vídeo
  $nome = $_POST['nome'];
  $cod_emp = $_POST['cod'];
  $descricao = $_POST['descricao'];
  $id_youtube = $_POST['id_youtube'];

  $sql = mysqli_query($link,"INSERT INTO emp_videos (`cod`, `cod_emp`,`nome`, `descricao`,`id_youtube`) VALUES 
  ('','$cod_emp','$nome','$descricao','$id_youtube')") or die ("Houve erro na gravação dos dados" . mysqli_error()); 

  if($sql) {
      echo "<script>alert('Vídeo cadastrado com sucesso');</script>";
      echo "<meta http-equiv='refresh' content='0;URL=empreendimentos.php?videos&cod=$cod_emp'> ";  
  } else {
    echo "<script>alert('Ocorreu algum erro. Tente novamente!');</script>";
      echo "<meta http-equiv='refresh' content='0;URL=empreendimentos.php?videos&cod=$cod_emp'> "; 
  }
} else if (isset($_POST['editarVideo'])){ //Editar vídeo no banco
  $nome = $_POST['nome'];
  $cod = $_POST['cod'];
  $descricao = $_POST['descricao'];
  $id_youtube = $_POST['id_youtube'];

  $sql2 = mysqli_query($link,"SELECT * FROM emp_videos WHERE cod=$cod") or die ("Houve erro na gravação dos dados" . mysqli_error());  
  $dados = mysqli_fetch_array($sql2);
  $cod_emp = $dados['cod_emp'];

$sql = mysqli_query($link,"UPDATE emp_videos SET nome='$nome', descricao='$descricao', id_youtube='$id_youtube' WHERE cod='$cod' ") or die ("Houve erro na gravação dos dados" . mysqli_error()); 

if($sql) {
echo "<script>alert('Vídeo alterado com sucesso');</script>";
echo "<meta http-equiv='refresh' content='0;URL=empreendimentos.php?videos&cod=$cod_emp'> ";  
} else {
echo "<script>alert('Ocorreu algum erro. Tente novamente!');</script>";
echo "<meta http-equiv='refresh' content='0;URL=empreendimentos.php?videos&cod=$cod_emp'> "; 
}

} else if (isset($_GET['editar_video'])){ //Formulário para edição de vídeo
  $cod_video = $_GET['cod_video'];
  $sql = mysqli_query($link,"SELECT * FROM emp_videos WHERE cod=$cod_video") or die ("Houve erro na gravação dos dados" . mysqli_error());  
                    $dados = mysqli_fetch_array($sql);
                    $nome = $dados['nome'];
                    $descricao = $dados['descricao'];
                    $id_youtube = $dados['id_youtube'];
  ?>

<!-- Formulário para edição de vídeo -->
<h2> Editar vídeo</h2>
 <form action="empreendimentos.php" method="post">
  Título:
                    <input type="text" name="nome" placeholder="Título do vídeo " class="form-control input-group2" value="<?php echo $nome ?>">
         Id do vídeo:           <input type="text" name="id_youtube" placeholder="Id do vídeo no Youtube " class="form-control input-group2" value="<?php echo $id_youtube ?>">
          
                
                   Descrição: <textarea name="descricao" class="form-control input-group2"><?php echo $descricao ?></textarea>
                    <input type="hidden" value="<?php echo $cod_video ?>" name="cod">
                    <br>
                    <input type="submit" name="editarVideo" value="Salvar" class="btn btn-warning btn-block">
                </form>
  <?php
} else if (isset($_GET['excluir_video'])){ // Excluir vídeo
  $cod_video = $_GET['cod_video'];
  $sql = mysqli_query($link,"SELECT * FROM emp_videos WHERE cod=$cod_video") or die ("Houve erro na gravação dos dados" . mysqli_error());  
                    $dados = mysqli_fetch_array($sql);
                    $cod_emp = $dados['cod_emp'];
  $sql="DELETE FROM `emp_videos` WHERE `cod`='$cod_video'";
  $resultado = mysqli_query($link,$sql) or die("Erro ao excluir: " . mysqli_error());
  echo "<script>JavaScript:alert('Vídeo excluido com sucesso!');</script>";
  echo "<meta http-equiv='refresh' content='0;URL=empreendimentos.php?videos&cod=$cod_emp'> ";


}
    ?>

<script type="text/javascript">
var mainDivName = 'eventDates';

function addEvent(){
var ni = document.getElementById(mainDivName);

var numi = document.getElementById('campos');
var num = (document.getElementById("campos").value -1)+ 2;
numi.value = num;

var divIdName = "eventDate"+num+"Div";
var newdiv = document.createElement('div');
newdiv.setAttribute("id",divIdName);
newdiv.innerHTML = "<a href=\"#\" onclick=\"removeEvent(\'"+divIdName+"\')\">&nbsp;[x]</a> <label >Descri&ccedil;&atilde;o:</label><input class=\"form-control\" type=\"text\" name=\"desc[]\" size=\"38\"><br><label>Imagem:</label><input class=\"form-control\" type=\"file\" name=\"file[]\" size=\"44\"> <hr>";


ni.appendChild(newdiv);
}

function removeEvent(divNum){
var d = document.getElementById(mainDivName);
var olddiv = document.getElementById(divNum);
d.removeChild(olddiv);
}
</script>
 </div>
    </div>
    </div>
    </div>
    </div>

    </body>