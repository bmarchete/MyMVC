<?php
/**
 * Created by PhpStorm.
 * User: binho
 * Date: 07/01/2016
 * Time: 22:21
 */

namespace App\Control;

use Symfony\Component\HttpFoundation\Response;
use App\Model\Repository\PessoaRepository;

class PessoaController extends Controller
{

    public function index()
    {
        $pessoas = PessoaRepository::readAll();
        $r = $this->render('pessoa/index.html.twig', compact('pessoas'));

        return new Response($r);
    }

    public function save()
    {
       PessoaRepository::add(
           $this->request->request->get('nome'),
           $this->request->request->get('idade')
       );

        $pessoas = PessoaRepository::readAll();

        $r = $this->render('pessoa/index.html.twig', ['message'=>'Salvo', 'pessoas' => $pessoas]);

        return new Response($r);
    }
}