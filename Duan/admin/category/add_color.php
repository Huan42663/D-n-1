<h2> <i class="fa-solid fa-shop"></i> Thêm Màu </h2>
<div class="form-add">
    <form action="" enctype="multipart/form-data" method="POST">
        <input placeholder="Mên Màu" type="text" name="name" id=""><br>
        <input type="submit" name="them" value="thêm">
    </form>
    <?php
     if(isset($_POST['them'])){
        $name_color=$_POST['name'];
         if($name_color==""){
            echo"không để ô chống";
         }
        }
        ?>
</div>