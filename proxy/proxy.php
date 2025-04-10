<?php
$hlsUrl = $_GET['url'];

// Set the CORS headers to allow cross-origin requests
header("Access-Control-Allow-Origin: *");

// Fetch the HLS stream content
$hlsContent = file_get_contents($hlsUrl);pre('$hlsContent');die;

// Output the HLS stream content
echo $hlsContent;