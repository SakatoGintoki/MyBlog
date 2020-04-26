
<!--
*
*  INSPINIA - Responsive Admin Theme
*  version 2.7.1
*
-->

<!DOCTYPE html>
<html>
   
<head>
 <script src="/assets/inspinia/js/jquery-3.1.1.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="<?=Yii::$app->request->csrfToken?>">
    <title><?=Yii::$app->name?></title>

    <link href="/assets/inspinia/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/inspinia/font-awesome/css/font-awesome.css" rel="stylesheet">
	
    <!-- Toastr style -->
    <link href="/assets/inspinia/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="/assets/inspinia/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="/assets/inspinia/css/animate.css" rel="stylesheet">
    <link href="/assets/inspinia/css/style.css" rel="stylesheet">
	<script type="text/javascript">
        $(function(){
            //
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        });
    </script>
</head>