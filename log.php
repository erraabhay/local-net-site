<?php
$ip = $_SERVER['REMOTE_ADDR'];
$ua = $_SERVER['HTTP_USER_AGENT'];
$ref = $_SERVER['HTTP_REFERER'] ?? 'None';
$time = date("Y-m-d H:i:s");

$log = "$time | IP: $ip | UA: $ua | Ref: $ref\n";

file_put_contents("iplog.txt", $log, FILE_APPEND);

header("Content-Type: image/gif"); // Transparent 1x1 pixel response
echo base64_decode("R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==");
