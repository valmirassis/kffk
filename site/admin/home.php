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
        <li class="list-group-item"><a href="?empreendimentos">Empreendimentos</a></li>
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
