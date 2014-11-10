<?php

// Obtenemos los mensajes de feedback como arrays.
$feedback_positive = Session::get('feedback_positive');
$feedback_negative = Session::get('feedback_negative');

// Mostramos primero los mensajes positivos
if (isset($feedback_positive)) {
    foreach ($feedback_positive as $feedback) {
        echo '<div class="feedback success">'.$feedback.'</div>';
    }
}

// Mostramos los mensajes negativos
if (isset($feedback_negative)) {
    foreach ($feedback_negative as $feedback) {
        echo '<div class="feedback error">'.$feedback.'</div>';
    }
}
