<?php
    $catName = $_GET['id'];
    $json = file_get_contents('http://rdapi.herokuapp.com/product/search.php?s='.$catName);

    $data = json_decode($json,true);
    //rsort($data);
    $list = $data['records'];
?>
<div class="empty-view"></div>

			<form method="POST" action="index.php?module=catData&id=<?php echo $catName;?>">
				<input type="text" name="search">
				<input type="submit" name="submit" value="Search">	
			</form>
            <div class="empty-small"></div>
<?php
if(isset($_POST['search'])){
    $search = $_POST['search'];
    }

    if(isset($search)){
        $json = file_get_contents('http://rdapi.herokuapp.com/product/search.php?s='.$search);
        $data = json_decode($json,true);
        $list = $data['records'];
    }else{
        $json = file_get_contents('http://rdapi.herokuapp.com/product/search.php?s='.$catName);
        $data = json_decode($json,true);
        //rsort($data);
        $list = $data['records'];
    }
?>

<table border="1px">
    <tr class="head">
        <th>Name</th>
        <th>Price</th>
        <th>Category</th>
    </tr>
    <?php
foreach($list as $value){
    
    ?>
    <tr>
        <td><a href="index.php?module=product&id=<?php echo $value['id'];?>"><?php echo $value['name'];?></a></td>
        <td><?php echo $value['price'];?></td>
        <td><?php echo $value['category_name'];?></td>
    </tr>
 
<?php
}
?>
</table>