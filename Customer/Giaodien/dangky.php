<?php
    ob_start();
    require_once "./common_layout_top.php";
    if(isset($_SESSION['loginuser']))
    {
        header("location:./trangchu.php");
    }
?>

  <!-- Custom fonts for this template-->
  <link href="..thuvienlogin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../thuvienlogin/css/sb-admin-2.min.css" rel="stylesheet">

<div class="header_bottom_right_images">
        <div class="content-wrapper">		  
            <div class="content-top">
                    <!-- Outer Row -->
    <div class="row justify-content-center">

<div class="col-xl-10 col-lg-12 col-md-9">

  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
          <div  style="padding: 1rem !important;">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Đăng Ký</h1>
            </div>
              <form  class="user" method="POST">

              <!-- Thiết lập các điều kiện cho phần đăng ký -->
              <?php
                      if(isset($_POST['submit']))
                      {
                        $name = $_POST['username'];
                        $pass = $_POST['password'];
                        $sdt = $_POST['phoneNumber'];
                        $cfpass = $_POST['cfpassword'];
                        $email = $_POST['emailUser'];
                        
                        $sqlUserName = "select * from customer where UserName='".$name."'";
                        $sqlUserEmail = "select * from customer where UserName='".$email."'";
                        $userName = executeSingleResult($sqlUserName);
                        $userEmail = executeSingleResult($sqlUserEmail);

                        //Kiểm tra xem đã tồn tại email hay username chưa
                        if($userEmail == null && $userName == null)
                        {
                            //Kiểm tra xem có nhập đầy đủ hay chưa
                            if($name != "" || $pass != "" || $sdt != "" || $cfpass != "" || $email != "")
                            {
                                //Kiểm tra xem pass và confirm pass có giống nhau không
                                if($cfpass != $pass)
                                {
                                    echo '<label style="color:red">Mật khẩu và xác nhận không đúng</label>';
                                }
                                //Nếu giống nhau và thỏa tất cả điều kiện thì tiến hành thêm vào database 
                                else
                                {
                                    $sql = 'insert into customer(UserName, Password, Email, PhoneNumber) values ("'.$name.'", "'.$pass.'", "'.$email.'", "'.$sdt.'")';
                                    execute($sql);
                                    echo '<label style="color:green">Đăng ký thành công</label>';
                                }
                            }
                        }  
                      }
              ?> 
                 <div class="form-group">
                <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Tên đăng nhập" >
                  <?php   
                    if(isset($_POST['submit']))
                    {
                        if($_POST['username'] == "")
                        {
                            echo '<label style="color:red">Tài khoản không được bỏ trống</label>';
                        }
                          else
                          {
                            if($userName != null)
                            {
                                echo '<label style="color:red">Tài khoản đã tồn tại</label>';
                             }  
                          }
                    }
                  ?>
              </div>
              <div class="form-group">
                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Mật khẩu">
                <?php   
                    if(isset($_POST['submit']))
                    {
                      if($_POST['password'] == "")
                        echo '<label style="color:red">Mật khẩu không được bỏ trống</label>';
                    }
                  ?>
              </div>

              <div class="form-group">
                <input type="password" class="form-control form-control-user" id="cfpassword" name="cfpassword" placeholder="Xác nhận mật khẩu">
                <?php   
                    if(isset($_POST['submit']))
                    {
                      if($_POST['cfpassword'] == "")
                        echo '<label style="color:red">Xác nhận mật khẩu không được bỏ trống</label>';
                    }
                  ?>
              </div>

              <div class="form-group">
                <input type="email" class="form-control form-control-user" id="emailUser" name="emailUser" placeholder="Địa chỉ email" >
                  <?php   
                    if(isset($_POST['submit']))
                    {
                        if($_POST['emailUser'] == "")
                        {
                            echo '<label style="color:red">Email không được bỏ trống</label>';
                        }
                          else
                          {
                            if($userEmail != null)
                            {
                                echo '<label style="color:red">Địa chỉ email đã tồn tại</label>';
                             }  
                          }
                    }
                  ?>
              </div>


              <div class="form-group">
                <input type="number" class="form-control form-control-user" id="phoneNumber" name="phoneNumber" placeholder="Số điện thoại" >
                  <?php   
                    if(isset($_POST['submit']))
                    {
                        if($_POST['phoneNumber'] == "")
                          echo '<label style="color:red">Sđt không được bỏ trống</label>';
                        else
                        {
                            if(strlen($sdt)  != 10)
                            {
                                echo '<label style="color:red">Sđt chỉ gốm 10 chữ số</label>';
                            }
                        }
                    }
                  ?>
              </div>

              </div>
            <input name="submit" value="Đăng ký" type="submit" style="margin-bottom: 50px; margin-right: 10px;color: white; cursor: pointer;" class="btn btn-primary btn-user btn-block">
            
          </div>
            <div class="col-lg-3"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
            </div>
    </div>
</div>
  <!-- Bootstrap core JavaScript-->
  <script src="../thuvienlogin/vendor/jquery/jquery.min.js"></script>
  <scrip src="../thuvienlogin/vendor/bootstrap/js/bootstrap.bundle.min.js"></scrip>

  <!-- Core plugin JavaScript-->
  <scrip src="../thuvienlogin/vendor/jquery-easing/jquery.easing.min.js"></scrip>

  <!-- Custom scripts for all pages-->
  <scrip src="../thuvienlogin/js/sb-admin-2.min.js"></scrip>
<?php
    require_once "./common_layout_bottom.php";
?>    