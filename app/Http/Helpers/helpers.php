<?php
function format_uang($angka)
{
    return number_format($angka, 0, ',', '.');
}

function convert_date($value)
{
    return date('d M Y - H:i:s', strtotime($value));
}
function code_product($value, $nomor = null)
{
    return sprintf("%0" . $nomor . "s", $value);
}
