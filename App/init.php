<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require_once __DIR__ . '/../vendor/autoload.php';

/*
 * Inicialização ORM (php-activerecord)
 */
ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_connections(
        array(
            'development' => 'mysql://root:@localhost/revisao',
        )
    );
});


/*
 * Inicializaçao da estrutura de templating (TWIG)
 */
$loader = new Twig_Loader_Filesystem(__DIR__. '/../App/View');
$layout = new Twig_Environment($loader);
$layout->addGlobal('css', './../../css');
$layout->addGlobal('js', './../../js');

//inserção do template em variável global
$_SERVER['template'] = $layout;


/*
 * Criação do Front Controller
 */

$request = Request::createFromGlobals();
$response = '';
$uri = $request->getPathInfo();

if ($uri == '/') {

    $c = new \App\Control\PessoaController();

    if ($request->request->get('salvar')) {
        $response = $c->save();
    } else {
        $response = $c->index();
    }

} else {
    $html = '<html><body><h1>Page Not Found</h1></body></html>';
    $response = new Response($html, 404);
}

$response->send();