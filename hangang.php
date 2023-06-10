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

        if ($RESPONSE === null || $RESPONSE['status'] !== "success") {
            $RETURN['STATUS'] = "ERR";
            $RETURN['MSG'] = "API를 불러오는데 실패했습니다.";
        } else {
            $RETURN['STATUS'] = "OK";
            $RETURN['MSG'] = "정상 처리되었습니다.";
            $RETURN['Check_UID'] = $RESPONSE['uid'];
            $RETURN['HANGANG'] = array(
                "TEMP" => $RESPONSE['temp'],
                "TIME" => $RESPONSE['time'],
            );
            $RETURN['NAKDONG'] = array(
                "TEMP" => $RESPONSE['nakdong_temp'],
                "TIME" => $RESPONSE['nakdong_time'],
            );
        }
        return $RETURN;
    }
}

