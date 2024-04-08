<?php
require_once ("Alunno.php");
class Classe implements JsonSerializable
{
    protected $nar=[];
    public function __construct()
    {
        $a1= new Alunno("b","c",3);
        $a2= new Alunno("b","d",3);
        $a3= new Alunno("b","e",3);
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
    public function addAlunno($nome,$cognome,$eta)
    {
        $a = new Alunno($nome,$cognome,$eta);
        array_push($this->nar, $a);
    }
    public function deleteAlunno($nome)
    {
        foreach ($this->nar as $index => $alunno) {
            if ($alunno->getNome() == $nome) {
                unset($this->nar[$index]);
                return true;
            }
        }
        return false;
    }
}