<?php
session_start();
session_unset();
session_destroy();
echo 'Dissconnected. <a href="/index.php"Home</a>';