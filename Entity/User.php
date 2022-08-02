<?php

class User {

    private int $id_user;
    private string $username_user;
    private string $email_user;
    private string $password_user;

   

    public function __construct(array $data) {
        $this->hydrate($data); 
    }


    public function hydrate(array $data): void {
        foreach($data as $key=>$value) {
            $method = "set" .ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value); 
            }
        }
    }

    
    public function getId_user(){return $this->id_user;}

    public function setId_user(int $id_user)
    {
        $this->id_user = $id_user;
        return $this;
    }

    public function getUsername_user(){return $this->username_user; }

    public function setUsername_user(string $username_user)
    {
        $this->username_user = $username_user;
        return $this;
    }


    public function getEmail_user(){return $this->email_user;}

    public function setEmail_user(string $email_user)
    {
        $this->email_user = $email_user;

        return $this;
    }

    public function getPassword_user(){return $this->password_user;}

    public function setPassword_user(string $password_user)
    {
        $this->password_user = $password_user;
        return $this;
    }
}