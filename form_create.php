<?php
$json = file_get_contents('http://rdapi.herokuapp.com/category/read.php');

$data = json_decode($json,true);
$list = $data['records'];
?>
<div class="empty-div-sm"></div>
<div class="div-header">
    <div>
        <h1> Add New Product</h1>
    </div>
</div>
    <div class="row center">

            <div style="text-align: left;">
               
            </div>
            <div>
                <form action="process.php?action=newproduct" method="POST">
                    <div class="row y-center space-between">
                        <div>
                            Name: &nbsp; 
                        </div>
                        <div>
                            <input type="text" name="name" placeholder="name"/>
                        </div>                   
                    </div>
                    <div class="row y-center space-between">
                        <div>
                            Description: &nbsp; 
                        </div>
                        <div>
                            <input type="text" name="description" placeholder="description"/>                 
                        </div>
                    </div>
                    <div class="row y-center space-between">
                        <div>
                            Price:  &nbsp; 
                        </div>
                        <div>
                            <input type="text" name="price" placeholder="price"/>
                        </div>
                    </div>
                    <div class="row y-center space-between">
                        <div>Category: &nbsp; </div> 
                        <div>
                        <select name="category" required>
                            <?php
                                foreach($list as $value){?>
                                <option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
                            <?php
                                }
                            ?>
                            </select><br><br>
                        </div> 
                    </div>   
                    <div class="empty-div-sm"></div>
                    <div class="row center">
                        <div><input class="btn2 -primary -solid" type="submit" name="submit" value="Submit"/></div>     
                    </div>
                </form>
            </div>
    </div>

    
