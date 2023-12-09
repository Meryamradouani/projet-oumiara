<?php
session_start();
// Détruire la session
session_destroy();
header('Location: index.php?logout=true');
exit();
?>