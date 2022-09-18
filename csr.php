<?php
$subject = array(
    "commonName" => $_POST['text'],
    "organizationName" => "Website",
    "organizationalUnitName" => "IT",
    "localityName" => "Earth",
    "stateOrProvinceName" => "Earth",
    "countryName" => "US",
    "emailAddress" => "support@" . $_POST['text']
);
 
// Generate a new private (and public) key pair
$private_key = openssl_pkey_new(array('private_key_type'=>OPENSSL_KEYTYPE_EC,'curve_name'=>prime256v1) );
$csr_resource = openssl_csr_new($subject, $private_key, array('digest_alg'=>'sha384') );
 
openssl_csr_export($csr_resource, $csr_string);
openssl_pkey_export($private_key, $private_key_string);
echo $csr_string."<br><br>";
echo $private_key_string."\n";
?>
