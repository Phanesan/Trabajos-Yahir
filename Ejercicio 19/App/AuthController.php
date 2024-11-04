<?php
require '../Utils.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $action = $_POST["action"];

    switch ($action) {
        case "login":
            $user = new AuthController();
            $user->login($email, $password);
            break;
    }
}

class AuthController
{

    public function login($email, $password)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('email' => $email, 'password' => $password),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $json = json_decode($response, true);

        if($json['code'] == 2) {
            $_SESSION['data'] = $json;
            $_SESSION['token'] = generateToken();
            header("Location: ../home");
        } else {
            header("Location: ../index.php");
        }
    }
}
