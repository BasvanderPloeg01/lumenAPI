<?php
session_start();
session_destroy();
echo "<h1>Session destroyed</h1>";