<?php

function imprimir_narvar(){

$salida = "
<div class='example3'>
  <nav class='navbar navbar-inverse navbar-fixed-top'>
    <div class='container'>
      <div class='navbar-header'>
        <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar3'>
          <span class='sr-only'>Toggle navigation</span>
          <span class='icon-bar'></span>
          <span class='icon-bar'></span>
          <span class='icon-bar'></span>
        </button>
        <a class='navbar-brand' href='index_user_identificado.php'><img src='aventonnegro.png'></a>
      </div>
      <div class='navbar-collapse collapse'>
        <ul id='ulnav' class='nav navbar-nav navbar-right'>
          <li><a href='index_mis_viajes.php'><span class='glyphicon glyphicon-briefcase'></span> Mis Viajes</a></li>
          <li><a href='#' onclick='comprobarCondiciones()'><span class='glyphicon glyphicon-map-marker'></span> Crear Viaje</a></li>
          <li><a href='buscarviaje'><span class='glyphicon glyphicon-search'></spa