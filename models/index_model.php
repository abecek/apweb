<?php

/*
 *  Michał Błaszczyk
 */

/**
 * Description of index_model
 *
 * @author Michal
 */
class Index_Model extends BaseModel{
    public function __construct() {
        parent::__construct();
    }
    
    public function getMostViewedArticles(){
        $zap = $this->pdo->prepare("SELECT * FROM articles ORDER BY views DESC LIMIT 3");
        $zap->execute();
        $wynik = $zap->fetchAll(PDO::FETCH_ASSOC);
        
        return $wynik;
    }
    
    public function getSliderArticles(){
        $result = null;
        $zap = $this->pdo->prepare("SELECT * FROM articles");
        $zap->execute();
        $wynik = $zap->fetchAll(PDO::FETCH_ASSOC);
		
		if(!empty($wynik)){
			$wynik2 = array_rand($wynik, count($wynik));
			for($i = 0; $i < count($wynik2); $i++){
				$result[$i] = $wynik[$wynik2[$i]];
			}
		}
		
        return $result;
    }
	
	public function getArticlesByMonth(){
		$zap = $this->pdo->prepare("SELECT DATE_FORMAT(DATE(data), '%M %Y') data_nice,
											DATE_FORMAT(DATE(data), '%Y-%M') data FROM articles 
											GROUP BY DATE_FORMAT(DATE(data), '%Y-%M') 
											ORDER BY 1 DESC
								");
        $zap->execute();
        $wynik = $zap->fetchAll(PDO::FETCH_ASSOC);
	
		return $wynik;
	}
}
