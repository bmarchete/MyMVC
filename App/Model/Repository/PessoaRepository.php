<?php
/**
 * Created by PhpStorm.
 * User: binho
 * Date: 07/01/2016
 * Time: 22:19
 */

namespace App\Model\Repository;


use App\Helpers\RepositoryHelper;
use App\Model\Pessoa;

class PessoaRepository
{
    public static function add($nome, $idade)
    {
        Pessoa::create([
            'nome' => $nome,
            'idade' => $idade
        ]);
    }

    public static function readAll()
    {
        $data = Pessoa::all();
        return RepositoryHelper::objectsToArray($data);

    }
}