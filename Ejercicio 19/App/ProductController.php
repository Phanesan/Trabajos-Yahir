<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $slug = $_POST["slug"];
    $description = $_POST["description"];
    $features = $_POST["features"];
    $image = $_POST["image"];

    switch ($_POST["action"]) {
        case "create":
            $product = new ProductController();
            $product->create($name, $slug, $description, $features, $image);
            break;
        case "edit":
            $product = new ProductController();
            $product->edit($id, $name, $slug, $description, $features);
            break;
    }
}

class ProductController
{
    static function getProducts()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['data']['data']['token']
            ),
        ));

        $response = curl_exec($curl);

        if ($response === false) {
            echo 'Error en cURL: ' . curl_error($curl);
        }
        curl_close($curl);
        return $response;
    }

    static function product($slug, $encode = false)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/slug/' . $slug,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['data']['data']['token']
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        if($encode) {
            return json_encode($response);
        }
        return $response;
    }

    static function create($name, $slug, $description, $features, $image)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'name' => $name,
                'slug' => $slug, 
                'description' => $description, 
                'features' => $features, 
                'brand_id' => '1', 
                'cover' => $image, 
                'categories[0]' => '3', 
                'categories[1]' => '4', 
                'tags[0]' => '3', 
                'tags[1]' => '4'),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['data']['data']['token']
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $code = json_decode($response, true)['code'];

        if ($code == 4) {
            header("Location: ../detalles-productos.php?slug=" . $slug);
        } else {
            header("Location: ../home.php?error=" . $code);
        }
    }

    static function edit($id, $name, $slug, $description, $features) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => 'name=' . $name . '&slug=' . $slug . '&description=' . $description . '&features=' . $features . '&brand_id=1&id=' . $id . '&categories%5B0%5D=3&categories%5B1%5D=4&tags%5B0%5D=3&tags%5B1%5D=4',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded',
            'Authorization: Bearer ' . $_SESSION['data']['data']['token']
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $code = json_decode($response, true)['code'];

        if ($code == 4) {
            header("Location: ../detalles-productos.php?slug=" . $slug);
        } else {
            header("Location: ../home.php?error=" . $code);
        }
    }
}
