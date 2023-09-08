<?php
class Hangang{
    private $ENDPOINT;
    private $RESPONSE;

    public function __construct(){
        $this->ENDPOINT = "https://api.hangang.life/";
    }

    public function request(){
        $RESPONSE = file_get_contents($this->ENDPOINT);
        $this->RESPONSE = json_decode($RESPONSE, true);
    }

    public function getInfo(){
        $RESPONSE = $this->RESPONSE;
        $RETURN = array();

        if ($RESPONSE === null || $RESPONSE['STATUS'] !== "OK") {
            $RETURN['STATUS'] = "ERR";
            $RETURN['MSG'] = "API를 불러오는데 실패했습니다.";
        } else {
            $RETURN['STATUS'] = "OK";
            $RETURN['MSG'] = $RESPONSE['MSG'];
            $RETURN['CACHE_META'] = $RESPONSE['DATAs']['CACHE_META'];

            foreach($RESPONSE['DATAs']['DATA']['HANGANG'] as $LOCATION => $VALUE) {
                $RETURN['HANGANG'][$LOCATION] = array(
                    "TEMP" => $VALUE['TEMP'],
                    "LAST_UPDATE" => $VALUE['LAST_UPDATE'],
                    "PH" => $VALUE['PH']
                );
            }
        }
        return $RETURN;
    }
}
