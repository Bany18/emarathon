<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name') }}</title>

	<!-- Meta -->
	<meta name="description" content="eMarathon">
	<meta name="author" content="Alban Binagwa">
	
	<!-- Custom CSS -->
	<link href="{{ URL::asset('dist/css/custom-styles.css') }}" rel="stylesheet">
	
	
	<script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
	
	<!-- Bootstrap4 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
	<!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
	
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<link href="{{ URL::asset('dist/css/ecims-theme.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('dist/css/bracket.css') }}">

</head>
<body>
<div id="app">
<app-component></app-component>
</div>
<script src="{{ asset('public/dist/js/app.js') }}" defer></script>
</body>
</html>