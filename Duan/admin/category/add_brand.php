
<h2> <i class="fa-solid fa-shop"></i> Thêm Hãng </h2>
<div class="form-add">
    <form action="" enctype="multipart/form-data" method="POST">
        <input placeholder="Tên Hãng" type="text" name="name" id="name"><br>
        <input type="submit" name="them" value="thêm">
    </form>
    <?php
    if(isset($_POST['them'])){
        $name_brand=$_POST['name'];
        if($name_brand==""){
           echo"không để ô chống";
        }
    }
   ?>
        
</div>