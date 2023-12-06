<?php
namespace youngdev;
use Exception;
class AuthyClient {
    private $AppId;
    private $ApiKey;
    private $accessToken;

    const AUTH_URL = "http://localhost:5173/LoginWith/";
    const EXCHANGE_TOKEN_URL = "http://localhost:5000/ExchangeToken";

    public function __construct($AppId, $ApiKey) {
        $this->AppId = $AppId;
        $this->ApiKey = $ApiKey;
    }

    public function getUserData() {
        try {
            $this->validateAccessToken();

            $data = http_build_query([
                'accessToken' => $this->getaccessToken(),
            ]);
            $response = $this->performCurlRequest(self::EXCHANGE_TOKEN_URL, $data);
            return $response;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function test() {
        echo "test";
    }

    public function getUrlAuth() {
        return self::AUTH_URL . $this->getAppId();
    }

    public function getAppId() {
        return $this->AppId;
    }

    public function setAppId($value) {
        $this->AppId = $value;
    }

    public function getApiKey() {
        return $this->ApiKey;
    }

    public function setApiKey($value) {
        $this->ApiKey = $value;
    }

    public function getAccessToken() {
        return $this->accessToken;
    }

    public function setAccessToken($value) {
        $this->accessToken = $value;
    }

    private function validateAccessToken() {
        if ($this->accessToken === null) {
            throw new Exception("Access token doesn't exist, fetching user data failed", 1);
        }
    }

    private function performCurlRequest($url, $data) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $response = curl_exec($ch);

        if ($response === false) {
            throw new Exception('cURL Error: ' . curl_error($ch));
        }

        curl_close($ch);

        return $response;
    }
}