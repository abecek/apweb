<!DOCTYPE html>
<!--
 Michał Błaszczyk
-->
<div class="container">
    <div class="main">
        <div class="row">
            <div class="col-md-12">
                <div class="simple-container">
                    <h2><legend>Edytuj artykuł</legend></h2>
                        
                    <form class="" id="" action="<?php echo $GLOBALS['base_url']; ?>panel/editArticle" method="POST">
                        <div>
                            <b>Id: </b> <?php echo $this->data['id_article']; ?>
                            <input type="hidden" name="id_article" value="<?php echo $this->data['id_article']; ?>">
                        </div>
                        <div>
                            <label for="title">Tytuł: </label><br />
                            <textarea style="height: 100px; width: 500px;" name="title"><?php echo $this->data['title']; ?></textarea>
                        </div>
                        <div>
                            <label for="content">Treść: </label><br />
                            <textarea style="height: 200px; width: 500px;" name="content"><?php echo $this->data['content']; ?></textarea>
                        </div>
                        <div>
                            <label for="categories">Kategoria: </label><br />
                            <select name="id_category">
                                <?php
                                    foreach($this->cat as $cat){
                                        if($cat['id_category'] == $this->data['id_category']){
                                            echo '
                                                <option value="'. $cat['id_category'] .'" selected>'.  $cat['id_category'] .'</option>
                                            ';
                                        }
                                        else{
                                            echo '
                                                <option value="'. $cat['id_category'] .'">'.  $cat['id_category'] .'</option>
                                            '; 
                                        }
                                    }
                                ?>
                            </select>
                        </div>

                        <input type="submit" value="Wyślij" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        
    
