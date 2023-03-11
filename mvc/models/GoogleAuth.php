<?php
require_once 'vendor/autoload.php';

class GoogleAuth {

    protected $client;

    public function __construct() {
        $this->client = new Google_Client();
        $this->client->setClientId('381736684532-nvaeqmmgriog6ctndltmnbtat450ks1e.apps.googleusercontent.com');
        $this->client->setClientSecret('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');
        $this->client->setRedirectUri('http://localhost/Quanlythitracnghiem/auth/signin');
        $this->client->setScopes('email');
        $this->client->addScope('profile');
    }

    public function getAuthUrl() {

        return $this->client->createAuthUrl();
    }

    public function handleCallback($code) {
        try {
            $token = $this->client->fetchAccessTokenWithAuthCode($code);
            $this->client->setAccessToken($token['access_token']);

            $oauth = new Google_Service_Oauth2($this->client);
            $userInfo = $oauth->userinfo->get();

            // Lưu thông tin người dùng vào session hoặc database
            $_SESSION['user_email'] = $userInfo->email;
            $_SESSION['user_name'] = $userInfo->name;

            // Chuyển hướng đến trang chủ
            header('Location: ../');
            exit;
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }
}
?>