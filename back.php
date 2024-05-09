<?php
require_once 'validate.php';


$update = (file_get_contents('php://input'));
$update = json_decode($update, true);

$auth = $update['_auth'];
//  data stacture : {"_auth":"query_id=AAEoYmlAAAAAAChiaUCtHoEq&user=%7B%22id%22%3A1080648232%2C%22first_name%22%3A%22%F0%9D%90%B4%F0%9D%91%85%F0%9D%90%B8%F0%9D%90%B9%20%F0%9D%91%86%F0%9D%91%86%22%2C%22last_name%22%3A%22%EF%B8%8F%22%2C%22username%22%3A%22DeAref%22%2C%22language_code%22%3A%22en%22%2C%22is_premium%22%3Atrue%2C%22allows_write_to_pm%22%3Atrue%7D&auth_date=1698440089&hash=563257ec28916390e62a07418ff3dd45274506f1180e844cfe34a8c5a01864a0","method":"checkInitData"}

$result['ok'] = false;

if (Validate::isSafe('YOUR_BOT_TOKEN_HERE', $auth)) {
    $result['ok'] = true;
    $result['coin']=15200;
   
   
}

header('Content-type: application/json');
echo json_encode($result);

