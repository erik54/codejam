<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	
	<title><?php echo $title ?></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/mykaramel.min.css')?>" rel="stylesheet">

    <?php
      if(isset($nav_active) && $nav_active == "beranda"){
        echo "<link href='".base_url('assets/css/mykaramelx.css')."' rel='stylesheet'>";
      }
    ?>
    
    <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet">
   <style type="text/css">

        .picker__header select {
            display: inline-block !important;
        }
        nav.fill ul li a {
          position: relative;
        }

        nav.fill ul li a:after {
          position: absolute;
          bottom: 0;
          left: 0;
          right: 0;
          margin: auto;
          width: 0%;
          content: '.';
          color: transparent;
          background: #aaa;
          height: 1px;
        }
       nav.fill ul li a {
          transition: all 2s;
        }

        nav.fill ul li a:after {
          text-align: left;
          content: '.';
          margin: 0;
          opacity: 0;
        }
        nav.fill ul li a:hover {
          color: #fff;
          z-index: 1;
        }
        nav.fill ul li a:hover:after {
          z-index: -10;
          animation: fill 1s forwards;
          -webkit-animation: fill 1s forwards;
          -moz-animation: fill 1s forwards;
          opacity: 1;
        }

        @-webkit-keyframes fill {
          0% {
            width: 0%;
            height: 1px;
          }
          50% {
            width: 100%;
            height: 1px;
          }
          100% {
            width: 100%;
            height: 100%;
            background: #333;
          }
        }

        .mdl-data-table {
          position: relative;
          border: 1px solid rgba(0, 0, 0, 0.12);
          border-collapse: collapse;
          white-space: nowrap;
          font-size: 13px;
          background-color: rgb(255,255,255); }
          .mdl-data-table thead {
            padding-bottom: 3px; }
            .mdl-data-table thead .mdl-data-table__select {
              margin-top: 0; }
          .mdl-data-table tbody tr {
            position: relative;
            height: 48px;
            transition-duration: 0.28s;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-property: background-color; }
            .mdl-data-table tbody tr.is-selected {
              background-color: #e0e0e0; }
            .mdl-data-table tbody tr:hover {
              background-color: #eeeeee; }
          .mdl-data-table td, .mdl-data-table th {
            padding: 0 18px 12px 18px;
            text-align: right; }
            .mdl-data-table td:first-of-type, .mdl-data-table th:first-of-type {
              padding-left: 24px; }
            .mdl-data-table td:last-of-type, .mdl-data-table th:last-of-type {
              padding-right: 24px; }
          .mdl-data-table td {
            position: relative;
            vertical-align: middle;
            height: 48px;
            border-top: 1px solid rgba(0, 0, 0, 0.12);
            border-bottom: 1px solid rgba(0, 0, 0, 0.12);
            padding-top: 12px;
            box-sizing: border-box; }
            .mdl-data-table td .mdl-data-table__select {
              vertical-align: middle; }
          .mdl-data-table th {
            position: relative;
            vertical-align: bottom;
            text-overflow: ellipsis;
            font-size: 14px;
            font-weight: bold;
            line-height: 24px;
            letter-spacing: 0;
            height: 48px;
            font-size: 12px;
            color: rgba(0, 0, 0, 0.54);
            padding-bottom: 8px;
            box-sizing: border-box; }
            .mdl-data-table th.mdl-data-table__header--sorted-ascending, .mdl-data-table th.mdl-data-table__header--sorted-descending {
              color: rgba(0, 0, 0, 0.87); }
              .mdl-data-table th.mdl-data-table__header--sorted-ascending:before, .mdl-data-table th.mdl-data-table__header--sorted-descending:before {
                font-family: 'Material Icons';
                font-weight: normal;
                font-style: normal;
                font-size: 24px;
                line-height: 1;
                letter-spacing: normal;
                text-transform: none;
                display: inline-block;
                word-wrap: normal;
                -moz-font-feature-settings: 'liga';
                     font-feature-settings: 'liga';
                -webkit-font-feature-settings: 'liga';
                -webkit-font-smoothing: antialiased;
                font-size: 16px;
                content: "\e5d8";
                margin-right: 5px;
                vertical-align: sub; }
              .mdl-data-table th.mdl-data-table__header--sorted-ascending:hover, .mdl-data-table th.mdl-data-table__header--sorted-descending:hover {
                cursor: pointer; }
                .mdl-data-table th.mdl-data-table__header--sorted-ascending:hover:before, .mdl-data-table th.mdl-data-table__header--sorted-descending:hover:before {
                  color: rgba(0, 0, 0, 0.26); }
            .mdl-data-table th.mdl-data-table__header--sorted-descending:before {
              content: "\e5db"; }
        .mdl-data-table__select {
          width: 16px; }
        .mdl-data-table__cell--non-numeric.mdl-data-table__cell--non-numeric {
          text-align: left; }
   </style>
   	
	</head>

	<body class="hidden-sn deep-purple-skin grey lighten-3">