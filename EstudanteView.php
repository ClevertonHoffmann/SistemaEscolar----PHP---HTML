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
<body style="margin: 20px">
	<form method="post" action="Persistencia/PersistenciaEstudante.php">
            <p><h1 style="text-align:center"> Sistema de Cadastro de Estudantes </h1></p>
            
        <div class="row">
            <input type="hidden" id="key" name="key" value='<?= isset($_GET['key']) ? $_GET['key'] : 0?>'>
		
	    <div id="nome" class="col">

	    <legend>Nome</legend>

	    <input for="txtNome" name="txtNome" type="text" id="txtNome" placeholder="NOME COMPLETO" 
            value='<?php echo isset($_GET['txtNome']) ? $_GET['txtNome'] : ""; ?>' style="width:100%"/> 
            
            </div>

            <div id="telefone" class="col">

		<legend> Telefone </legend>
		
		<input for="txtTelefone" name="txtTelefone" type="tel" id="txtTelefone"  placeholder="TELEFONE"
                value='<?php echo isset($_GET['txtTelefone']) ? $_GET['txtTelefone'] : ""; ?>' style="width:100%"/>
		
            </div>

            <div id="email" class="col">

		<legend> Email </legend>
		
		<input for="txtEmail" name="txtEmail" type="email" id="txtEmail"  placeholder="nome@email.com" required
                value='<?php echo isset($_GET['txtEmail']) ? $_GET['txtEmail'] : ""; ?>' style="width:100%"/>
		
            </div>

            <div id="filsexo" class="col">

		<legend> Genero </legend>

		<input type="radio"
                <?php 
                $genero = isset($_GET['genero']) ? $_GET['genero'] : "";
                if (isset($genero) && $genero=="MASCULINO") echo "checked";?>
                 name="genero" value="MASCULINO"/> Masculino
                
		<input type="radio"
                <?php 
                $genero = isset($_GET['genero']) ? $_GET['genero'] : "";
                if (isset($genero) && $genero=="FEMININO") echo "checked";?>
                 name="genero" value="FEMININO"/> Feminino
                
		<input type="radio"
                <?php 
                $genero = isset($_GET['genero']) ? $_GET['genero'] : "";
                if (isset($genero) && $genero=="OUTRO") echo "checked";?>
                 name="genero" value="OUTRO"/> Outro
            
		</div>

        </div>
        <div class="row"><br></div>
            <div class="row">
            
		<div id="data" class="col">

		<legend> Data Nascimento </legend>

		<input for="txtData" name="txtData" type="date" id="txtData" 
                       value='<?php echo (isset($_GET['txtData']) ? $_GET['txtData'] : ""); ?>'
                />
		
		</div>

		<br><br>

 		<div id="select" class="col">
		<legend> Estado</legend>
                <?php $uf = ((isset($_GET['uf'])) ? $_GET['uf'] : '') ?>
		<select for="txtSelect" name="uf" id="uf" style="width:100%; height:25%;">
                        <option value="AC" <?php if($uf=='AC'){echo "selected";} ?>>Acre</option>
			<option value="AL" <?php if($uf=='AL'){echo "selected";} ?>>Alagoas</option>
			<option value="AP" <?php if($uf=='AP'){echo "selected";} ?>>Amapá</option>
			<option value="AM" <?php if($uf=='AM'){echo "selected";} ?>>Amazonas</option>
			<option value="BA" <?php if($uf=='BA'){echo "selected";} ?>>Bahia</option>
			<option value="CE" <?php if($uf=='CE'){echo "selected";} ?>>Ceará</option>
			<option value="DF" <?php if($uf=='DF'){echo "selected";} ?>>Distrito Federal</option>
			<option value="ES" <?php if($uf=='ES'){echo "selected";} ?>>Espírito Santo</option>
			<option value="GO" <?php if($uf=='GO'){echo "selected";} ?>>Goiás</option>
			<option value="MA" <?php if($uf=='MA'){echo "selected";} ?>>Maranhão</option>
			<option value="MT" <?php if($uf=='MT'){echo "selected";} ?>>Mato Grosso</option>
			<option value="MS" <?php if($uf=='MS'){echo "selected";} ?>>Mato Grosso do Sul</option>
			<option value="MG" <?php if($uf=='MG'){echo "selected";} ?>>Minas Gerais</option>
			<option value="PA" <?php if($uf=='PA'){echo "selected";} ?>>Pará</option>
			<option value="PB" <?php if($uf=='PB'){echo "selected";} ?>>Paraíba</option>
			<option value="PR" <?php if($uf=='PR'){echo "selected";} ?>>Paraná</option>
			<option value="PE" <?php if($uf=='PE'){echo "selected";} ?>>Pernambuco</option>
			<option value="PI" <?php if($uf=='PI'){echo "selected";} ?>>Piauí</option>
			<option value="RJ" <?php if($uf=='RJ'){echo "selected";} ?>>Rio de Janeiro</option>
			<option value="RN" <?php if($uf=='RN'){echo "selected";} ?>>Rio Grande do Norte</option>
			<option value="RS" <?php if($uf=='RS'){echo "selected";} ?>>Rio Grande do Sul</option>
			<option value="RO" <?php if($uf=='RO'){echo "selected";} ?>>Rondônia</option>
			<option value="RR" <?php if($uf=='RR'){echo "selected";} ?>>Roraima</option>
			<option value="SC" <?php if($uf=='SC'){echo "selected";} ?>>Santa Catarina</option>
			<option value="SP" <?php if($uf=='SP'){echo "selected";} ?>>São Paulo</option>
			<option value="SE" <?php if($uf=='SE'){echo "selected";} ?>>Sergipe</option>
			<option value="TO" <?php if($uf=='TO'){echo "selected";} ?>>Tocantins</option>
		</select>
		</div>              
                
                <div id="discip" class="col">
		<legend> Disciplinas Extra Curriculares</legend>
                
		<?php 
				                
	        $dis = (isset($_GET['dis'])) ? $_GET['dis'] : '';
                                
		$aDis = str_split($dis);		
                
                if(in_array("I", $aDis)){
                    echo '<input type="checkbox" id="d1" name="d1" value="I" checked>Ingles  ';
                }else{
                    echo '<input type="checkbox" id="d1" name="d1" value="I">Ingles  ';
                }
                if(in_array("E", $aDis)){
                    echo '<input type="checkbox" id="d2" name="d2" value="E" checked>Espanhol  ';
                }else{
                    echo '<input type="checkbox" id="d2" name="d2" value="E">Espanhol  ';
                }
                if(in_array("A", $aDis)){
                    echo '<input type="checkbox" id="d3" name="d3" value="A" checked>Alemão  ';
                }else{
                    echo '<input type="checkbox" id="d3" name="d3" value="A">Alemão  ';
                }
                if(in_array("M", $aDis)){
                    echo '<input type="checkbox" id="d4" name="d4" value="M" checked>Música  ';
                }else{
                    echo '<input type="checkbox" id="d4" name="d4" value="M">Música  ';
                }
                echo ('<br>');
                if(in_array("T", $aDis)){
                    echo '<input type="checkbox" id="d5" name="d5" value="T" checked>Teatro  ';
                }else{
                    echo '<input type="checkbox" id="d5" name="d5" value="T">Teatro  ';
                }
                
                ?>
                
		</div>

		<div id="corpref" class="col">
		<legend> Cor preferida</legend>
		<input type="color" name="cor" id="cor"
                value='<?php echo isset($_GET['cor']) ? $_GET['cor'] : ""; ?>'
                />
                
		</div>

        </div>
		<br>
                <input type="submit" value= "Cadastrar" id ="action" name = "action" style="background-color:greenyellow"></input>
		<input type="reset"></input>
                <button type="button" onclick="location.href='index.php'" style="background-color:yellow">Voltar</button>
	</form>
