<?php
session_start();
if(!isset($_SESSION['nome'])){
	header('location: index.php');
}

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<title>Chat-Simples</title>
	<script type="text/javascript">
		function ajax(){
			var req = new XMLHttpRequest();
			req.onreadystatechange = function(){
				if (req.readyState == 4 && req.status == 200) {
						document.getElementById('chat').innerHTML = req.responseText;
				}
			}
			req.open('GET', 'chat.php', true);
			req.send();
		}
	
		setInterval(function(){ajax();}, 1000);

 
	</script>
	<style>
	#chart{
 overflow:auto; 
 width: 350;
 height: 150;
}
	</style>

  </head>

<body onload="ajax();" class="bg-dark">
	<div class="container mt-5 ">
<div class="col-md-5 m-auto shadow-lg p-3 mb-5 bg-white rounded">
	<a href="logout.php" class="btn btn-danger">Sair</a>
	<div id="chart" >

			<div id="chat" class="p-2 shadow-sm p-3 mb-5 bg-white rounded"   style=" background:#fff;overflow-y: scroll; height:250px;  scroll-behavior: smooth; ">

				
			</div>

	</div>

	<form method="post" action="">
	<div class="form-group">
		<input type="text" name="nome" placeholder="Insere o seu nome: " class="form-control" value="<?php echo $_SESSION['nome']?>" style="display: none;">
	</div>
	<div class="form-group"> 
		<textarea name="mensagem" placeholder="mensagem" class="form-control"></textarea>
	</div>
	<div class="form-group">
	<input type="submit" class="btn btn-block btn-primary" value="Enviar">
	</div>
</div>
		
	</form>
	</div>
	<?php
		include("bd_conect.php");
		$nome = $_POST['nome'];
		if(isset($_POST['mensagem']) and $_POST['mensagem']!="")
		{
			$mensagem = $_POST['mensagem'];
		}
		$sql = $pdo->query("INSERT INTO cha1 SET nome= '$nome', mensagem= '$mensagem'");


	?>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>