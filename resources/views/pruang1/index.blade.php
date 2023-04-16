<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/bootstrap-5.3.0-alpha1-dist/css/app.css">
    </head>

    @if (Auth::user()->role=='Admin')
<nav class="navbar navbar-expand-lg bg-light" >
      <div class="container-fluid">
        <a class="navbar-brand" href="/dashboard">Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href= "#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Parkir Mall
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/mall1">Mall 1</a></li>
                <li><a class="dropdown-item" href="/mall2">Mall 2</a></li>
                <li><a class="dropdown-item" href="/mall3">Mall 3</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/pmasuk1">Petugas Masuk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/pruang1">Petugas Ruang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/pkeluar1">Petugas Keluar</a>
            </li>
          </ul>
          <form action="/logout" method="post">
            @csrf
            <button type="submit" class="btn btn-outline-success"><i class="bi bi-box-arrow-right"></i>Logout</button>
          </form>
        </div>
      </div>
    </nav>

    @else
    <nav class="navbar navbar-expand-lg bg-light" >
      <div class="container-fluid">
        <a class="navbar-brand" href="/mall1">Mall 1</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href= "#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Parkir Mall
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/mall1">Mall 1</a></li>
                <li><a class="dropdown-item" href="/mall2">Mall 2</a></li>
                <li><a class="dropdown-item" href="/mall3">Mall 3</a></li>
              </ul>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="/pmasuk1">Petugas Masuk</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="/pruang1">Petugas Ruang</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="/pkeluar1">Petugas Keluar</a>
            </li> -->
          </ul>
          <form action="/logout" method="post">
            @csrf
            <button type="submit" class="btn btn-outline-success"><i class="bi bi-box-arrow-right"></i>Logout</button>
          </form>
        </div>
      </div>
    </nav>
    @endif
    </html>
@extends('layouts.master')

@section('content')
    @if(session('sukses'))
        <div class="alert alert-success" role="alert">
        {{session('sukses')}}
        </div>
    @endif

<div class="row">
            <div class="col-6">
                <h1>DATA Parkir</h1>
            </div>
            <table class="table">
                <tr>
                    <th>ID Parkir</th>
                    <th>Plat Nomor</th>
                    <th>Ruang</th>
                    <th>Aksi</th>
                </tr>
                
                @foreach($data_parkir as $parkir)
                @if($parkir->sudah_masuk == 1)
                <tr>
                    @if($parkir->sudah_masuk == 0)
                        <tr style = 'background-color:green; color:white'>
                    @else
                        <tr style = 'background-color:red; color:white'>
                    @endif
                    <td>{{$parkir->id}}</td>
                    <td>{{$parkir->platNomor}}</td>
                    @if($parkir->sudah_masuk == 0)
                        <td>Belum masuk</td>
                    @else
                        <td>{{$parkir->ruangParkir}}</td>
                    @endif
                    <td>
                    <a href="/pruang1/{{$parkir->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                    </td>

                </tr>
                @endif
                @endforeach
                
            </table>
        </div>
    </div>
    
@endsection