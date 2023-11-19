<h2> <i class="fa-solid fa-shop"></i> Thêm Loại </h2>
<div class="form-add">
    <form action="" enctype="multipart/form-data" method="POST">
        <input placeholder="Tên Loại" type="text" name="name" id=""><br>
        <input type="submit" name="them" value="thêm">
    </form>
    <?php
    if(isset($_POST['them'])){
        $name_cate = $_POST['name'];
         if($name_cate==""){
            echo"không để ô chống";
         }
    }
        
        ?>
</div>