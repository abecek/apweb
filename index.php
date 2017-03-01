<?php

/*
 *  Michał Błaszczyk
 */
//error_reporting(0);
//print_r("<br><br><br><br><br><br>");

ob_start();
$bench = microtime(True);

require_once 'libs/BaseController.php';
require_once 'libs/BaseView.php';
require_once 'libs/BaseModel.php';

//autoloader klas
function __autoload($classname) {
    $filename = "./classes/" . $classname . ".php";
    require_once($filename);
}

//loader configu
if (file_exists('./config/config.ini')) {
    $config = parse_ini_file('./config/config.ini', true);
} 
else {
    throw new Exception('Nie mozna odczytac pliku config.ini');
}

//dla ulatwienia przy wrzucania na serwer
$GLOBALS['base_url'] = $config['url']['base_url'];

//polaczenie z baza (DO PRZEROBIENIA NA SINGLETON)
$db = new Database($config['db']);
$pdo = $db->get();

$GLOBALS['db'] = $config['db'];

//sesja
Session::init();
//print_r($_SESSION);

//obiekty
$user = new User($pdo, Session::get('id_user'));
$acl = new Acl();

//przetwarzanie url
$url = isset($_GET['url']) ? $_GET['url'] : 'index';
$url = rtrim($url, '/');
$url = filter_var($url, FILTER_SANITIZE_URL);
$url = explode('/', $url);

//ACL
if ($acl->check($url[0], $user)) {
    $file = 'controllers/' . $url[0] . '.php';
} else {
    $file = null;
}

//sprawdzenie czy istnieje dany kontroler
if (file_exists($file)) {
    require_once $file;
    $controller = new $url[0];

    if (isset($url[2])) {
        $controller->{$url[1]}($url[2]);
    } 
    else {
        if (isset($url[1])) {
            $controller->{$url[1]}();
        } 
        else {
            $controller->index();
        }
    }
} 
else {
    require_once 'controllers/myerror.php';
    $controller = new MyError();
    $controller->index('Podany adres nie istnieje lub nie masz do niego dostępu.');
}
$stop = microtime(True);
$time = $stop - $bench;

print_r("Czas wykonania: " . $time);
ob_end_flush();

?>


