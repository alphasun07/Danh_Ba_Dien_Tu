<?php
include('../config/constants.php')
?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset="UTP-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Danh Bạ Điện Tử</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../learning_web/style.css"> 
    </head>
    <body>
        <div class="container-fluid"> 
            <div class="row header">
               
              <div class="col-md-12">
              <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                  <div class="container-fluid">
                    <a class="btn btn-success m-2" href="http://localhost/dhtl3/admin/" role="button"><i class="bi bi-house"></i></a>
                    
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" >
                        <span class="navbar-toggler-icon"></span>
                      </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                          <a class="nav-link active " href="index.php">Quản lý người dùng</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="http://localhost/dhtl3/admin/qldv.php">Quản lý Đơn Vị</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Quản lý tài khoản</a>
                        </li>

                      </ul>
                      <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-success" type="submit">Search</button>
                      </form>
                    </div>
                  </div>
                </nav>
              </div>
           
            </div>