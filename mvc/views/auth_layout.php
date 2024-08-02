<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../public/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../public/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../public/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="../../public/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="../../public/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/util.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/main_long.css">
    <title><?php echo $data["title"] ?></title>
</head>

<body>
    <?php
            require_once "./mvc/views/pages/".$data["Page"].".php";
        ?>
</body>
<script src="../../public/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="../../public/vendor/bootstrap/js/popper.js"></script>
<script src="../../public/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../../public/vendor/select2/select2.min.js"></script>
<script src="../../public/vendor/tilt/tilt.jquery.min.js"></script>
<script>
$('.js-tilt').tilt({
    scale: 1.1
})
</script>
<!-- <script src="../js/mainn.js"></script> -->

</body>

</html>