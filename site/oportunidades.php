<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php  include ('conecta.php'); ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Kffk Oportunidades</title>
<link rel="apple-touch-icon" sizes="57x57" href="img/icon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="img/icon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/icon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="img/icon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/icon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="img/icon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="img/icon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="img/icon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="img/icon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="img/icon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="img/icon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="img/icon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="img/icon/favicon-16x16.png">
<link rel="manifest" href="img/icon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="img/icon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<link rel="stylesheet" href="styles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->

<link href="https://unpkg.com/nanogallery2/dist/css/nanogallery2.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="https://unpkg.com/nanogallery2/dist/jquery.nanogallery2.min.js"></script>
</head>
<body>
  <header>

        <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
                <!-- Brand -->
                <a class="navbar-brand" href="#"><img src="img/KFFK-Empreendimentos.png" width="150px"></a>
              
                <!-- Toggler/collapsibe Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <!-- Navbar links -->
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link anima" href="index.php"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link anima" href="institucional.php"><i class="fas fa-industry"></i> Empresa</a>
                    </li>
        
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="empreendimentos.php" id="navbardrop" data-toggle="dropdown">
                          <i class="fas fa-building"></i> Empreendimentos
                        </a>
                        <div class="dropdown-menu">
                          <a class="dropdown-item anima" href="empreendimentos.php?empreendimentos-novos">Novos </a>
                          <a class="dropdown-item anima" href="empreendimentos.php?empreendimentos-concluidos">Concluidos </a>
            
                        </div>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link anima" href="oportunidades.php"><i class="fas fa-archive"></i> Oportunidades</a>
                      </li>             
                        <li class="nav-item">
                                <a class="nav-link anima" href="#contato"><i class="fas fa-envelope"></i> Contato</a>
                        </li>    
                  </ul>
                </div>
              </nav> 
         
            </header>
              
                <div id="carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-target="#carousel" data-slide-to="0" class="active"></li>
                          <li data-target="#carousel" data-slide-to="1"></li>
                          <li data-target="#carousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img class="d-block w-100" src="img/kffk-empreendimentos-01.jpg" alt="Primeiro Slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="img/kffk-empreendimentos-02.jpg" alt="Segundo Slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="img/kffk-empreendimentos-03.jpg" alt="Terceiro Slide">
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Próximo</span>
                        </a>
                      </div>

<section>
<div class="container content">
  <div class="row"> <div class="col">
    <h1><i class="fas fa-building"></i> Nossas Oportunidades</h1>
  </div>
</div>
<div class="row">
                  <div class="col">
                 
                 <?php 
                
                 $sql = mysqli_query($link,"SELECT * FROM oportunidade WHERE publicar=1 ORDER BY cod DESC LIMIT 0,5") or die ("Houve erro na seleção dos dados" . mysqli_error());
              $row = mysqli_num_rows($sql);
                 if($row == 0) {
                   echo "Não temos nenhuma oportunidade no momento.";
                 } else {
              while($row = mysqli_fetch_assoc($sql)){
              $cod_oport = $row['cod'];
              $descricao = $row['descricao'];              
              $nome = $row['nome'];
              $localizacao = $row['localizacao'];

              echo "<div class='empreendimento'><h3>".$nome." - ".$localizacao."</h3>";
              
                echo "$descricao";
  
            
              $sqlf = mysqli_query($link,"SELECT * FROM oport_fotos WHERE cod_oport=$cod_oport ORDER BY cod DESC") or die ("Houve erro na gravação dos dados" . mysqli_error());  
              $rowf = mysqli_num_rows($sqlf);
                
                ?>
      <div ID="ngy2<?php echo $cod_oport ?>" data-nanogallery2='{
        "itemsBaseURL": "",
        "thumbnailWidth": "200",
        "thumbnailDisplayTransition": "slideUp2",
        "thumbnailLabel": {
          "position": "overImageOnTop",
          "align": "left",
          "titleMultiLine": true,
          "descriptionMultiLine": true
        },
        "allowHTMLinData": true,
        "thumbnailHoverEffect2": "image_blur_0px_5px_1000|label_translateX_1_1_1000|label_font-size_1em_2em_2000",
        "thumbnailAlignment": "center",
        "galleryFilterTags": true,
        "thumbnailLevelUp": true
      }'>

    
                <?php
              while($rowf = mysqli_fetch_assoc($sqlf)){
                $nome_foto = $rowf['nome_foto'];
                $titulo= $rowf['titulo'];
                $nome_thumb = $rowf['nome_thumb'];
                $descricao_foto = $rowf['descricao'];
                echo "<a href='admin/fotos/oportunidades/$cod_oport/$nome_foto' data-ngthumb='admin/fotos/oportunidades/$cod_oport/$nome_thumb' data-ngdesc='$descricao_foto'>$titulo</a>";
              
              }
              $sqlv = mysqli_query($link,"SELECT * FROM oport_videos WHERE cod_oport=$cod_oport ORDER BY cod DESC") or die ("Houve erro na gravação dos dados" . mysqli_error());  
              $rowv = mysqli_num_rows($sqlv);
               
              while($rowv = mysqli_fetch_assoc($sqlv)){
                $nome_video = $rowv['nome'];
                $id_youtube = $rowv['id_youtube'];
                $descricao_video = $rowv['descricao'];
                echo "<a href='https://www.youtube.com/watch?v=$id_youtube' data-ngthumb='https://www.youtube.com/watch?v=$id_youtube' data-ngdesc='$descricao_video'>$nome_video</a>";
             
              }
              echo "</div></div>";
              }
            }
            ?>
                 </div>
              
          </div>
