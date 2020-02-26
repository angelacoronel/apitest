<?php
$json = file_get_contents('http://rdapi.herokuapp.com/category/read.php');

$data = json_decode($json,true);
$list = $data['records'];
?>
<div class="div-header">
    <div>
        <h1> Add New Product</h1>
    </div>
</div>

    <div class="col center">
        
        <div>
            <form action="process.php?action=newproduct" method="POST">
            <div class="empty-div-sm"></div>
            Name: <div><input type="text" name="name" placeholder="name"/></div>
            <div class="empty-div-sm"></div>
            Description: <div><input type="text" name="description" placeholder="description"/></div>
            <div class="empty-div-sm"></div>
            Price: <div><input type="text" name="price" placeholder="price"/></div>
            <div class="empty-div-sm"></div>
            Category: <div>
            <select name="category" required>
                <?php
                    foreach($list as $value){?>
                    <option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
                <?php
                    }
                ?>
                </select><br><br>
            </div>
            <div class="empty-div-sm"></div>
            <div><input class="btn -primary -solid" type="submit" name="submit" value="Submit"/></div>

            </form>
        </div>
    </div>