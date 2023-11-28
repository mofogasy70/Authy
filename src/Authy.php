<?php
namespace youngdev;
 class AuthyClient{
    private $AppId;
    private $ApiKey;
    private $Url_Redirection;
    private $accessToken;
    public function __construct($AppId,$ApiKey) {
            $this->AppId = $AppId;
            $this->ApiKey = $ApiKey;    
    }
    public function getUserData($accessToken) {
        $url = "http://192.168.88.17:5000/ExchangeToken";
        $data = array(
            'accessToken' => $accessToken,
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($ch);
        if ($response === false) {
            echo 'Erreur : ' . curl_error($ch);
        }
        curl_close($ch);
        echo $response;
    }
    public function getUrlAuht(){
        return "http://192.168.88.17:5173/LoginWith/".$this->getAppId();
    }
    public function getAppId() {
        return $this->AppId;
    }
    public function setAppId($valeur) {
        $this->AppId = $valeur;
    }
    public function getApiKey() {
        return $this->ApiKey;
    }
    public function setApiKey($valeur) {
        $this->ApiKey = $valeur;
    }
    public function getUrl_Redirection() {
        return $this->Url_Redirection;
    }
    public function setUrl_Redirection($valeur) {
        $this->Url_Redirection = $valeur;
    }
    public function getaccessToken() {
        return $this->accessToken;
    }
    public function setaccessToken($valeur) {
        $this->accessToken = $valeur;
    }
}