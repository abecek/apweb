<!DOCTYPE html>
<!--
 Michał Błaszczyk
-->
<div class="container">
    <div class="main">
        <div class="row">
            <div class="col-md-12">
                <div class="box-title">
                    <h3>
                        <?php
                            echo $this->data['title'];
                        ?>
                    </h3>
                </div>
            </div>
        </div>
        <div class="row"> 
            <div class="article col-md-8">
                <div class="article-read-text">.
                    <p class="pull-left">
                        <?php
                            echo 'Dodano: '.$this->data['data'];
                        ?>
                    </p>
                    <hr>
                    <p>
                        <?php
                            echo $this->data['content'];
                        ?>
                    </p>
                </div>
                <div class="article-comments">
                    <?php
                        foreach($this->data['comments'] as $comment){
                            echo '
                                <div class="article-single-comment">
                                    <div class="pull-left"> <h4>Autor: @'. ucfirst($comment['login']) .' </h4></div>
                                    <div class="pull-right"> Data: '. $comment['data'] .'</div>
                                    <div style="clear: both;">'. $comment['content'] .'</div>
                                </div>
                                <hr/>';
                        }
                    ?>
                </div>
                
                <?php
                    if(Session::get('id_user')){
                        echo '
                            <div class="add-comment">
                                <form class="" action="'. $GLOBALS['base_url'] .'articles/addComment/'. $this->data['id_article'] .'" method="POST">
                                    <label for="content">Dodaj komentarz: </label><br />
                                    <input type="textarea" name="content"/>
                                    <input type="submit" value="Wyślij" />
                                </form>   
                            </div>';
                    }
                ?>    
  
            </div>
            
            <div class="adverts-box col-md-3">
                Reklama-box
            </div>
        </div>
    </div>
</div>
        
    