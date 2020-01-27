<?php
namespace App\Utils;

class GenerateSQL {

    /**
     * Gera comando SQL com alias nas colunas removendo o underline para serializar 
     * o retorno do json sem o underline
     * @param string $table
     * @param array $columns
     * @param array $hidden
     * @return string $sqlCommand
     */
    static function aliasColname($columns, $hidden) {

        $alias = [];

        # Remove os campos que não serão retornados.
        foreach ($hidden as $col) {
            if (($key = array_search($col, $columns)) !== false) {
                unset($columns[$key]);
            }
        }
        
        foreach ($columns as $col) {
            $alias[] = $col .' as '. self::tagMappColnamForJson($col);
        }

        return $alias;

    }

    /**
     * Realiza o mapeando das colunas para JSON, removendo os underlines
     * @param $col
     * @return $newName
     */
    private static function tagMappColnamForJson($col) {
        $newName = str_replace("_", " ", $col);
        $newName = ucwords($newName);
        $newName = str_replace(' ', '', $newName);
        return lcfirst($newName);
    }

}