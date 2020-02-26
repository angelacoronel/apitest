<?php
$json = file_get_contents('http://rdapi.herokuapp.com/category/read.php');

$data = json_decode($json,true);
$details = array('records'=>$data);
$list = $data['records'];
?>
<div class="div-header -stretch">
    
<div>
        <p> &nbsp; </p>
    </div>
    <div>
        <h1> Categories </h1>
    </div>
    <div>
        <p> &nbsp; </p>
    </div>
</div>
<table>
    <tr>
        <th><h3>Category Name</h3></th>
    </tr>
<?php
foreach($list as $value){
?>
    <tr>
        <td><?php echo $value['name'];?></td>
    </tr>
 
<?php
}
?>
</table>