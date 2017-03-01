<!DOCTYPE html>
<!--
 Michał Błaszczyk
-->
<div class="container">
    <div class="main">
        <div class="row">
            <div class="col-md-12">
                <div class="simple-container">
                    <h2><legend>Rejestracja</legend></h2>
                    <form class="form" id="register_form" action="<?php echo $GLOBALS['base_url']; ?>register/result" method="POST">
                        <div>
                            <label for="login">Login: </label><br />
                            <input required type="text" id="login" name="login"/>
                        </div>
                        <div>
                            <label for="password">Hasło: </label><br />
                            <input required type="password" id="password" name="password1"/>
                        </div>
                        <div>
                            <label for="password">Powtórz hasło: </label><br />
                            <input required type="password" name="password2"/>
                        </div>
                        <hr>
                        
                        <div>
                            <label for="email">Email: </label><br />
                            <input required type="email" name="email"/>
                        </div>
                        <div>
                            <label for="name">Imie: </label><br />
                            <input required type="text" id="name" name="name"/>
                        </div>
                        <div>
                            <label for="surname">Nazwisko: </label><br />
                            <input  required type="text" id="surname" name="surname"/>
                        </div>

                        <input class="button" type="submit" value="Wyślij" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


