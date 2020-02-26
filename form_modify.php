<?php
$id = $_GET['id'];
$json = file_get_contents("http://rdapi.herokuapp.com/product/read_one.php?id=".$id);

$data = json_decode($json,true);
$details = array('records'=>$data);
$list = $details['records'];

$json1 = file_get_contents('http://rdapi.herokuapp.com/category/read.php');

$data1 = json_decode($json1,true);

$list1 = $data1['records'];
?>
<div class="div-header">
    <div>
        <h1> Modify Product</h1>
    </div>
</div>


<div class="col center">
        <div>
            <form action="process.php?action=modify&id=<?php echo $id;?>" method="POST">
            <div class="empty-div-sm"></div>    
            Name: <div><input type="text" name="name" placeholder="name" value="<?php echo $list['name'];?>" /></div> 
            <div class="empty-div-sm"></div>  
            Description: <div><input type="text" name="description" placeholder="description" value="<?php echo $list['description'];?>"/></div> 
            <div class="empty-div-sm"></div> 
            Price: <div><input type="text" name="price" placeholder="price" value="<?php echo $list['price'];?>"/></div> 
            <div class="empty-div-sm"></div> 
            Category: <div>
            <select name="category" required>
                 <option value="<?php echo $list['category_id'];?>"><?php echo $list['category_name'];?></option>
                 <?php
                foreach($list1 as $value1){?>
                <option value="<?php echo $value1['id'];?>"><?php echo $value1['name'];?></option>
                <?php
                    }
                ?>
            </select>
            </div> 
            <div class="empty-div-sm"></div> 
            <input class="btn -primary -solid" type="submit" name="submit" value="Submit"/>
            </form>
        </div>
</div>


