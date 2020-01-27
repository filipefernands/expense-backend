<?php

namespace App\Utils;

class Messages {


    private static $messages = [
        // Account
        "success" => "Conta %s criada com sucesso.",
        "conflict_account" => "Conta %s já cadastrada.",
        "deleted" => "Conta %s excluída com sucesso.",

        // Category
        "NOT_FOUND_CATEGORY" => "Category %s não encontrada!",
        "CATEGORY_INACTIVE" => "Categoria %s inativa. Não pode ser usada.",
        "CATEGORY_EXISTS" => "Category %s já cadastrada.",
        
        // Subcategory 
        "DELETE_SUBCATEGORY" => "Subcategoria %s excluída com sucesso.",

        // Generic messages
        "updated" => "Registro atualizado com sucesso.",
        "error_updated" => "Não foi possível atualizar este registro. Tente novamente mais tarde.",
        "error_deleting" => "Erro ao excluír registro. Tente novamente mais tarde."

    ];

    
    public static function getMessage($key) {
        return self::$messages[$key];;
    }

    public static function getFormattedMessage($key, ...$var) {
        $message = vsprintf(self::$messages[$key], $var);
        
        return $message;
    }

}