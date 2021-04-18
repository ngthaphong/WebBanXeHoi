<?php
    require_once "./common_layout_top.php";  
    require_once "../db/car.class.php";
    // if(isset($_SESSION['cartItem']))
    // {
    //     echo "<pre />";
    //     var_dump($_SESSION['cartItem']);
    // }
    $tien = 0;
    $content = "";
?>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="../thuvien/js/jquery.min.js"></script>
<?php
    if(!isset($_SESSION['cartItem']) || count($_SESSION['cartItem']) < 1)
    {
        //Chưa tồn tại
       echo '<div class="header_bottom_right_images">';
?>       
        <div class="content-wrapper">		  
            <div class="content-top">
            <img src="../thuvien/images/cartnull.png" alt="">
            </div>
        </div>
        </div>
        
<?php   
?>

<?php
    //Đã tồn tại
    }   
    else
    {
?>
<div class="header_bottom_right_images">
        <h2>Danh sách giỏ hàng</h2><br/>
        <table class="table" style="text-align:center">
                <thead>
                    <tr>
                        <th scope="col"><div style="text-align:center">Mã xe</div></th>
                        <th scope="col"><div style="text-align:center">Tên xe</div></th>
                        <th scope="col"><div style="text-align:center">Hình ảnh</div></th>
                        <th scope="col"><div style="text-align:center">Số lượng</div></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
    <?php
        foreach ($_SESSION['cartItem'] as $item) {
    ?>
                    <tr>
                        <td style="vertical-align: middle"><input style="width:25px;border:0" type="text" disabled = "disabled" name="<?= $item['id']."1";?>" value="<?= $item['id'];?>"></td>
                        <td style="vertical-align: middle"><?= $item['name'];?></td>
                        <td style="width:50%;vertical-align: middle">
                            <div>
                                <img style="width:70%;min-width:85px" src="<?= $item['picture'];?>">
                            </div>
                            <div>
                                <label><?= $item['price']." VNĐ";?></label>
                            </div>
                        </td>
                        <td style="vertical-align: middle"><div class="input-group">
                                <span class="input-group-btn"> 
                                    <button style="margin-right:0px" type="button" class="btn btn-danger btn-number" data-type="minus" data-field="<?=$item['id'];?>"> 
                                        <span class="glyphicon glyphicon-minus"></span> 
                                    </button>
                                </span>
                                <input style="margin-top: 15px; min-width:40px;padding: 5px 10px;; text-align:center" data-field="<?=$item['id'];?>" name="<?=$item['id'];?>" class="form-control input-number" value=<?=$item['quantity']?> min="1" max="10" type="text"> 
                                
                                
                                    <span class="input-group-btn">    
                                        <button id="plus" type="button" class="btn btn-success btn-number" data-type="plus" data-field="<?=$item['id'];?>">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </button>
                                    </span>
                            </div>
                        </td style="vertical-align: middle">
                        <td style="vertical-align: middle"><a href="./xulyxoaGioHang.php?id=<?=$item['id']?>"><input class="btn btn-danger" type="button" name="delete" value="Xóa"></a></td>
                    </tr>
                    <tr>
 <?php
        $tien += (int)$item['price'] * (int)$item['quantity'];
        $content = $content.$item['name'].",";
        }
    echo '      
                </tbody>
            </table>';
        ?>
            <div>
                <a href="./trangchu.php" style="float:left"><input  class="btn btn-info" type="button" value="< Quay lại"></a>
                <a href="../vnpay_php/index.php?price=<?=$tien?>&content=<?=$content?>" style="float:right"><input class="btn btn-success" type="button" value="Thanh toán >"></a>
            </div>
        </div>
        <?php }?>
   



