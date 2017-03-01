<?php

/*
 *  Michał Błaszczyk
 */

/**
 * Description of Article
 *
 * @author Michal
 */
class Article {
    private $pdo;
    
    private $id_article;
    private $title;
    private $content;
    private $category;
    private $data;
    
    public function __construct($pdo, $id) {
        if (isset($id) && is_numeric($id)){
            $this->pdo =$pdo;
            $zap = $this->pdo->prepare("SELECT * FROM articles WHERE id_article = :id");
            $zap->bindValue(":id", $id, PDO::PARAM_INT);
            $zap->execute();
            $wynik = $zap->fetch(PDO::FETCH_ASSOC);
            
            if(!empty($wynik)){
                $this->id_article = $id;
                $this->title = $wynik['title'];
                $this->content = $wynik['content'];
                $this->data = $wynik['data'];
                
                $zap2 = $this->pdo->prepare("SELECT * FROM category WHERE id_category = :id");
                $zap2->bindValue(":id", wynik['id_category'], PDO::PARAM_INT);
                $zap2->execute();
                $wynik2 = $zap2->fetch(PDO::FETCH_ASSOC);
                
                $this->category = $wynik2;
                
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }
}
