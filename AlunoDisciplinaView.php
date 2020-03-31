<!DOCTYPE html>
<html lang="pt">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="js/funcoes.js"></script>

    <head>
        <meta charset="utf-8">
    </head>
    <?php
    if (file_exists('JSON/estudantes.json')) {
        $estudantes = json_decode(file_get_contents('JSON/estudantes.json'));
    }
    if (file_exists('JSON/disciplina.json')) {
        $disciplina = json_decode(file_get_contents('JSON/disciplina.json'));
    }
    $error = isset($_GET['mensagem']) ? $_GET['mensagem'] : "";
    if($error=='error'){
       echo "<script> alert('Valores já cadastrados, altere valores a serem cadastrados!') </script>";
    }
    
    ?>
    
    
    <body style="margin: 20px">

        <form method="post" action="Persistencia/PersistenciaAlunoDisciplina.php"> 
            <p><h1 style="text-align:center"> Cadastro de Estudante x Disciplina </h1></p>
        <br>
        <input type="hidden" id="keygeral" name="keygeral" value='<?= isset($_GET['keygeral']) ? $_GET['keygeral'] : 0?>'>
        <div class="row">

            <?php $sD = isset($_GET['id']) ? $_GET['id'] : ""; ?>
        <div class="col">
            <select for="txtId" name="id" id="id" style="height:30px; width:600px; ">
            <?php if ($disciplina != null) {
                foreach ($disciplina as $disc) {
            ?>
                <option value='<?php echo $disc->id ?>'
                <?php if($disc->id==$sD){echo "selected";} ?>
                ><?php echo($disc->id.'-'.$disc->nome)?></option>	            
            <?php 
                }
                }
            ?>  
            </select>
        </div>
            <?php $sE = isset($_GET['key']) ? $_GET['key'] : ""; ?>
        <div class="col">
            <select for="txtKey" name="key" id="key" style="height:30px; width:600px;">
            <?php if ($estudantes != null) {
                foreach ($estudantes as $estu) {
            ?>
                <option value='<?php echo $estu->key ?>'
                        <?php if($estu->key==$sE){echo "selected";} ?> 
                ><?php echo($estu->key.'-'.$estu->nome)?></option>	
            <?php 
                }
                }
            ?>  
            </select>
        </div>


</div>

<br>  

<input type="submit" value= "<?php echo isset($_GET['action']) ? $_GET['action'] : "Cadastrar"; ?>" id ="action" name = "action" style="background-color:greenyellow"></input>
<input type="reset"></input>
<button type="button" onclick="location.href = 'index.php'" style="background-color:yellow">Voltar</button>
<br>

</form>

<br>

<table class="table table-bordered">
    <thead>
        <tr>
            <th id="th1">AÇÃO</th>
            <th id="th2">Item</th>
            <th id="th3">Cod.Disc.</th>
            <th id="th4">Disciplina</th>
            <th id="th5">Cod.Estud.</th>
            <th id="th6">Estudante</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $arquivo = array();
        if (file_exists('JSON/alunodisciplina.json')) {
            $arquivo = json_decode(file_get_contents('JSON/alunodisciplina.json'));
        }
        ?>
    <?php if ($arquivo != null) {
    foreach ($arquivo as $json) {
        foreach ($estudantes as $estud) {
            if($json->key == $estud->key){
                $desEstudante = $estud->nome;
            }
        }
        foreach ($disciplina as $discip) {
            if($json->id == $discip->id){
                $desDisciplina = $discip->nome;
            }
        }
                
        ?>
                <tr id=linha<?php $json->keygeral; ?>> 
                    <td>
                        <button data-toggle="modal" data-target="#ModalAlterar<?php echo ($json->keygeral); ?>" type="button" class="btn btn-primary">EDITAR</button>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#ModalExcluir<?php echo ($json->keygeral); ?>" type="button">EXCLUIR</button>  <!--data-toggle="modal" data-target="#myModal"-->                  
                        
                        <div class="modal fade" id="ModalExcluir<?php echo ($json->keygeral); ?>">
                        
                        <div class="modal-dialog">
                          <div class="modal-content">

                            <div class="modal-header">
                                <p><h4 style="text-align:center"> EXCLUIR </h4></p>
                              <button type="button" class="close" data-dismiss="modal">×</button>
                            </div>

                              <h1 style="color:red"> Dejeja excluir Item <?php echo ($json->keygeral); ?> ?</h1>

                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="location.href = '<?= "Persistencia/PersistenciaAlunoDisciplina.php?keygeral=" . $json->keygeral . '&delete=Delete' ?>'">Confirmar</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            </div>
                          </div>
                        </div>
                      </div>       


                      <div class="modal fade" id="ModalAlterar<?php echo ($json->keygeral); ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">

                            <div class="modal-header">
                                <p><h4 style="text-align:center"> ALTERAR </h4></p>
                              <button type="button" class="close" data-dismiss="modal">×</button>
                            </div>

                              <h1 style="color:blue"> Dejeja alterar Item <?php echo ($json->keygeral); ?> ?</h1>

                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="location.href = '<?= "AlunoDisciplinaView.php?keygeral=" . $json->keygeral . '&id=' . $json->id . '&key=' . $json->key .'&action=Alterar' ?>'">Confirmar</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td id="td2"><?php echo $json->keygeral ?></td>
                    <td id="td3"><?php echo $json->id ?></td>
                    <td id="td4"><?php echo $desDisciplina ?></td>
                    <td id="td5"><?php echo $json->key ?></td>
                    <td id="td6"><?php echo $desEstudante ?></td>
                    
                </tr>
    <?php }
}
?>  

    </tbody>
</table>  
</html>