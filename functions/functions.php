<?php
function encodePwd(string $pwd){

    $salt = 'MonBerger3112@';
    $encodedPwd = hash('sha1', $pwd.$salt);

    return $encodedPwd;
}

?>