</div>
</section>


<section id="contato">
  <div class="container">
      <div class="row">
        <div class="col">
       
              <h1><i class="fa fa-envelope" aria-hidden="true" aria-hidden="true"></i> Entre em Contato</h1>
            <form action="" onsubmit="return enviar_contato(this); return false;" method="POST" name="frmcontato" id="formcontato">
              </div>
            </div>     
              <div class="row">
                  <div class="col-sm">
                      <div class="input-group input-group2">
                          <div class="input-group-prepend">
                            <div class="input-group-text" id="btnGroupAddon"><i class="fa fa-user" aria-hidden="true"></i></div>
                          </div>
                          <input type="text" class="form-control" placeholder="Informe seu Nome" aria-label="Informe seu Nome" aria-describedby="btnGroupAddon" name="inputNome">
                        </div>
                        <div class="input-group input-group2">
                            <div class="input-group-prepend">
                              <div class="input-group-text" id="btnGroupAddon"><i class="fa fa-at" aria-hidden="true"></i></span></div>
                            </div>
                            <input type="text" class="form-control" placeholder="Informe seu Email" aria-label="Informe seu Email" aria-describedby="btnGroupAddon" name="inputEmail">
                          </div>
                          <div class="input-group input-group2">
                              <div class="input-group-prepend">
                                <div class="input-group-text" id="btnGroupAddon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                              </div>
                              <input type="text" class="form-control" placeholder="Informe seu Telefone" aria-label="Informe seu Telefone" aria-describedby="btnGroupAddon" name="inputTel">
                            </div>
                            <div class="input-group input-group2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text" id="btnGroupAddon"><i class="fa fa-tag" aria-hidden="true"></i></div>
                                </div>
                                <input type="text" class="form-control" placeholder="Informe o Assunto" aria-label="Informe o Assunto" aria-describedby="btnGroupAddon" name="inputAssunto">
                              </div>
                      </div>

                      
                
                  <div class="col-sm">

                      <div class="input-group input-group2">
                          <div class="input-group-prepend">
                            <div class="input-group-text" id="btnGroupAddon"><i class="fa fa-tag" aria-hidden="true"></i></div>
                          </div>
                          <textarea class="form-control textarea" placeholder="Mensagem" required name="inputMensagem"></textarea>
                        </div>
  
                      <div class="input-group input-group2">
                      <button type="submit" class="btn btn-warning btn-block"><i class="fa fa-send" aria-hidden="true"></i> Enviar E-mail</button>
                      </div>
                  </div>
              </div>
            
              </form>
               
                  <div class="row">
                   <div class="col" id="result">
                  
                  </div>
                   </div>
              
          </div>
      
  
    
  
  </section>
<footer>
  <?php
include('footer.html');
  ?>
  
</footer>
<script src="main.js"></script>
</body>

</html>
