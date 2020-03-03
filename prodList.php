<?php
$json = file_get_contents('http://rdapi.herokuapp.com/product/read.php');

$data = json_decode($json,true);
//rsort($data);
$list = $data['records'];
//rsort($list, function($a,$b){return $a->id > $b->id;});
//print_r($list); 
$limit = 10; // five rows per page
$offset = ($page - 1) * $limit; // offset
$total_items = count($list); // total items
$total_pages = ceil($total_items / $limit);
$final = array_splice($list, $offset, $limit); // splice them according to offset and limit
?>           
<div class="empty-small"></div>
			<form method="POST" action="index.php?module=prod">
				<input type="text" name="search">
				<input type="submit" name="submit" value="Search">	
			</form>
            <div class="empty-small"></div>
            <form method="POST" action="index.php?module=addProd">
				<input type="submit" name="submit" value="Add Product">	
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
	    $limit = 10; // five rows per page
$offset = ($page - 1) * $limit; // offset
$total_items = count($list); // total items
$total_pages = ceil($total_items / $limit);
$final = array_splice($list, $offset, $limit); // splice them according to offset and limit
    }else{
        $json = file_get_contents('http://rdapi.herokuapp.com/product/read.php');
        $data = json_decode($json,true);
        //rsort($data);
        $list = $data['records'];
	    $limit = 10; // five rows per page
$offset = ($page - 1) * $limit; // offset
$total_items = count($list); // total items
$total_pages = ceil($total_items / $limit);
$final = array_splice($list, $offset, $limit); // splice them according to offset and limit
    }
?>
<div class="empty-small"></div>
Page:<?php for($x = 1; $x <= $total_pages; $x++): ?>
    <a href='index.php?module=prod&page=<?php echo $x; ?>'><?php echo $x; ?></a>
<?php endfor; ?>
<div class="empty-small"></div>
<div class="empty-small"></div>
<table border="1px">
    <tr class="head">
        <th>Name</th>
        <th>Price</th>
        <th>Category</th>
    </tr>
    <?php
foreach($final as $value){
    
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
<div class="empty-small"></div>
