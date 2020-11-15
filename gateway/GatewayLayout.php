<?php
    class GatewayLayout {
        public static function RequestToken($req, $data, $url) {
            $opts = array(
                'http'=>array(
                    'method' => $req,
                    'header' => "Content-Type: application/json\r\n".
                                "Authorization: ".$data->token."\r\n"
                )
            );
            
            $context = stream_context_create($opts);
            return file_get_contents($url, false, $context);
        }

        public static function Request($req, $data, $url) {
            $opts = array(
                'http'=>array(
                    'method' => $req,
                    'header' => "Content-Type: application/json\r\n",
                    'content' => $data->data
                )
            );
            
            $context = stream_context_create($opts);
            return print_r(file_get_contents($url, false, $context));
        }
    }
?>