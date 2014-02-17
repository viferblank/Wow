<?php
echo strtolower("AKU ANAK BESAR");
?>
<?php
// format $data using RFC 2045 semantics
$data="Aa";
$new_string = chunk_split(base64_encode($data));
?>