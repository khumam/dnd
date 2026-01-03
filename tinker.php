<?php

$imageUrl = "https://example.com/generated-image.jpg";
$name = substr($imageUrl, strrpos($imageUrl, '/') + 1);
dd($name);