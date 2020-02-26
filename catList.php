<?php
    $json = file_get_contents('http://rdapi.herokuapp.com/category/read.php');

    $data = json_decode($json,true);
    //rsort($data);
    $list = $data['records'];
//rsort($list, function($a,$b){return $a->id > $b->id;});
//print_r($list);   
?>
 <div class="empty-view"></div>
<table border="1px">
    <tr class="head">
        <th>Category</th>
        <th>Description</th>
    </tr>
    <?php
foreach($list as $value){
    
    ?>
    <tr>
        <td><a href="index.php?module=catData&id=<?php echo $value['name'];?>"><?php echo $value['name'];?></a></td>
        <td><?php echo $value['description'];?></td>
    </tr>
 
<?php
}
?>
</table>