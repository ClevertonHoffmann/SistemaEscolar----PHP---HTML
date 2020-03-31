<!DOCTYPE html>
<html lang="pt">
 
<?php 
    include 'Persistencia/PersistenciaEstudante.php';
?>
<head>
<p><h1 style="text-align:center;"> GERENCIAMENTO ESCOLAR </h1></p>
   <title> GERENCIAMENTO ESCOLAR </title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
		<br>
                <div>
                <button onclick="location.href='EscolaView.php'" type="button" class="btn btn-primary btn-block">Cadastro Escola</button>
                <button onclick="location.href='EstudanteView.php'" type="button" class="btn btn-primary btn-block">Cadastro Estudantes</button>
                <button onclick="location.href='DisciplinaView.php'" type="button" class="btn btn-primary btn-block">Cadastro Disciplina</button>
                <button onclick="location.href='AlunoDisciplinaView.php'" type="button" class="btn btn-primary btn-block">Cadastro Estudante Disciplina</button>
                </div>
</body>

</html>

