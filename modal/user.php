<?php 
 class user{
    private string $FirstName;
    private string $LastName;
    private string $Password;
    private string $Email ;
    public function __construct(string $f,string $l, string $p, string $e){
        $this->FirstName=$f;
        $this->LastName=$l;
        $this->Password=$p;
        $this->Email=$e;
    }
    public function setFirstName(string $first){
        $this->FirstName=$first;
    }
    public function getFirstName(){
        return $this->FirstName;
    }
    public function setLastName(string $last){
        $this->LastName=$last;
    }
    public function getLastName(){
        return $this->LastName;
    }
    public function setPassword(string $p){
        $this->Password=$p;
    }
    public function getPassword(){
        return $this->Password;
    }
    public function setEmail(string $e){
        $this->Email=$e;
    }
    public function getEmail(){
        return $this->Email;
    }
 }


?>