<?php
/**
 * Created by PhpStorm.
 * User: binho
 * Date: 07/01/2016
 * Time: 15:28
 */

namespace App\Helpers;


class RepositoryHelper
{

    public static function objectsToArray($obj)
    {

        if($obj == null)
        {
            return [];
        }


        foreach ($obj as $result) {
            $retorno[] = $result->to_array();
        }

        return $retorno;
    }
}