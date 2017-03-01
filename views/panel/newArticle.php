<!DOCTYPE html>
<!--
 Michał Błaszczyk
-->
<div class="container">
    <div class="main">
        <div class="row">
            <div class="col-md-12">
                <div class="simple-container">
                    <h2><legend>Nowy artykuł</legend></h2>

                    <form class="" id="" action="<?php echo $GLOBALS['base_url']; ?>panel/result" method="POST">
                        <div>
                            <label for="title">Tytuł: </label><br />
                            <textarea style="height: 100px; width: 500px;" name="title"></textarea>
                        </div>
                        <div>
                            <label for="content">Treść: </label><br />
                            <textarea style="height: 200px; width: 500px;" name="content"></textarea>
                        </div>
                        <div>
                            <label for="categories">Kategoria: </label><br />
                            <select name="id_category">
                                <?php
                                    foreach($this->data as $cat){
                                        echo '
                                            <option value="'. $cat['id_category'] .'">'.  $cat['id_category'] .' '.$cat['name'] .'</option>
                                        ';
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
        
    
