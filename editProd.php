<?php 
//get product profile
$id = $_GET['id'];
$json = file_get_contents('http://rdapi.herokuapp.com/product/read_one.php?id='.$id);

$data = json_decode($json,true);
$details = array('records' => $data);
$list = $details['records'];
//get category
$json1 = file_get_contents('http://rdapi.herokuapp.com/category/read.php');

$data1 = json_decode($json1,true);

$list1 = $data1['records'];
?>
   <div class="empty-view"></div>
   <h1>Edit</h1>
   <div class="empty-small"></div>
<div class="empty-small"></div>
<form action="editProd_pro.php?id=<?php echo $id;?>" method="POST">
Name: <input type="text" name="name" value="<?php echo $list['name'];?>" required><br><br>
<div class="empty-small"></div>
<div class="empty-small"></div>
Description:<input type="text" name="description" value="<?php echo $list['description'];?>" required><br><br>
<div class="empty-small"></div>
<div class="empty-small"></div>
Price:<input type="number" name="price" value="<?php echo $list['price'];?>" required><br><br>
<div class="empty-small"></div>
<div class="empty-small"></div>
Category:<select name="category" required>
        <option value="<?php echo $list['category_id'];?>"><?php echo $list['category_name'];?></option>
    <?php
        foreach($list1 as $value1){?>
        <option value="<?php echo $value1['id'];?>"><?php echo $value1['name'];?></option>
<?php
    }
?>
</select><br><br>
<div class="empty-small"></div>
<div class="empty-small"></div>
<input type="submit" name="submit" value="Update"/>

</form>