</body>
<br>
<table class="table table-bordered">
	<tbody>
		<tr>
			<th id="th1">Edit-Delete</th>
                        <th id="th1">Item</th>
			<th id="th3">Nome Completo</th>
			<th id="th4">Telefone</th>
			<th id="th5">Email</th>
			<th id="th6">Genero</th>
			<th id="th7">Dt Nasc.</th>
			<th id="th8">Estado</th>
			<th id="th9">Disciplinas</th>
		</tr>
            <?php
               $arquivo = array();
               if(file_exists('JSON/estudantes.json')){
                    $arquivo = json_decode(file_get_contents('JSON/estudantes.json'));
               }
	    ?>
	     	<?php if($arquivo!=null){ foreach ($arquivo as $json){ ?>
	     	<tr id=linha<?php $json->key; ?>> 
	    		    <td>
                                <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalAlterar<?php echo ($json->key); ?>">EDITAR</button>
                                <button class="btn btn-danger"  type="button" data-toggle="modal" data-target="#ModalExcluir<?php echo ($json->key); ?>">EXCLUIR</button> 
                            </td>
                       
                    <div class="modal fade" id="ModalExcluir<?php echo ($json->key); ?>">
                        
                        <div class="modal-dialog">
                          <div class="modal-content">

                            <div class="modal-header">
                                <p><h4 style="text-align:center"> EXCLUIR </h4></p>
                              <button type="button" class="close" data-dismiss="modal">×</button>
                            </div>

                              <h1 style="color:red"> Dejeja excluir Item <?php echo ($json->key); ?> ?</h1>

                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="location.href='<?= "Persistencia/PersistenciaEstudante.php?key=".$json->key.'&delete=Delete'?>'">Confirmar</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            </div>
                          </div>
                        </div>
                      </div>       


                      <div class="modal fade" id="ModalAlterar<?php echo ($json->key); ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">

                            <div class="modal-header">
                                <p><h4 style="text-align:center"> ALTERAR </h4></p>
                              <button type="button" class="close" data-dismiss="modal">×</button>
                            </div>

                              <h1 style="color:blue"> Dejeja alterar Item <?php echo ($json->key); ?> ?</h1>

                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="location.href='<?= "EstudanteView.php?key=".$json->key.'&txtNome='.$json->nome .'&txtTelefone='.$json->telefone.'&txtEmail='.$json->email.'&genero='.$json->genero.'&txtData='.$json->data.'&uf='.$json->uf.'&dis='.$json->dis.'&cor='.$json->cor.'&action=Update'?>'">Confirmar</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            </div>
                          </div>
                        </div>
                      </div>
                                <td id="td2"><?php echo $json->key ?></td>
				<td id="td3"><?php echo $json->nome ?></td>
				<td id="td4"><?php echo $json->telefone ?></td>
				<td id="td5"><?php echo $json->email ?></td>
				<td id="td6"><?php echo $json->genero ?></td>
                                <td id="td7"><?php echo date_format(new DateTime($json->data), 'd/m/Y') ?></td>
				<td id="td8"><?php echo $json->uf ?></td>
				<td id="td9"><?php echo $json->dis ?></td>
			</tr>
                <?php }} ?>  
	</tbody>
</table>

</html>