<?php
namespace App\Utils;

class ModelMapper {

    static function mapperFieldsInput($arr) {
        $fieldList = [];

        foreach ($arr as $key => $value) {
            $field = preg_replace("([A-Z])", "_$0", $key);
            $fieldList[strtolower($field)] = $value;
        }

        return $fieldList;
    }

}