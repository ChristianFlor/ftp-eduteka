<?php
require('../config.php');
require_once('includes/funciones.php');

(isset($idU)) ? '' : header('Location: '.$serverName);

$token = $_POST['token'];
function getCaptcha($token)
{
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LdbmpkeAAAAAIyw0tUdmzsitOFwJ5A3eNEjP7Uw&response=" . $token);
    $datos = json_decode($response, true);
    return $datos;
}

$datos = getCaptcha($token);

// Tema de la rúbrica
$temas = $_POST['pregunta'];

    
    // OpenAI
    $apiKey = "xxxx";
    $url = "https://api.openai.com/v1/chat/completions";
    
      $preguntaSys = "";
    
    $preguntaDef = "
   Prompt
    ";
    
    $preguntaDef = $preguntaDef;
    
    $data = array(
        "model" => "gpt-3.5-turbo-16k-0613",   
        
            "messages" => array(
                array("role" => "system", "content" => $preguntaSys),
                array("role" => "user", "content" => $preguntaDef)
            )            
    );
    
    $headers = array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $apiKey
    );
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $response = curl_exec($ch);
    
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    } else {
    
    $decodedResponse = json_decode($response, true);
    $ResponseFinal = $decodedResponse['choices'][0]['message']['content'];
    $totalTokens = $decodedResponse[usage][total_tokens];
    
     
    
        /*  print "$preguntaDef<hr>";    
            print_r($resultado);
            print "<hr>Tokens: $totalTokens <hr>";    */
    
    curl_close($ch);
}
?>