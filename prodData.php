<?php 
$id = $_GET['id'];
$json = file_get_contents('http://rdapi.herokuapp.com/product/read_one.php?id='.$id);

$data = json_decode($json,true);
$details = array('records' => $data);
$list = $details['records'];

?>
   <div class="empty-view"></div>
<h1>Product Profile</h1> <a href="index.php?module=editProd&id=<?php echo $list['id'];?>"">EDIT</a><br>
<div class="empty-small"></div>
<div class="empty-small"></div>
<div class="empty-small"></div>
<div>
    <h2>Name:</h2> <?php echo $list['name'];?>
</div>
<div class="empty-small"></div>
<div class="empty-small"></div>
<div class="empty-small"></div>
<div>
    <h2>Price:</h2> <?php echo "P".$list['price'];?>
</div>
<div class="empty-small"></div>
<div class="empty-small"></div>
<div class="empty-small"></div>
<div>
    <h2>Description:</h2> <?php echo $list['description'];?>
</div>
<div class="empty-small"></div>
<div class="empty-small"></div>
<div class="empty-small"></div>
<div class="gallery-desc">
    <h2>Category:</h2> <?php echo $list['category_name'];?>
</div><br><br>
<div class="empty-view"></div>

<div class="empty-view"></div>
<a href="index.php?module=deleteProd&id=<?php echo $list['id'];?>"">DELETE</a>
