<?php
class Alunno implements JsonSerializable {
    public $nome;
    public $cognome;
    public $eta;
    public function __construct($nome,$cognome,$eta)
    {
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->eta = $eta;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getCognome(){
        return $this->cognome;
    }
    public function getEta(){
        return $this->eta;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function setCognome($cognome){
        $this->cognome = $cognome;
    }
    public function setEta($eta){
        $this->eta = $eta;
    }
    public function toString(){
        return "<p>Nome: ".$this->nome." Cognome: ".$this->cognome." Età: ".$this->eta."</p>";
    }
    public function jsonSerialize() {
        $attrs = [];
        $class_vars = get_class_vars(get_class($this));
        foreach ($class_vars as $name => $value) {
            $attrs[$name]=$this->{$name};
        }
        return $attrs;
    }
}
?>