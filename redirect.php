<?php
  
// From URL to get redirected URL
$url = 'http://localhost/Assignment6/api/readapi.php';
  
// Initialize a CURL session.
$ch = curl_init();
  
// Grab URL and pass it to the variable.
curl_setopt($ch, CURLOPT_URL, $url);
  
// Catch output (do NOT print!)
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  
// Return follow location true
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
$html = curl_exec($ch);
  
// Getinfo or redirected URL from effective URL
$redirectedUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
  
// Close handle
curl_close($ch);
echo "Original URL:   " . $url . "<br/>";
echo "Redirected URL: " . $redirectedUrl . "<br/>";
