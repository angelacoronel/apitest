<?php
$json = file_get_contents('http://rdapi.herokuapp.com/product/read.php');

$data = json_decode($json,true);
$list = $data['records'];

if(isset($_POST['search'])){
    $search = $_POST['search'];
    }

    if(isset($search)){
        $json = file_get_contents('http://rdapi.herokuapp.com/product/search.php?s='.$search);
        $data = json_decode($json,true);
        $list = $data['records'];
    }else{
        $json = file_get_contents('http://rdapi.herokuapp.com/product/read.php');
        $data = json_decode($json,true);
        //rsort($data);
        $list = $data['records'];
    }
?>
<div class="empty-div-sm"></div>
<div class="row center">
        <h1> Product List </h1>
</div>
<div class="empty-div-sm"></div>
<div class="div-header -stretch">
    
    <a href="index.php?module=addProduct"><div class="btn -primary -solid">ADD PRODUCT</div></a>
    <div class="empty-div-sm"></div>
    
    <div class="quick_actions row t-data -title-2">
        <div class="search_bar-cntr">
        <form method="POST" action="index.php">
				<input type="text" placeholder="Search here..." class="search_bar t-data -content-small" name="search">
				<!--<input type="submit" name="submit" value="Search">-->	
			</form>
        </div>
        
    </div>
</div>
<div class="empty-div-sm"></div>
<table>
    <tr>
        <th><h3>Name</h3></th>
        <th><h3>Description</h3></th>
        <th><h3>Price</h3></th>
        <th><h3>Category</h3></th>
    </tr>
<?php
foreach($list as $value){
?>
    <tr>
        <td><b><a href="index.php?module=productDetails&id=<?php echo $value['id'];?>"><?php echo $value['name'];?></a></b></td>
        <td><?php echo $value['description'];?></td>
        <td><?php echo $value['price'];?></td>
        <td><a href="index.php?module=productDetails&id=<?php echo $value['id'];?>"><?php echo $value['category_name'];?></a></td>
    </tr>
 
<?php
}
?>
</table>
