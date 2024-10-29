<?php
require('includes/auth.php');
logout();
header('Location: /index.php');
