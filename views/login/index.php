<!DOCTYPE html>
<!--
 Michał Błaszczyk
-->
<div class="container">
    <div class="main">
        <div class="row">
            <div class="col-md-12">
                <div class="simple-container">
                    <h2><legend>Logowanie</legend></h2>

                    <form class="form" id="login_form" action="<?php echo $GLOBALS['base_url']. 'login/result'; ?>" method="POST">
                        <div>
                            <label for="login">Login: </label><br />
                            <input type="text" name="login"/>
                        </div>
                        <div>
                            <label for="password">Hasło: </label><br />
                            <input type="password" name="password"/>
                        </div>

                        <input type="submit" value="Wyślij" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        
    
