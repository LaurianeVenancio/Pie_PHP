<?php

namespace Core {

class Request {

    public function treat(){
        $verify = array_map(function ($item) {
            if (is_string($item)){
                return stripslashes(htmlspecialchars(trim($item)));
            }
            else{
                return $_REQUEST;
            }
        }, $_REQUEST);
        return $verify;
    }
}
}