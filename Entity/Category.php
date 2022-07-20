<?php

class Category {

    private int $id_categorie;
    private string $nom_categorie;
    private string $couleur_categorie;
   

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



    /**
     * Get the value of id
     */ 
    public function getId_categorie()
    {
        return $this->id_categorie;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId_categorie($id_categorie)
    {
        $this->id_categorie = $id_categorie;
        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getNom_categorie()
    {
        return $this->nom_categorie;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setNom_categorie($nom_categorie)
    {
        $this->nom_categorie = $nom_categorie;
        return $this;
    }

    /**
     * Get the value of color
     */ 
    public function getCouleur_categorie()
    {
        return $this->couleur_categorie;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */ 
    public function setCouleur_categorie($couleur_categorie)
    {
        $this->couleur_categorie = $couleur_categorie;

        return $this;
    }
}