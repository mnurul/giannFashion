<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> <?= $title ?> | Giant Fashion </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/') ?>use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/') ?>code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/') ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/') ?>dist/css/adminlte.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/') ?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/') ?>plugins/summernote/summernote-bs4.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/') ?>plugins/datatables/dataTables.bootstrap4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <style type="text/css">
    .sidebar-dark-primary {
      background-color: #1741b8 !important;
    }

    .select2-container--default .select2-selection--single,
    .select2-selection .select2-selection--single {

      height: 34px !important;
    }

    .btn-file {
      position: relative;
      overflow: hidden;
    }

    .btn-file input[type=file] {
      position: absolute;
      top: 0;
      right: 0;
      min-width: 100%;
      min-height: 100%;
      font-size: 100px;
      text-align: right;
      filter: alpha(opacity=0);
      opacity: 0;
      outline: none;
      background: white;
      cursor: inherit;
      display: block;
    }

    #img-upload {
      width: 200px;
      display: block;
      margin-bottom: 10px;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <!-- Site wrapper -->
  <div class="wrapper">