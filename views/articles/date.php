<!DOCTYPE html>
<!--
 Michał Błaszczyk
-->
<div class="container">
    <div class="main">
        <div class="row">
            <div class="col-md-12">
                <h2>Archiwum</h2>
            </div>
        </div>
        <div class="row"> 
            <div class="article-list col-md-8">
                <div>       
                <?php 
                    foreach($this->data as $article){
                        echo '
                        <div class="article-box">
                            <div class="article-head">
                                <div class="article-head-minibox">
                                    '. $article['title'] .'
                                </div>
                                <div class="article-head-minibox">
                                    '. $article['id_category'] .'
                                </div>
                                <div class="article-head-minibox">
                                    '. $article['data'] .'
                                </div>
                            </div>
                            <div class="article-content">
                                <p>
                                    '. $article['content'] .'
                                </p>
                                
                            </div>
                            <div class="article-foot">
                                <a href="'. $GLOBALS['base_url'] .'articles/read/'. $article['id_article'] .'" class="button">Więcej</a>
                                
                            </div>
                        </div>
                        ';
                    }
					
                ?>
                </div> 
            </div>
            
            <div class="adverts-box col-md-3">
                Reklama-box
            </div>
        </div>
    </div>
</div>
        
    