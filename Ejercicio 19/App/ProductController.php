<?php
if(!isset($_SESSION))
    session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_POST["action"])) {
        header("Location: ./home");
        exit();
    }

    switch ($_POST["action"]) {
        case "create":
            if(!isset($_SESSION['data']) && $_SESSION['token'] != $_POST['token']) {
                header("Location: ../index.php");
                exit();
            }

            $name = $_POST["name"];
            $slug = $_POST["slug"];
            $description = $_POST["description"];
            $features = $_POST["features"];
            $brand = $_POST["brand"];
            $imageURL = $_FILES["image"]["tmp_name"];

            if (empty($name) || empty($slug) || empty($description) || empty($features)) {
                header("Location: ../home?status=1");
                exit();
            }

            $product = new ProductController();
            $product->create($name, $slug, $description, $features, $brand, $imageURL === "" ? "" : $imageURL);
            break;
        case "edit":
            if(!isset($_SESSION['data']) && $_SESSION['token'] != $_POST['token']) {
                header("Location: ../index.php");
                exit();
            }

            $id = $_POST["id"];
            $name = $_POST["name"];
            $slug = $_POST["slug"];
            $description = $_POST["description"];
            $features = $_POST["features"];

            if (empty($name) || empty($slug) || empty($description) || empty($features)) {
                header("Location: ../home?status=2");
                exit();
            }

            $product = new ProductController();
            $product->edit($id, $name, $slug, $description, $features);
            break;
        case "delete":
            if(!isset($_SESSION['data']) && $_SESSION['token'] != $_POST['token']) {
                header("Location: ../index.php");
                exit();
            }

            $id = $_POST["id"];
            
            $product = new ProductController();
            $product->delete($id);
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
        if ($encode) {
            return json_encode($response);
        }
        return $response;
    }

    static function create($name, $slug, $description, $features, $brand, $image)
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
                'brand_id' => $brand,
                'cover' => $image === "" ? "https://crud.jonathansoto.mx/storage/products" : new CURLFile($image),
                'categories[0]' => '',
                'categories[1]' => '',
                'tags[0]' => '',
                'tags[1]' => ''
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['data']['data']['token']
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        
        $code = json_decode($response, true)['code'];
        var_dump($code);
        if ($code == 4) {
            header("Location: detalles-productos.php/product/" . $slug);
        } else {
            header("Location: ../home?status=1");
        }
    }

    static function edit($id, $name, $slug, $description, $features)
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
            header("Location: detalles-productos.php/product/" . $slug);
        } else {
            header("Location: ../home?status=2");
        }
    }

    static function delete($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/' . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['data']['data']['token']
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        
        $code = json_decode($response, true)['code'];
        if ($code == 4) {
            header("Location: ../home");
        } else {
            header("Location: ../home?status=3");
        }
    }
}
