<?php
require_once ("Alunno.php");
class Classe implements JsonSerializable
{
    protected $nar=[];
    public function __construct()
    {
        $a1= new Alunno("a","a",5);
        $a2= new Alunno("b","a",6);
        $a3= new Alunno("c","d",7);
        array_push($this->nar, $a1);
        array_push($this->nar, $a2);
        array_push($this->nar, $a3);
    }
//    public function getArray()
//    {
//        return $this->nar;
//    }
    public function toHTML()
    {
        $s= '<h1>Elenco alunni</h1>';
        foreach ($this->nar as $alunno)
        {
            $s.=$alunno->toString();
        }
        return $s;
    }
    public function getAlunno($nome)
    {
        foreach ($this->nar as $alunno)
        {
            if($alunno->getNome() == $nome)
                return $alunno;
        }
        return null;
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