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
    }
}

    ?>