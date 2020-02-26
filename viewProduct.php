<?php
$id = $_GET['id'];
$json = file_get_contents("http://rdapi.herokuapp.com/product/read_one.php?id=".$id);

$data = json_decode($json,true);
$details = array('records'=>$data);
$list = $details['records'];

?>
<style>
.btn{
    cursor:pointer;
    border: 1px solid black;
    width: fit-content;
    padding: 5px;
}
.btn a{
    text-decoration: none;
    color: black;
}
.btn:hover, a:hover{
    background-color: black;
    color: white;
}
</style>
<h1> Product Details  </h1>
<table class="no-border">
 <tr>
    <td> Name: </td>
    <td><?php echo $list['name'];?></td>
</tr>
<tr>
    <td> Description: </td>
    <td><?php echo $list['description'];?></td>
</tr>
<tr>
    <td> Price: </td>
    <td><?php echo $list['price'];?></td>
</tr>
<tr>
    <td> Category: </td>
    <td><?php echo $list['category_name'];?></td>
</tr>

</table>
<div class="empty-div-sm"></div>
<form class="row center ">
    <div class="btn" style="margin-right: 20px;" name="delete"><a href="process.php?action=delete&id=<?php echo $id;?>">Delete</a></div>
    <div class="btn" name="modify"><a href="index.php?module=modifyProduct&id=<?php echo $id;?>">Modify</a></div>
</form>