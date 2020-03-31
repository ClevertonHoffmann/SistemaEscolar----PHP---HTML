<?php

class Escola {

    public $cnpj;
    public $nome;
    public $telefone;
    public $endereco;
    public $uf;

    public function __construct() {
        $this->cnpj = ((isset($_POST['cnpj'])) ? $_POST['cnpj'] : '');
        $this->nome = ((isset($_POST['txtNome'])) ? $_POST['txtNome'] : '');
        $this->telefone = ((isset($_POST['txtTelefone'])) ? $_POST['txtTelefone'] : '');
        $this->endereco = ((isset($_POST['txtEndereco'])) ? $_POST['txtEndereco'] : '');
        $this->uf = ((isset($_POST['uf'])) ? $_POST['uf'] : '');
    }

}

if (isset($_POST['action'])) {
    if($_POST['action']=='Alterar'){
        update($_POST['cnpj']);
    }else{    
        create();
    }
}
if (isset($_GET['delete'])) {
    delete($_GET['cnpj']);
}

function create() {
    $array = importData();
    $array [] = new Escola();
    exportData($array);
    header("location:../EscolaView.php");
}

function importData() {
    if (file_exists('../JSON/escola.json')) {
        return json_decode(file_get_contents('../JSON/escola.json'));
    } else {
        return array();
    }
}

function exportData($array) {
    $dados_json = json_encode($array);
    $fp = fopen("../JSON/escola.json", "w");
    fwrite($fp, $dados_json);
    fclose($fp);
}

function update($id) {
    $dataImport = importData();
    foreach ($dataImport as $key => $value) {
        if ($value->cnpj == $id) {
            $dataImport[$key]->cnpj = ((isset($_POST['cnpj'])) ? $_POST['cnpj'] : '');
            $dataImport[$key]->nome = ((isset($_POST['txtNome'])) ? $_POST['txtNome'] : '');
            $dataImport[$key]->telefone = ((isset($_POST['txtTelefone'])) ? $_POST['txtTelefone'] : '');
            $dataImport[$key]->uf = ((isset($_POST['uf'])) ? $_POST['uf'] : '');
            $dataImport[$key]->endereco = ((isset($_POST['txtEndereco'])) ? $_POST['txtEndereco'] : '');
            break;
        }
    }
    exportData($dataImport);
    header("location:../EscolaView.php");
}

function delete($id) {
    $dataImport = importData();
    foreach ($dataImport as $key => $value) {
        if ($value->cnpj == $id) {
            array_splice($dataImport, ($key), 1);
        }
    }
    exportData($dataImport);
    header("location:../EscolaView.php");
}

?>