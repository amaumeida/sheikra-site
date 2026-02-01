<?php
$data = json_decode(file_get_contents("php://input"), true);

$to = "amauri.sublime@gmail.com";
$subject = "New Petunia Puzzle Vote";

$message = "WALLET:\n".$data['wallet']."\n\nPOTS:\n";
foreach($data['pots'] as $i => $pot){
    $message .= "Pot ".($i+1).": ".implode(", ",$pot)."\n";
}

$headers = "From: Petunia Puzzle <no-reply@yourdomain.com>";

mail($to,$subject,$message,$headers);
echo json_encode(["status"=>"ok"]);