<script>
                //  $.ajax({
                //     type: 'POST',
                //     url: 'http://localhost:88/DoAn_MaNguonMo/Customer/Giaodien/xulycapnhatGioHang.php?id='+maxe,
                //     data: {id: maxe},
                //     contentType: 'application/json',
                //     error: function (err) {
                //         alert("error - " + err);
                //     },
                //     success: function () {
                //         return true;
                //     }
                // });         


        $( document ).ready(function() {    
            
            $('.btn-number').click(function(e){        
                e.preventDefault();
                var minValue =  parseInt($(this).attr('min'));        
                var maxValue =  parseInt($(this).attr('max'));        
                if(!minValue) minValue = 1;        
                if(!maxValue) maxValue = 10;                        
                var fieldName = $(this).attr('data-field');        
                var type  = $(this).attr('data-type');        
                var input = $("input[name='"+fieldName+"']");      
                var text_maxe = $("input[name='"+fieldName+"1"+"']") ;
                var maxe = parseInt(text_maxe.val());
                var currentVal = parseInt(input.val());
                

                if(type == 'minus') {                             
                    if(currentVal > minValue)
                    {                    
                        input.val(--currentVal).change();               
                    }                 
                    if(parseInt(input.val()) == minValue) 
                    {                    
                        $(this).attr('disabled', true);                
                    }                
                } 
                else if(type == 'plus') 
                {                
                    if(currentVal < maxValue) {                    
                        input.val(++currentVal).change();                  
                    }                
                    if(parseInt(input.val()) == maxValue) {                    
                        $(this).attr('disabled', true);                
                    }                
                }

                if(currentVal > 10 || currentVal <1)
                {
                    $.ajax({
                    type: 'POST',
                    url: 'http://localhost:88/DoAn_MaNguonMo/Customer/Giaodien/xulycapnhatGioHang.php?id='+maxe+"&quantity="+currentVal,
                    data: {id: maxe},
                    contentType: 'application/json',
                    success: function() {
                        // window.location.href = "http://localhost:88/DoAn_MaNguonMo/Customer/Giaodien/Giohang.php"
                        window.location.reload()
                    },
                    error: function (err) {
                        alert("error - " + err);
                    }
                });   
                }
            });    

            $('.input-number').focusin(function(){       
                $(this).data('oldValue', $(this).val());    
            });

            $('.input-number').change(function() 
            {                
                var fieldName = $(this).attr('data-field');  
                var minValue =  parseInt($(this).attr('min'));        
                var maxValue =  parseInt($(this).attr('max'));    
                var input = $("input[name='"+fieldName+"']");      
                if(!minValue) minValue = 1;        
                if(!maxValue) maxValue = 10;        
                var valueCurrent = parseInt($(this).val());       
                var text_maxe = $("input[name='"+fieldName+"1"+"']") ;
                var maxe = parseInt(text_maxe.val());         
                var name = $(this).attr('name');
                if(valueCurrent >= minValue) {
                    $(".btn-number[data-type='minus'][data-field='"+name+"']").attr('disabled', false)       
                } 
                else {                  
                    $(this).val($(this).data('oldValue')); 
                }
                        
                if(valueCurrent <= maxValue) {            
                    $(".btn-number[data-type='plus'][data-field='"+name+"']").attr('disabled', false)    
                } 
                else {                 
                    $(this).val($(this).data('oldValue')); 
                }       
                $.ajax({
                    type: 'POST',
                    url: 'http://localhost:88/DoAn_MaNguonMo/Customer/Giaodien/xulycapnhatGioHang.php?id='+maxe+"&quantity="+valueCurrent,
                    data: {id: maxe},
                    contentType: 'application/json',
                    success: function() {
                        // window.location.href = "http://localhost:88/DoAn_MaNguonMo/Customer/Giaodien/Giohang.php"
                        window.location.reload()
                    },
                    error: function (err) {
                        alert("error - " + err);
                    }
                });                  
            });    
            $(".input-number").keydown(function (e) {            
                // Allow: backspace, delete, tab, escape, enter and .            
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||                 
                // Allow: Ctrl+A                
                (e.keyCode == 65 && e.ctrlKey === true) ||                  
                // Allow: home, end, left, right                
                (e.keyCode >= 35 && e.keyCode <= 39)) {                     
                // let it happen, don't do anything                     
                    return;            
                }            
            // Ensure that it is a number and stop the keypress            
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {                
                    e.preventDefault();            
                }    
            });
        });
</script>
<?php
    require_once "./common_layout_bottom.php";
?>    