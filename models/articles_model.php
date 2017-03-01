<?php

/*
 *  Michał Błaszczyk
 */

/**
 * Description of articles_model
 *
 * @author Michal
 */
class Articles_Model extends BaseModel{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getPage($page){
        $zap = $this->pdo->prepare("select count(id_article) from articles");
        $zap->execute();
        $wynik = $zap->fetch(PDO::FETCH_NUM);

        $limit = 5;
        $allpages = ceil($wynik[0] / $limit);

        if ($page != null) {
            if($page > 0 && $page <= $allpages) $page = $page - 1;
            else $page = 0;
        } else {
            $page = 0;
        }
        $from = $page * $limit;

        $zap2 = $this->pdo->prepare("select * from articles ORDER by 1 asc limit :page,:lim");
        $zap2->bindValue(":page", $from, PDO::PARAM_INT);
        $zap2->bindValue(":lim", $limit, PDO::PARAM_INT);
        $zap2->execute();
        
        $wynik2 = $zap2->fetchAll(PDO::FETCH_ASSOC);
        $GLOBALS['allpage'] = $allpages;
        
        return $wynik2;
    }   

    public function get($id){
        $zap = $this->pdo->prepare("SELECT * FROM articles WHERE id_article=?");
        $zap->execute(array($id));
        $wynik = $zap->fetch(PDO::FETCH_ASSOC);
        
        $zap2 = $this->pdo->prepare("SELECT c.id_comment, c.content, c.data, c.id_user, u.login FROM comments c join users u on c.id_user=u.id_user WHERE id_article=? ORDER BY data DESC");
        $zap2->execute(array($id));
        $wynik2 = $zap2->fetchALL(PDO::FETCH_ASSOC);
        
        $wynik['comments'] = $wynik2;
        
        $zap3 = $this->pdo->prepare("UPDATE articles SET views=? WHERE id_article=?");
        $zap3->execute(array($wynik['views'] + 1, $id));
        
        return $wynik;
    }
    
    public function addComment($id, $data){
        $zap = $this->pdo->prepare("INSERT INTO comments(content, data, id_user, id_article) values(?, NOW(),?,?)");
        $zap->execute(array(htmlentities($data['content']), Session::get('id_user'), $id));
    }
	
	public function getArticlesByMonth($month){
		$zap = $this->pdo->prepare('SELECT * FROM articles HAVING DATE_FORMAT(data, "%Y-%M") = ? ORDER BY data DESC LIMIT 10');
        //$zap->bindValue(":month", $month, PDO::PARAM_STR);
        $zap->execute(array($month));
        $wynik = $zap->fetchAll(PDO::FETCH_ASSOC);
		
		return $wynik;
	}
}
