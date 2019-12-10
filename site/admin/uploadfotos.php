<?php
  require_once("verifica.php");
include ('../conecta.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Ambiente Restrito</title>
</head>
<body>

<h3 class="titulo">Inserir fotos</h3>

<?php

if(isset($_GET['upload'])){
$num    = $_POST['cod'];
$campos = $_POST['campos'];
$cod = $_POST['cod'];

$dir = "fotos/$num/";
//tamanhos para criar as thumbs
$largura_final = 330;
$altura_final  = 240;

@mkdir($dir);

if ($handle = @opendir($dir)) {

while (false !== ($filez = readdir($handle))){

if ($filez != "." && $filez != ".."){

$filez  = substr($filez,0,-4);
//$filez2.="$filez-*-";
}}
$filez2 = substr($filez, 0, -3);
$filez3 = explode("-*-", $filez2);

natsort ($filez3);

$quanti = count($filez3);

$quanti--;

$y = $filez3[$quanti];
$y = substr($y, -2);

closedir($handle);}

$f_name = $_FILES['file']['name'];
$f_tmp  = $_FILES['file']['tmp_name'];
$f_type = $_FILES['file']['type'];

$cont=0;

$p = $y;

$desc = $_POST['desc'];

for($i=0;$i<$campos;$i++){

$name  = $f_name[$i];
$file  = explode(".",$name);
$filec = count($file);
$filec = $filec-1;
$file  = $file[$filec];
$descr = $desc[$i];
$patha = $dir."$num"."$name";
$nome  = "$num"."$name";

if ( ($name!="") and (is_file($f_tmp[$i]))){
        if ($cont==0){
          echo "<b>Arquivo(s) enviados:<br /></b>";
        }

          echo $patha." - ";

          $up = move_uploaded_file($f_tmp[$i], $patha);
          
          //criar thumb a fun��o verifica a extens�o do arquivo e cria a thumb a partir disso
          if(preg_match("/.jpg/i", "$nome")){
          $format = 'image/jpeg';
                }
                if (preg_match("/.gif/i", "$nome")){
          $format = 'image/gif';
                }
                if(preg_match("/.png/i", "$nome")){
          $format = 'image/png';
                }
                if($format!=''){
          $tamanho = getimagesize($dir.$nome);
          $largura_fonte  = $tamanho[0];
          $altura_fonte   = $tamanho[1];

          switch($format){
          case 'image/jpeg':
                  $source = imagecreatefromjpeg($dir.$nome);
                  break;
                  case 'image/gif';
                  $source = imagecreatefromgif($dir.$nome);
                  break;
                  case 'image/png':
                  $source = imagecreatefrompng($dir.$nome);
                  break;
          }
          $nome_thumb    = substr($nome,0,strpos($nome,"."))."_thumb".substr($nome,strpos($nome,"."));
          
          $imagem_destino = imagecreatetruecolor($largura_final,$altura_final);
          imagealphablending($imagem_destino, false);
          imagecopyresized($imagem_destino, $source, 0, 0, 0, 0, $largura_final, $altura_final, $largura_fonte, $altura_fonte);
          @imagejpeg($imagem_destino, $dir.$nome_thumb, 70);
                  imagedestroy($source);
                  imagedestroy($imagem_destino);
          }
          //fim do thumb

                if ($up==true):
                        echo  "<i>Enviado!</i>";
                          $cont++;
                                $qry = mysqli_query($link,"INSERT INTO emp_fotos (`cod`, `cod_emp`,`nome`,`descricao`,`nome_foto`,`nome_thumb`) 
                                VALUES ('', '$cod',' ','$descr','$nome','$nome_thumb')") or die ("Erro no SQL fotos".mysqli_error());

                else:
                        echo "<i>Falhou!</i>";
                endif;

          echo "<br />";
  }
}

echo ($cont!=0) ? "<script>alert(\"Total de arquivos enviados: $cont\");
           location.href=\"empreendimentos.php?imagens&cod=$cod\"</script>": "<script>alert(\"Nenhum arquivo foi enviado!\");
           location.href=\"empreendimentos.php?imagens&cod=$cod\"</script>";
//}

} else if (isset($_GET['excluir'])){
      $cod = $_GET['cod'];
$sql0 = mysqli_query($link,"SELECT * FROM emp_fotos  WHERE `cod`='$cod'") or die ("Erro do Mysql ".mysqli_error());
$row0 = mysqli_num_rows($sql0);
while ($row0 = mysqli_fetch_assoc($sql0)){
$cod0 = $row0['cod'];
$codpt = $row0['cod_emp'];
$foto = "fotos/".$codpt."/".$row0['nome_foto'];
$thumb= "fotos/".$codpt."/".$row0['nome_thumb'];
unlink($foto);
unlink($thumb);}
$sql="DELETE FROM `emp_fotos` WHERE `cod`='$cod'";
$resultado = mysqli_query($link,$sql) or die("Erro ao excluir: " . mysqli_error());
echo "<script>JavaScript:alert('Foto excluida com sucesso!');</script>";
echo "<meta http-equiv='refresh' content='0;URL=empreendimentos.php?imagens&cod=$codpt'> ";
}
?>
</body>
</html>