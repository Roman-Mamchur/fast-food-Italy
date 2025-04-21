<!DOCTYPE html>
<html class="no-js" lang="zxx">
	<head>
		<!-- Meta Tags -->
		<meta charset="utf-8">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="Site keywords here">
		<meta name="description" content="#">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Site Title -->
		<title>{{$setting->app_name}}</title>

		<!-- Font -->
		<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

		<!-- Fav Icon -->
		<link rel="icon" href="{{asset($setting->favicon)}}">

		<!-- sherah Stylesheet -->
		<link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('admin/css/font-awesome-all.min.css')}}">
		<link rel="stylesheet" href="{{asset('admin/css/charts.min.css')}}">
		<link rel="stylesheet" href="{{asset('admin/css/datatables.min.css')}}">
		<link rel="stylesheet" href="{{asset('admin/css/jvector-map.css')}}">
		<link rel="stylesheet" href="{{asset('admin/css/slickslider.min.css')}}">
		<link rel="stylesheet" href="{{asset('admin/css/jquery-ui.css')}}">
		<link rel="stylesheet" href="{{asset('admin/css/reset.css')}}">
		<link rel="stylesheet" href="{{asset('cdn/select2.min.css') }}"  />
		<link rel="stylesheet" href="{{asset('admin/style.css')}}">
		<link rel="stylesheet" href="{{asset('cdn/toastr.min.css')}}"/>
		<link rel="stylesheet" href="{{asset('admin/css/bootstrapicons-iconpicker.css')}}" >

        <script src="{{asset('cdn/jquery-3.7.1.min.js')}}"></script>

		<script src="{{asset('cdn/sweetalert.min.js') }}"></script>
		<script src="{{asset('cdn/sweetalert.js') }}"></script>

        <style>
            .tox .tox-promotion,
            .tox-statusbar__branding{
                display: none !important;
            }
        </style>

	</head>
