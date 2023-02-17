<?php
require 'config/constants.php';

// Destroy all session and redirect user to the Home page
session_destroy();
header('Location: ' . ROOT_URL);
die();
