<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        
        <title>{{ $title ?? 'Moovingo' }}</title>
    </head>
    <body class="overflow-x-hidden antialiased font-main">
        <div id="app">