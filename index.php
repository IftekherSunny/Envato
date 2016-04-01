<?php

include __DIR__ . '/vendor/autoload.php';

$envato = new Sun\Envato('NPGEwrl7HDaVXwNjM2cHfM4rNKnhCrBZ');


$purchase = $envato->verifyPurchaseCode('b67d10b4-3976-455b-85da-9f3fcc15226e');

if($purchase) echo 'Purchased';
else echo 'Not purchased';
