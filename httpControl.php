<?php

use LDAP\Result;

Class httpControl
{
    private static $singleton;

    private const Authorization = '';

    private const SwitchBotUrl = 'https://api.switch-bot.com/v1.0/scenes/';
    
    private static $sceneData;

    /**
     * __construct
     * コンストラクタ
     * @return void
     */
    private function __construct(){}
    
    /**
     * __destruct
     * デストラクタ
     * @return void
     */
    private function __destruct()
    {
        if(isset(self::$singleton)){
            self::$singleton = null;
        }
    }
     
    /**
     * getInstance
     * インスタンス取得
     * @return object
     */
    public static function getInstance(){
        if(!isset(self::$singleton)){
            self::$singleton = new httpControl();
        }

        return self::$singleton;
    }
        
    /**
     * GetSecene
     * シーン一覧取得
     * @return mixed $result
     */
    public static function GetSecene(){

        if(isset(self::$sceneData)){
            return self::$sceneData;
        }

        $send_url = self::SwitchBotUrl;

        // receive.phpにJSON形式でデータを投げる
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: '.self::Authorization));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $send_url);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);

        self::$sceneData = curl_exec($ch);
        self::$sceneData = json_decode(self::$sceneData, true);

        curl_close($ch);
        return self::$sceneData;
    }
        
    /**
     * Request
     * シーン要求
     * @param  mixed $sceneId
     * @return mixed $result
     */
    public function Request(string $sceneId){
        $send_url = self::SwitchBotUrl.$sceneId.'/execute';

        // receive.phpにJSON形式でデータを投げる
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: '.self::Authorization));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $send_url);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);

        $result = curl_exec($ch);
        $result = json_decode($result, true);

        curl_close($ch);
        return $result;
    }
}


?>