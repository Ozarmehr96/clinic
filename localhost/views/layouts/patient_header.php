<!DOCTYPE html>
<html lang="ru">

<head>
    <title>
        <?php  if (isset($_SESSION['user_type'])) echo $this->getPatientFI();
        else echo 'Авторизация';
        ?>
    </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/templates/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/templates/css/bootstrap-datetimepicker.min.css" />
    <link href="/templates/css/bootstrap.css" rel="stylesheet">
    <link href="/templates/css/loading.css" rel="stylesheet">
    <link href="/templates/css/patient-page.css" rel="stylesheet">
    <link href="/templates/css/style.css" rel="stylesheet">
    <script src="/templates/js/jquery.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <?php include_once(ROOT."/views/layouts/main_head.php");?>
