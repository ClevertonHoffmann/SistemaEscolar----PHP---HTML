<?php

class AlunoDisciplina {

    public $keygeral;
    public $id;
    public $key;

    public function __construct() {
        $this->keygeral = incremento();
        $this->id = ((isset($_POST['id'])) ? $_POST['id'] : '');
        $this->key = ((isset($_POST['key'])) ? $_POST['key'] : '');
    }

}

function incremento(){
    $dataImport = importData();
    if(isset($dataImport[0])){
        $maior = 0;
        foreach($dataImport as $key => $value){
            if($maior<$value->keygeral){
                $maior = $value->keygeral;
            }
        }
        return $maior+1;
    }else{
        return 1;
    }
}

if(isset($_POST['action'])){
    if (verificaCampos()==false){    
        if($_POST['keygeral'] == 0){
            create();
        }else{
            update($_POST['keygeral']);
        }
    }else{
        header("location:../AlunoDisciplinaView.php?mensagem=error");
    }
}
if(isset($_GET['delete'])){
        delete($_GET['keygeral']);
}

function create() {
    $array = importData();
    $array [] = new AlunoDisciplina();
    exportData($array);
    header("location:../AlunoDisciplinaView.php");
}

function importData() {
    if (file_exists('../JSON/alunodisciplina.json')) {
        return json_decode(file_get_contents('../JSON/alunodisciplina.json'));
    } else {
        return array();
    }
}

function exportData($array) {
    $dados_json = json_encode($array);
    $fp = fopen("../JSON/alunodisciplina.json", "w");
    fwrite($fp, $dados_json);
    fclose($fp);
}

function update($id) {
    $dataImport = importData();
    foreach ($dataImport as $key => $value) {
        if ($value->keygeral == $id) {
            $dataImport[$key]->id = ((isset($_POST['id'])) ? $_POST['id'] : '');
            $dataImport[$key]->key = ((isset($_POST['key'])) ? $_POST['key'] : '');
            break;
        }
    }
    exportData($dataImport);
    header("location:../AlunoDisciplinaView.php");
}

function delete($id) {
    $dataImport = importData();
    foreach ($dataImport as $key => $value) {
        if ($value->keygeral == $id) {
            array_splice($dataImport, ($key), 1);
        }
    }
    exportData($dataImport);
    header("location:../AlunoDisciplinaView.php");
}

function verificaCampos(){
    $dataImport = importData();
    $id =  ((isset($_POST['id'])) ? $_POST['id'] : '');
    $key = ((isset($_POST['key'])) ? $_POST['key'] : '');
    foreach ($dataImport as $value) {
        if(($value->id == $id) && ($value->key == $key)){
            return true;
        }       
    }
    return false;
}

?>