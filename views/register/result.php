<!DOCTYPE html>
<!--
 Michał Błaszczyk
-->
<div class="container">
    <div class="main">
        <div class="row">
            <div class="simple-container">
                <h2><legend>Wynik rejestacji</legend></h2>
                <?php
                    if(empty($this->msg)){
                        echo '<p class="bg-success"><h3>Udało ci się zarejestrować, możesz teraz się zalogować.</h3></p>';
                    }
                    else{
                        echo '<p class="bg-danger">'.$this->msg.'</p>';
                    }
                ?>
            </div>
        </div>
    </div>
</div>
        
    
