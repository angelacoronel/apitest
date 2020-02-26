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

<div class="empty-div-sm"></div>
<div class="div-header">
    <div>
        <h1> Modify Product</h1>
    </div>
</div>
    <div class="row center">

            <div style="text-align: left;">
               
            </div>
            <div>
                <form action="process.php?action=modify&id=<?php echo $id;?>" method="POST">
                    <div class="row y-center space-between">
                        <div>
                            Name: &nbsp; 
                        </div>
                        <div>
                            <input type="text" name="name" placeholder="name" value="<?php echo $list['name'];?>" />
                        </div>                   
                    </div>
                    <div class="row y-center space-between">
                        <div>
                            Description: &nbsp; 
                        </div>
                        <div>
                            <input type="text" name="description" placeholder="description" value="<?php echo $list['description'];?>"/>
                        </div>
                    </div>
                    <div class="row y-center space-between">
                        <div>
                            Price:  &nbsp; 
                        </div>
                        <div>
                            <input type="text" name="price" placeholder="price" value="<?php echo $list['price'];?>"/>
                        </div>
                    </div>
                    <div class="row y-center space-between">
                        <div>Category: &nbsp; </div> 
                        <div>
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
                    </div>   
                    <div class="empty-div-sm"></div>
                    <div class="row center">
                        <div><input class="btn2 -primary -solid" type="submit" name="submit" value="Submit"/></div>     
                    </div>
                </form>
            </div>
    </div>

    



