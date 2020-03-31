<?php

class Estudante{
        
    public $key;
    public $nome;
    public $telefone;
    public $email;
    public $genero;
    public $data;
    public $uf;
    public $dis;
    public $cor;
        
    public function __construct(){
        $this->key = incremento();
        $this->nome = ((isset($_POST['txtNome'])) ? $_POST['txtNome'] : '');
        $this->telefone = ((isset($_POST['txtTelefone'])) ? $_POST['txtTelefone'] : '');
        $this->email = ((isset($_POST['txtEmail'])) ? $_POST['txtEmail'] : '');
        $this->genero = ((isset($_POST['genero'])) ? $_POST['genero'] : '');
        $this->data = ((isset($_POST['txtData'])) ? $_POST['txtData'] : '');
        $this->uf = ((isset($_POST['uf'])) ? $_POST['uf'] : '');
        $this->dis = (
                ((isset($_POST['d1'])) ? $_POST['d1'] : '').
                ((isset($_POST['d2'])) ? $_POST['d2'] : '').
                ((isset($_POST['d3'])) ? $_POST['d3'] : '').
                ((isset($_POST['d4'])) ? $_POST['d4'] : '').
                ((isset($_POST['d5'])) ? $_POST['d5'] : ''));
        $this->cor = ((isset($_POST['cor'])) ? $_POST['cor'] : '');
    }
}
        
if(isset($_POST['action'])){
        if($_POST['key'] == 0){
            create();
        }else{
            update($_POST['key']);
        }
    }
if(isset($_GET['delete'])){
        delete($_GET['key']);
}
 
function incremento(){
    $dataImport = importData();
    if(isset($dataImport[0])){
        $maior = 0;
        foreach($dataImport as $key => $value){
            if($maior<$value->key){
                $maior = $value->key;
            }
        }
        return $maior+1;
    }else{
        return 1;
    }
}

function create(){
    $array = importData();
    $array [] = new Estudante();    
    exportData($array);
    header("location:../EstudanteView.php");
}

function importData(){
    if(file_exists('../JSON/estudantes.json')){
        return json_decode(file_get_contents('../JSON/estudantes.json'));
    }else{
        return array();
    }
}

function exportData($array){
    $dados_json = json_encode($array);
    $fp = fopen("../JSON/estudantes.json", "w");
    fwrite($fp, $dados_json);
    fclose($fp);
}

function update($id){
    $dataImport = importData();
    foreach($dataImport as $key => $value){
        if($value->key == $id){
        $dataImport[$key]->nome = ((isset($_POST['txtNome'])) ? $_POST['txtNome'] : '');
        $dataImport[$key]->telefone = ((isset($_POST['txtTelefone'])) ? $_POST['txtTelefone'] : '');
        $dataImport[$key]->email = ((isset($_POST['txtEmail'])) ? $_POST['txtEmail'] : '');
        $dataImport[$key]->genero = ((isset($_POST['genero'])) ? $_POST['genero'] : '');
        $dataImport[$key]->data = ((isset($_POST['txtData'])) ? $_POST['txtData'] : '');
        $dataImport[$key]->uf = ((isset($_POST['uf'])) ? $_POST['uf'] : '');
        $dataImport[$key]->dis = (
                ((isset($_POST['d1'])) ? $_POST['d1'] : '').
                ((isset($_POST['d2'])) ? $_POST['d2'] : '').
                ((isset($_POST['d3'])) ? $_POST['d3'] : '').
                ((isset($_POST['d4'])) ? $_POST['d4'] : '').
                ((isset($_POST['d5'])) ? $_POST['d5'] : ''));
        $dataImport[$key]->cor = ((isset($_POST['cor'])) ? $_POST['cor'] : '');      
        break;
        }
    }
    exportData($dataImport);
    header("location:../EstudanteView.php");  
}

function delete($id){
    $dataImport = importData();
    foreach($dataImport as $key => $value){
        if($value->key == $id){
        array_splice($dataImport,($key),1);
    }
}
    exportData($dataImport);       
    header("location:../EstudanteView.php");
}
    
?>