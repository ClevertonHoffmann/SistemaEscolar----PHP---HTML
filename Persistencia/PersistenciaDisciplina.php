<?php

class Disciplina {

    public $id;
    public $nome;
    public $tempo;

    public function __construct() {
        $this->id = incremento();
        $this->nome = ((isset($_POST['txtNome'])) ? $_POST['txtNome'] : '');
        $this->tempo = ((isset($_POST['tempo'])) ? $_POST['tempo'] : '');
    }

}

function incremento(){
    $dataImport = importData();
    if(isset($dataImport[0])){
        $maior = 0;
        foreach($dataImport as $key => $value){
            if($maior<$value->id){
                $maior = $value->id;
            }
        }
        return $maior+1;
    }else{
        return 1;
    }
}

if(isset($_POST['action'])){
        if($_POST['id'] == 0){
            create();
        }else{
            update($_POST['id']);
        }
    }
if(isset($_GET['delete'])){
        delete($_GET['id']);
}

function create() {
    $array = importData();
    $array [] = new Disciplina();
    exportData($array);
    header("location:../DisciplinaView.php");
}

function importData() {
    if (file_exists('../JSON/disciplina.json')) {
        return json_decode(file_get_contents('../JSON/disciplina.json'));
    } else {
        return array();
    }
}

function exportData($array) {
    $dados_json = json_encode($array);
    $fp = fopen("../JSON/disciplina.json", "w");
    fwrite($fp, $dados_json);
    fclose($fp);
}

function update($id) {
    $dataImport = importData();
    foreach ($dataImport as $key => $value) {
        if ($value->id == $id) {
            $dataImport[$key]->nome = ((isset($_POST['txtNome'])) ? $_POST['txtNome'] : '');
            $dataImport[$key]->tempo = ((isset($_POST['tempo'])) ? $_POST['tempo'] : '');
            break;
        }
    }
    exportData($dataImport);
    header("location:../DisciplinaView.php");
}

function delete($id) {
    $dataImport = importData();
    foreach ($dataImport as $key => $value) {
        if ($value->id == $id) {
            array_splice($dataImport, ($key), 1);
        }
    }
    exportData($dataImport);
    header("location:../DisciplinaView.php");
}

?>