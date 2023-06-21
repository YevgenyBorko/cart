<?php
        session_start();
        $response = ['count' => count($_SESSION['savedProducts'])];
        echo json_encode($response);
?>