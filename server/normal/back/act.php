<?php
include 'inc.php';
// header('Location: index.php/dashboard');
//

if (empty($_GET)) {
    $mobi = '/^(13[0-9]|147|15[0-3,5-9]|18[0-9]|17[1-3,6-8]|166|19[8,9])[0-9]{8}$/';
    $email = '/^\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}$/';

    if (preg_match($mobi, $_POST['user'])) {
        $loginType = array('phone' => $_POST['user']);
    } elseif (preg_match($email, $_POST['user'])) {
        $loginType = array('email' => $_POST['user']);
    } else {
        $loginType = array('nickname' => $_POST['user']);
    }
    $loginType['passwd'] = $_POST['pass'];
    $rs = pdo_get('shop_manager', $loginType);

    $_SESSION['login'] = $rs ? true : false;
    $_SESSION['info'] = $rs ?? 'null';

    // var_dump($rs,$loginType,$_SESSION);

    if (!$_SESSION['login']) {
        $_SESSION['loginInfo'] = 'pass';
        header('Location: index.php/login');
    } else {
        $_SESSION['loginInfo'] = 'success';
        $_SESSION['rights'] = explode(',', $rs['rights']);
        header('Location: '.($_SESSION['curr_page'] ?? 'index.php/dashboard'));
        $_SESSION['curr_page'] = null;
    }
}else{
    $postStr = file_get_contents("php://input");

    var_dump('<pre>',$postStr,$_POST,'</pre>');
    echo Json2Html(json_decode($_POST['cont'],true));
    /*
    $sql = '';
    switch ($_GET['type']) {
        case 'news':
            if (isset($_GET['id'])) {
                $sql = 'UPDATE `news` SET ';
            }else{
                $sql = 'INSERT INTO `news`';
            }
            break;

        default:
            // code...
            break;
    }*/
}
