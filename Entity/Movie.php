<?php

class Movie {

    private int $id_film;
    private string $titre_film;
    private string $description_film;
    private string $imageUrl_film;
    private string $dateSortie_film;
    private string $categorie_id;
    private string $realisateur;



    public function __construct(array $data){
        $this->hydrate($data); 
    }


    public function hydrate(array $data): void {
        foreach($data as $key=>$value) {
            $method = "set" .ucfirst($key); //1r caractere en maj: setId setTitle...;
            if(method_exists($this, $method)){
                $this->$method($value); // setId(1) setTitle("Avatar")...
            }
        }
    }


    public function getId_film()
    {
        return $this->id_film;
    }
    
    public function setId_film($id_film)
    {
        $this->id_film = $id_film;
        return $this;
    }


    public function getTitre_film()
    {
        return $this->titre_film;
    }

    public function setTitre_film($titre_film):self
    {
        if(strlen($titre_film) >= 3 && strlen($titre_film) <= 180){
            $this->titre_film = $titre_film;
            return $this;
        }
    }


    public function getDescription_film()
    {
        return $this->description_film;
    }

    public function setDescription_film($description_film)
    {
        if(strlen($description_film) >= 3 && strlen($description_film) <= 180){
            $this->description_film = $description_film;
            return $this;
        }
    }


    public function getImageUrl_film()
    {
        return $this->imageUrl_film;
    }

    public function setImageUrl_film($imageUrl_film)
    {
        $this->imageUrl_film = $imageUrl_film;
        return $this;
    }



    public function getDateSortie_film()
    {
        return $this->dateSortie_film;
    }

    public function setDateSortie_film($dateSortie_film)
    {
        $this->dateSortie_film = $dateSortie_film;
        return $this;
    }


    public function getCategorie_id()
    {
        return $this->categorie_id;
    }

    public function setCategorie_id($categorie_id)
    {
        if($categorie_id > 0){
            $this->categorie_id = $categorie_id;
            return $this;
        }
    }



    /**
     * Get the value of realisateur
     */ 
    public function getRealisateur()
    {
        return $this->realisateur;
    }

    /**
     * Set the value of realisateur
     *
     * @return  self
     */ 
    public function setRealisateur($realisateur)
    {
        if(strlen($realisateur) >= 3 && strlen($realisateur) <= 120) {
            $this->realisateur = $realisateur;
            return $this;
        }
    }

    
}

