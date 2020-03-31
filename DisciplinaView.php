<!DOCTYPE html>
<html lang="pt">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<head>
    <meta charset="utf-8">
</head>
<body style="margin: 20px">

    <form method="post" action="Persistencia/PersistenciaDisciplina.php"> 
              <p><h1 style="text-align:center"> Sistema de Cadastro de Disciplinas </h1></p>
              <input type="hidden" id="id" name="id" value='<?= isset($_GET['id']) ? $_GET['id'] : 0?>'>
    <div class="row">
                
        <div id="nome" class="col">
	<legend>Nome da Disciplina</legend>
        <input for="txtNome" name="txtNome" type="text" id="txtNome" placeholder="NOME DISCIPLINA" style="width:400px"
            value='<?php echo isset($_GET['txtNome']) ? $_GET['txtNome'] : ""; ?>'/>     
	</div>
        
        <div id="Temp" class="col">
        <?php $tempo = ((isset($_GET['tempo'])) ? $_GET['tempo'] : '') ?>
        
            <select for="txtSelect" type="select" name="tempo" id="tempo" style="margin-top:44px; height:30px">
            <option value="200" <?php if($tempo=='200'){echo "selected";} ?>>200h</option>
	    <option value="400" <?php if($tempo=='400'){echo "selected";} ?>>400h</option>
	    <option value="800" <?php if($tempo=='800'){echo "selected";} ?>>800h</option>
            <option value="1200" <?php if($tempo=='1200'){echo "selected";} ?>>1200h</option>		
        </select>
        </div>
        
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
              
    </div>
    
        <br>  
        
        <input type="submit" value= "Cadastrar" id ="action" name = "action" style="background-color:greenyellow"></input>
	<input type="reset"></input>
        <button type="button" onclick="location.href='index.php'" style="background-color:yellow">Voltar</button>
        <br>
        
    </form>
    
    <br>
    
<table class="table table-bordered">
    <thead>
      <tr>
          <th id="th1">AÇÃO</th>
          <th id="th2">Item</th>
          <th id="th3">Nome Completo</th>
          <th id="th4">Duração</th>
      </tr>
    </thead>
    <tbody>

        <?php
        $arquivo = array();
        if (file_exists('JSON/disciplina.json')) {
            $arquivo = json_decode(file_get_contents('JSON/disciplina.json'));
        }
        ?>
        <?php if ($arquivo != null) {
            foreach ($arquivo as $json) { ?>
                <tr id=linha<?php $json->id; ?>> 
                    <td>
                        <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalAlterar<?php echo ($json->id); ?>">EDITAR</button>
                        <button class="btn btn-danger"  type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalExcluir<?php echo ($json->id); ?>">EXCLUIR</button>
                    </td>
                    <div class="modal fade" id="ModalExcluir<?php echo ($json->id); ?>">
                        
                        <div class="modal-dialog">
                          <div class="modal-content">

                            <div class="modal-header">
                                <p><h4 style="text-align:center"> EXCLUIR </h4></p>
                              <button type="button" class="close" data-dismiss="modal">×</button>
                            </div>

                              <h1 style="color:red"> Dejeja excluir Item <?php echo ($json->id); ?> ?</h1>

                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary" data-dismiss="modal"onclick="location.href='<?= "Persistencia/PersistenciaDisciplina.php?id=" . $json->id . '&delete=Delete' ?>'">Confirmar</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            </div>
                          </div>
                        </div>
                      </div>       


                      <div class="modal fade" id="ModalAlterar<?php echo ($json->id); ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">

                            <div class="modal-header">
                                <p><h4 style="text-align:center"> ALTERAR </h4></p>
                              <button type="button" class="close" data-dismiss="modal">×</button>
                            </div>

                              <h1 style="color:blue"> Dejeja alterar Item <?php echo ($json->id); ?> ?</h1>

                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="location.href='<?= "DisciplinaView.php?id=" . $json->id . '&txtNome=' . $json->nome . '&tempo=' . $json->tempo . '&action=Alterar' ?>'">Confirmar</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    <td id="td2"><?php echo $json->id ?></td>
                    <td id="td3"><?php echo $json->nome ?></td>
                    <td id="td4"><?php echo $json->tempo ?></td>
                    
                </tr>
        <?php }
    } ?>  
    </tbody>
  </table>
    
</html>