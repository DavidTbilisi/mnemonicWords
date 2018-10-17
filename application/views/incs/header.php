<?php $this->load->helper('array'); ?>

<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
    <link rel="stylesheet" href="//cdn.web-fonts.ge/fonts/bpg-le-studio-02/css/bpg-le-studio-02.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <link rel="stylesheet" href="//cdn.web-fonts.ge/fonts/bpg-banner-supersquare-caps/css/bpg-banner-supersquare-caps.min.css">
	<link rel="stylesheet" href="<?php print_r(base_url('assets/css/main.css'));?>
">
	<title><?php print_r( element('site_name',$data, config_item('site_name'))  )?></title>
</head>
<body>

<div class="container">