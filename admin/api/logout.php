<?php
require('../database/connexion.php');

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page or another page
echo json_encode(['success' => true, 'redirect_url' => "login.php"]);
exit;