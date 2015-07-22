<?php
$password = 'takmetocurch';
$options = [
    'salt' => '156893991209213998123$', //write your own code to generate a suitable salt
    'cost' => 12 // the default cost is 10
];
$hash = password_hash($password, PASSWORD_DEFAULT, $options);
echo "$hash";


if (password_verify($password, $hash)) {
// Sukses!
echo "hasil";
}
else {
 echo "nggak";
}
?>
