<?php

namespace App\Utils;

class ListInformation {

    private static $totalElements = 10;
    private static $totalPage = 0;

    public function __construct($totalElementss, $totalPage) {
        self::$totalElements = $totalElementss;
        self::$totalPage = $totalPage;
    }

    static function  pagination() {
        return [            
            "totalElements" => self::$totalElements,
            "totalPage" => self::$totalPage
        ];
    }

}