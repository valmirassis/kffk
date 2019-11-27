<?php
require_once("verifica.php");
include ('conecta.php');
$cod_usuario = $_SESSION['cod'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Ambiente Restrito: ... Kffk Empreendimentos...</title>
<link href="../styles.css" rel="stylesheet" type="text/css" />
<script src="comportamento.js" type="text/javascript"></script>

</head>
<body>
<div id="cadastro_maior" style="width:900px;">

<p class="login">ACESSO RESTRITO  <a class="link" href="logoff.php">Sair</a></p> <br /><br />


<!--| <a class="link" href="#" onclick="getarquivo3('inspecao.php'); return false;">Inspeção</a>-->
<!--| <a class="link" href="#" onclick="getarquivo3('certificado.php'); return false;">Certificados</a>-->






<div id="conteudo2">
    
    
    
<?php
     if (isset($_GET['logs'])) {
      include('logs.php');   
     } else {
    
    echo "<br><br>"; 
     }
    ?>
</div>
<div id="carrega">

</div>

</div>
</body>
</html>
