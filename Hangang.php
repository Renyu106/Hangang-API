<?php
class Hangang{
    private $ENDPOINT = "https://api.hangang.life/";
    private $RESPONSE;

    public function request(){
        $CURL = curl_init($this->ENDPOINT);
        curl_setopt_array($CURL, array(
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array('User-Agent: Renyu106/Hangang-API'),
          CURLOPT_SSL_VERIFYPEER => false,
          CURLOPT_SSL_VERIFYHOST => false,
        ));
        $this->RESPONSE = json_decode(curl_exec($CURL), true);
        curl_close($CURL);
    }

    public function getInfo(){
        $RESPONSE = $this->RESPONSE;
        $RETURN = array('STATUS' => "ERR", 'MSG' => "API를 불러오는데 실패했습니다.");
        if ($RESPONSE && $RESPONSE['STATUS'] === "OK") {
            $RETURN = array(
                'STATUS' => "OK",
                'MSG' => $RESPONSE['MSG'],
                'CACHE_META' => $RESPONSE['DATAs']['CACHE_META'],
                'HANGANG' => array_map(function($VALUE){
                    return array(
                        "TEMP" => $VALUE['TEMP'],
                        "LAST_UPDATE" => $VALUE['LAST_UPDATE'],
                        "PH" => $VALUE['PH']
                    );
                }, $RESPONSE['DATAs']['DATA']['HANGANG'])
            );
        }
        return $RETURN;
    }
}

