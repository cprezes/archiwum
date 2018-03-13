<?php

require ('stale.php');
Session::destroy();
header("Location: index.php");
