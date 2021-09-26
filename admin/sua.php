<?php
include('../header.php');
?>

<div class="main-content">
    <div class="wrapper">
        <div class="alert alert-success text-center" role="alert">
            <h2>Sửa</h2>
        </div>

  <!-- sửa -->
        <div class="container">
            <div class="col-md-5 mx-auto">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Họ và tên</span>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Chức Vụ</label>
                    <select class="form-select" id="inputGroupSelect01">
                        <option selected>Choose a position</option>
                        <option value="1">Trưởng Khoa</option>
                        <option value="2">Phó Trưởng Khoa</option>
                        <option value="3">Giảng Viên</option>
                    </select>
                </div>

                <div class="input-group mb-3"> 
                    <span class="input-group-text" id="basic-addon2">Email</span>
                    <input type="email" class="form-control" placeholder="Enter Email" aria-label="Recipient's username" aria-describedby="basic-addon2">          
                </div>

                <div class="input-group mb-3"> 
                    <span class="input-group-text" id="basic-addon2">Số điện thoại</span>
                    <input type="tel" class="form-control" placeholder="Enter Telephone" aria-label="Recipient's username" aria-describedby="basic-addon2">              
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Tên Đơn Vị</label>
                    <select class="form-select" id="inputGroupSelect01">
                        <option selected>Choose </option>
                        <option value="1">Bộ môn HTT</option>
                        <option value="2">Khoa CNTT</option>
                        <option value="3">Khoa Kinh Tế</option>
                        <option value="3">Khoa Cơ Khí</option>
                    </select>
                </div>
                <a class="btn btn-primary m-2" href="#" role="button">Update</a>
            </div>
        </div>        
    </div>
</div>