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

    <form method="post" action="Persistencia/PersistenciaEscola.php"> 
              <p><h1 style="text-align:center"> Sistema de Cadastro de Escolas </h1></p>
              
    <div class="row">
        
        <div id="Cnpj" class="col"> 
        <legend>CNPJ</legend>
            <input type="text" name="cnpj" id="cnpj" onkeyup="FormataCnpj(this,event)"
            onblur="if(!validarCNPJ(this.value))
            {alert('CNPJ Informado é inválido!');this.value='';}"
            maxlength="18" style="width:180px; height:30px"
            class="form-control input-md" ng-model="cadastro.cnpj" required placeholder="CNPJ" 
            value='<?php echo isset($_GET['cnpj']) ? $_GET['cnpj'] : ""; ?>'/> 
        </div>
        
        <div id="nome" class="col">
	<legend>Nome</legend>
        <input for="txtNome" name="txtNome" type="text" id="txtNome" placeholder="NOME COMPLETO" 
            value='<?php echo isset($_GET['txtNome']) ? $_GET['txtNome'] : ""; ?>'/>     
	</div>
        
        <div id="telfone" class="col">
	<legend>Telefone</legend>
        <input for="txtTelefone" name="txtTelefone" type="tel" id="txtTelefone"  placeholder="TELEFONE"
                value='<?php echo isset($_GET['txtTelefone']) ? $_GET['txtTelefone'] : ""; ?>'/>    
	</div>
               
        <div id="estados" class="col">
	<legend> Estado</legend>
        
        <?php $uf = ((isset($_GET['uf'])) ? $_GET['uf'] : '') ?>
        
        <select for="txtSelect" name="uf" id="uf" style="height:30px">
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
        
        <div id="endereco" class="col">
	<legend>Endereço</legend>
        <input style="width:200%" for="txtEndereco" name="txtEndereco" type="text" id="txtEndereco" placeholder="ENDEREÇO COMPLEMENTAR" 
            value='<?php echo isset($_GET['txtEndereco']) ? $_GET['txtEndereco'] : ""; ?>'/>     
	</div>
        
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
              
        </div>
    
        <br>  
        
        <input type="submit" value= "<?php echo isset($_GET['action']) ? $_GET['action'] : "Cadastrar"; ?>" id ="action" name = "action" style="background-color:greenyellow"></input>
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
          <th id="th3">CNPJ</th>
          <th id="th4">Nome Completo</th>
          <th id="th5">Telefone</th>
          <th id="th6">Estador</th>
          <th id="th7">Endereço Complementar</th>
      </tr>
    </thead>
    <tbody>

        <?php
        $iCont = 1;
        $arquivo = array();
        if (file_exists('JSON/escola.json')) {
            $arquivo = json_decode(file_get_contents('JSON/escola.json'));
        }
        ?>
        <?php if ($arquivo != null) {
            foreach ($arquivo as $json) { ?>
                <tr id=linha<?php echo($iCont); ?>> 
                    <td>
                        <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalAlterar<?php echo ($iCont); ?>">EDITAR</button>
                        <button class="btn btn-danger"  type="button" data-toggle="modal" data-target="#ModalExcluir<?php echo ($iCont); ?>">EXCLUIR</button> 
                    </td>
                    <div class="modal fade" id="ModalExcluir<?php echo ($iCont); ?>">
                        
                        <div class="modal-dialog">
                          <div class="modal-content">

                            <div class="modal-header">
                                <p><h4 style="text-align:center"> EXCLUIR </h4></p>
                              <button type="button" class="close" data-dismiss="modal">×</button>
                            </div>

                              <h1 style="color:red"> Dejeja excluir Item <?php echo ($iCont); ?> ?</h1>

                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="location.href='<?= "Persistencia/PersistenciaEscola.php?cnpj=" . $json->cnpj . '&delete=Delete' ?>'">Confirmar</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            </div>
                          </div>
                        </div>
                      </div>       


                      <div class="modal fade" id="ModalAlterar<?php echo ($iCont); ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">

                            <div class="modal-header">
                                <p><h4 style="text-align:center"> ALTERAR </h4></p>
                              <button type="button" class="close" data-dismiss="modal">×</button>
                            </div>

                              <h1 style="color:blue"> Dejeja alterar Item <?php echo ($iCont); ?> ?</h1>

                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="location.href='<?= "EscolaView.php?cnpj=" . $json->cnpj . '&txtNome=' . $json->nome . '&txtTelefone=' . $json->telefone . '&uf=' . $json->uf . '&txtEndereco=' . $json->endereco . '&action=Alterar' ?>'">Confirmar</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td id="td2"><?php echo $iCont ?></td>
                    <td id="td3"><?php echo $json->cnpj ?></td>
                    <td id="td4"><?php echo $json->nome ?></td>
                    <td id="td5"><?php echo $json->telefone ?></td>
                    <td id="td6"><?php echo $json->uf ?></td>
                    <td id="td7"><?php echo $json->endereco ?></td>
                </tr>
        <?php $iCont++;}
    } ?>  
                
<!--     The Modal 
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
         Modal Header 
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
         Modal body 
        <div class="modal-body">
          Modal body..
        </div>
        
         Modal footer 
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>            -->
                
    </tbody>
  </table>
    
</html>