<?php
$id = $_GET['id'];
$json = file_get_contents('http://rdapi.herokuapp.com/product/read.php?category='.$id);

$data = json_decode($json,true);
//rsort($data);
$list = $data['records'];
//rsort($list, function($a,$b){return $a->id > $b->id;});
//print_r($list);   
?>

<table border="1px">
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Category</th>
    </tr>
    <?php
foreach($list as $value){
    
    ?>
    <tr>
        <td><a href="prodData.php?id=<?php echo $value['id'];?>"><?php echo $value['name'];?></a></td>
        <td><?php echo $value['price'];?></td>
        <td><?php echo $value['category_name'];?></td>
    </tr>
 
<?php
}
?>
</table>