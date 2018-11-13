<?php $this->load->helper('array'); ?>

<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="//cdn.web-fonts.ge/fonts/bpg-le-studio-02/css/bpg-le-studio-02.min.css">


    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.10/summernote-bs4.css" rel="stylesheet">

    <link rel="stylesheet" href="//cdn.web-fonts.ge/fonts/bpg-banner-supersquare-caps/css/bpg-banner-supersquare-caps.min.css">
	<link rel="stylesheet" href="<?php print_r(base_url('assets/css/main.css'));?>">

	<title><?php print_r( element('site_name',$data, config_item('site_name'))  )?></title>
</head>
<body>