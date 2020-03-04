<?php
$name = $_GET['name'] ?? $_POST['name'] ?? $_SESSION['name'] ?? $_COOKIE['name'] ?? 'Not Available';
$name = strip_tags($name);
echo htmlspecialchars($name);
