<?php
$json = file_get_contents('http://rdapi.herokuapp.com/category/read.php');

$data = json_decode($json,true);
//rsort($data);
$list = $data['records'];
?>
   <div class="empty-view"></div>
<h1>Add Product</h1>
<div class="empty-small"></div>
<div class="empty-small"></div>
<form action="addProd_pro.php" method="POST">
<input type="text" name="name" placeholder="name" required><br><br>
<div class="empty-small"></div>
<div class="empty-small"></div>
<input type="text" name="description" placeholder="description" required><br><br>
<div class="empty-small"></div>
<div class="empty-small"></div>
<input type="number" name="price" placeholder="price" required><br><br>
<div class="empty-small"></div>
<div class="empty-small"></div>
<select name="category" required>
    <?php
        foreach($list as $value){?>
        <option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
<?php
    }
?>
</select><br><br>
<div class="empty-small"></div>
<div class="empty-small"></div>
<input type="submit" name="submit" value="submit"/>

</form>
