<?php
class  endpoint {

    public static function endpointFactory($service, $endpoint) {
        return [
            "query" => "/".$service."/queries/".$endpoint,
            "action" => "/".$service."/actions/".$endpoint
        ];
    }
    
}