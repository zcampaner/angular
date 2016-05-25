<?php

$data = json_decode(file_get_contents("php://input"));
$username = mysql_real_escape_string($data->username);
$password = mysql_real_escape_string($data->password);
// $uemail = mysql_real_escape_string($data->email);

$con = mysql_connect('localhost', 'root', 'root');
mysql_select_db('angularcode_task', $con);

$qry_em = 'SELECT COUNT(*) as cnt from users where username ="' . $username . '"';
$qry_res = mysql_query($qry_em);
$res = mysql_fetch_assoc($qry_res);

if ($res['cnt'] == 0) {
    $qry = 'INSERT INTO users (username,password) values ("' . $usrname . '","' . $upswd . '"';
    $qry_res = mysql_query($qry);
    if ($qry_res) {
        $arr = array('msg' => "User Created Successfully!!!", 'error' => '');
        $jsn = json_encode($arr);
        print_r($jsn);
    } else {
        $arr = array('msg' => "", 'error' => 'Error In inserting record');
        $jsn = json_encode($arr);
        print_r($jsn);
    }
} else {
    $arr = array('msg' => "", 'error' => 'User Already exists with same email');
    $jsn = json_encode($arr);
    print_r($jsn);
}
?