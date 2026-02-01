<?php
// Recebe os dados enviados do frontend
$data = json_decode(file_get_contents("php://input"), true);

$to = "amauri.sublime@gmail.com"; // Seu e-mail
$subject = "Nova submissão do Petunia Puzzle Garden";

$message = "";
foreach($data as $key => $value){
    $message .= "$key: $value\n";
}

$headers = "From: no-reply@petuniapuzzle.com\r\n" .
           "Reply-To: no-reply@petuniapuzzle.com\r\n" .
           "X-Mailer: PHP/" . phpversion();

if(mail($to, $subject, $message, $headers)){
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error"]);
}
?>
