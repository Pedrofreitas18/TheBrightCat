<?php 

require __DIR__ . '/vendor/autoload.php';

use \App\Http\Router;
use \App\Http\Response;
use \App\Http\Request;
use \App\Utils\View;
use \App\Model\Roupa;
use \App\Controller\Pages\Home;

define('URL','https://localhost/projeto');

if($_SERVER["HTTPS"] != "on")
{
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
}


//while($row = mysqli_fetch_assoc(Roupa::getRoupas())){
//    echo $row['nome'];
//}


View::init([
    'URL' => URL
]);

$obRouter = new Router(URL);

include __DIR__ . '/routes/pages.php';

$obRouter->run()->sendResponse();


?>
