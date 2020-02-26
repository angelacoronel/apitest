<?php
$json = file_get_contents('http://rdapi.herokuapp.com/category/read.php');

$data = json_decode($json,true);
//rsort($data);
$list = $data['records'];
//rsort($list, function($a,$b){return $a->id > $b->id;});
//print_r($list);   
?>

<table border="1px">
    <tr>
        <th>Categories</th>
    </tr>
    <?php
foreach($list as $value){    
    ?>
    <tr>
        <td><a href="prodCat_data.php?id=<?php echo $value['id'];?>"><?php echo $value['name'];?></a></td>
    </tr> 
<?php
}
?>
</table>