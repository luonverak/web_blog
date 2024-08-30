<?php
function emptyImage()
{
    return asset('/asset/image/no_image.webp');
}
function Encryption($value)
{
    return base64_encode($value);
}
function Deccryption($value)
{
    return base64_decode($value);
}
