<!DOCTYPE html>
<!--
 Michał Błaszczyk
-->
<div class="container">
    <div class="main">
        <div class="row">
            <div class="col-md-12">
                <div class="simple-container">
                    <div>
                        <h2><legend>Lista artykułów</legend></h2>
                        <?php
                            foreach($this->data as $article){
                                echo '<div>
                                    <div>
                                        <b>Id artykułu: </b>'. $article['id_article'] .'
                                    </div>
                                    <div style="max-height: 70px; overflow: hidden;">
                                        <b>Tytuł: </b>'. $article['title'] .'
                                    </div>
                                    <div style="max-height: 70px; overflow: hidden;">
                                        <b>Treść: </b>'. $article['content'] .'
                                    </div>
                                    <div>
                                        <b>Id kategorii: </b>'. $article['id_category'] .'
                                    </div>
                                    <a href="'. $GLOBALS['base_url'] .'panel/edit/'. $article['id_article'] .'"><button type="button" class="btn btn-primary">Edytuj</button></a>
                                    <a href="'. $GLOBALS['base_url'] .'panel/deleteArticle/'. $article['id_article'] .'"><button type="button" class="btn btn-primary">Usuń Artykuł</button></a>
                                
                                </div><hr>';
                            }
                        ?>
                    </div>
                    
                    <div>
                        <div class="product-pagination text-center">
                            <nav>
                              <ul class="pagination">
                                
                                <?php
                                    $allpages =  $GLOBALS['allpage'];
                                    for($page = 1; $page <= $allpages; $page++){
                                        echo '<li><a href="http://localhost/apweb/panel/editArticles/'.$page.'">'.$page.'</a></li>';
                                    }
                                ?>
                                
                              </ul>
                            </nav>                        
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        
    
