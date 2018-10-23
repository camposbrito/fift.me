<!DOCTYPE html>
<html lang="pt">

<head> 

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lavanderia <?=$this->session->userdata('lavanderia') ;?> - Mondrian Home Studio</title>

    <!-- Bootstrap Core CSS -->
    <link type="text/css" href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="<?= base_url(); ?>assets/css/datepicker.css" rel="stylesheet"> 
    <link href="<?= base_url(); ?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <link href="<?= base_url(); ?>assets/css/print.css" rel="stylesheet"  type="text/css" media="print"/>     
    
    <link href="<?= base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?= base_url(); ?>assets/css/morris.css" rel="stylesheet">
    
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css"/>


    <!-- Custom Fonts -->
    <link href="<?= base_url(); ?>assets/css/vendors/fontawesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url(); ?>assets/css/custom.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/signin.css" rel="stylesheet">
    <!--<link href="<?= base_url(); ?>assets/css/rodrigo.css" rel="stylesheet">-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head> 
<p class="no-print"><?= @TratarMsg($this->session->flashdata('msg')); ?></p>  
