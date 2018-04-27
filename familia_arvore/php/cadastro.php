<html>
<meta charset="UTF-8" lang="br">
<head>
		<link rel="stylesheet" type="text/css" href="../css/estilo.css">
 		<link rel="stylesheet" href="../lib/bootstrap/bootstrap/css/bootstrap.css">              
        <link rel="stylesheet" type="text/css" href="../lib/css/print.css" media="print">        
        <script src="../lib/jquery/jquery-3.3.1.slim.min.js"></script>
        <script src="../lib/bootstrap/bootstrap/js/bootstrap.js"></script>  
<script type="text/javascript">

function preview(fileInput) {
	var files = fileInput.files;
	for (var i = 0; i < files.length; i++) {                
	         var file = files[i];
	         var imageType = /image.*/;     
	         if (!file.type.match(imageType)) {
	                 continue;
	         }              
	         var img=document.getElementById("avatar");             
	         img.file = file;
	         var reader = new FileReader();
	         reader.onload = (function(aImg) {
	                 return function(e) {
	                         aImg.src = e.target.result;
	                 };
	         })(img);
	         reader.readAsDataURL(file);
	}
	}


</script>
<title>Árvore Genealógica !!!!</title>
</head>
<body>

	<form method="post" enctype="multipart/form-data"action="recebeimg.php" >
	 <!--  aqui ele nao executa  -->
		<div class="imagem"><img  alt="Carregue a imagem aqui!!!" id="avatar" /></div>	
		<input type="file" name="arquivo" accept="image/*" value="carregar" id="images" onchange="preview(this)">
		<input type="submit" value="Enviar" id="enviar" onclick="java script:funcao();">
		

	    <div>
		<label for="names">Nome:</label>
		<input type="text" id="names" />
	    </div>
	    
	    <div>
		<label for="nascimento">Local de Nascimento:</label>
		<input type="text" id="nascimento" />
	    </div>
	<div>
		<label for="data">Data de Nascimento:</label>
		<input type="text" id="dtnascimento" />
	    </div>
	<div>
		<label for="pai">Nome do Pai:</label>
		<input type="text" id="pai" />
	    </div>
	<div>
		<label for="mae">Nome da Mãe:</label>
		<input type="text" id="mae" />
	    </div>
	    
	    <div class="button">
		<button type="submit">Gravar</button>
		<button type="reset" id="inserir">Limpar</button>
		<button type="button" id="voltar">Voltar</button>
	    </div>
	</form>
</body>
</html>

<?php 

$uploaddir = '/var/www/arvores_genealogica/php/uploads/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
/*print_r($_FILES);
print_r($_POST);*/
// verifica se foi enviado um arquivo
if ( isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) {
   /* echo 'Você enviou o arquivo: <strong>' . $_FILES[ 'arquivo' ][ 'name' ] . '</strong><br />';
    echo 'Este arquivo é do tipo: <strong > ' . $_FILES[ 'arquivo' ][ 'type' ] . ' </strong ><br />';
    echo 'Temporáriamente foi salvo em: <strong>' . $_FILES[ 'arquivo' ][ 'tmp_name' ] . '</strong><br />';
    echo 'Seu tamanho é: <strong>' . $_FILES[ 'arquivo' ][ 'size' ] . '</strong> Bytes<br /><br />';*/
 
    $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
    $nome = $_FILES[ 'arquivo' ][ 'name' ];
 	
    // Pega a extensão
    $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
 
    // Converte a extensão para minúsculo
    $extensao = strtolower ( $extensao );
 
    // Somente imagens, .jpg;.jpeg;.gif;.png
    // Aqui eu enfileiro as extensões permitidas e separo por ';'
    // Isso serve apenas para eu poder pesquisar dentro desta String
    if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
        // Cria um nome único para esta imagem
        // Evita que duplique as imagens no servidor.
        // Evita nomes com acentos, espaços e caracteres não alfanuméricos
//        $novoNome = uniqid ( time () ) . '.' . $extensao;
         $novoNome = $_FILES[ 'text' ][ 'names' ] . $extensao;
         echo $novoNome."<br />";
        // Concatena a pasta com o nome
        $destino = $uploaddir.$novoNome;
 
        // tenta mover o arquivo para o destino
        if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {            
            $foto = '<div id="avarar"><img src="uploads/' . $novoNome . '" alt="Carregue a imagem aqui!!!" height="30%" /></div>'; 
            echo $foto ;
        }
        else{
            echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
            echo "Tentativa de salvar em:  $destino <br />" ;
            echo "com o nome de $destino <br />";
            
        }
    }
    else
        echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
}
else
    echo ''.'<!--Você não enviou nenhum arquivo!-->';
    
	
	




?>