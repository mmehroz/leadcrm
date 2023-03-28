<?php
header('Access-Control-Allow-Origin: *'); 

//echo $system_info[0]->system_title;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <meta charset="utf-8" />
    <title>Admin Panel</title>

    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- basic styles -->

    <link href="<?php echo base_url('public_html/assets/css/bootstrap.min.css" rel="stylesheet')?>" />
    <link rel="stylesheet" href="<?php echo base_url('public_html/assets/css/font-awesome.min.css')?>" />

    <!--[if IE 7]>
    <link rel="stylesheet"<?php echo base_url('public_html/assets/css/font-awesome-ie7.min.css')?>"/>
    <![endif]-->

    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="<?php echo base_url('public_html/assets/css/jquery.gritter.css')?>" />
    <!-- fonts -->

    <link rel="stylesheet" href="<?php echo base_url('public_html/assets/css/ace-fonts.css')?>" />

    <!-- ace styles -->

    <link rel="stylesheet" href="<?php echo base_url('public_html/assets/css/ace.min.css')?>" />
    <!--<link rel="stylesheet" href="<?php echo base_url('public_html/assets/css/font.css')?>" />-->
    <link rel="stylesheet" href="<?php echo base_url('public_html/assets/css/ace-rtl.min.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('public_html/assets/css/jquery-ui-1.10.3.full.min.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('public_html/assets/css/ace-skins.min.css')?>" />

    <!--[if lte IE 8]>
    <link rel="stylesheet" href="<?php echo base_url('public_html/assets/css/ace-ie.min.css')?>" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->

    <script src="<?php echo base_url('public_html/assets/js/ace-extra.min.js')?>"></script>

    <!-- Date Picker -->

    <link rel="stylesheet" href="<?php echo base_url('public_html/assets/css/datepicker.css')?>" />
    <!-- Dropdown Css -->
    <link rel="stylesheet" href="<?php echo base_url('public_html/assets/css/jquery-ui-1.10.3.custom.min.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('public_html/assets/css/chosen.css')?>" />


    <link rel="stylesheet" href="<?php echo base_url('public_html/assets/css/froala_editor.min.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('public_html/assets/css/froala_style.min.css')?>" />

<?php /* if($system_info[0]->system_image != "")
{?>
<link rel="icon" href="<?php echo base_url();?>/public_html/frontend/image/system/<?php echo $system_info[0]->system_image; ?>" type="image/x-icon" />
<?php 
} */?>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
    <script src="<?php echo base_url('public_html/assets/js/html5shiv.js')?>"></script>
    <script src="<?php echo base_url('public_html/assets/js/respond.min.js')?>"></script>
    <![endif]-->

</head>

