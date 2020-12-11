<?php require 'header.php'; 
    if(!isset($_SESSION)){
        $cart = array();
    }
?>

<style>
    table img {
        width: 30px;
        margin-right: 10px;
    }
</style>

<div class="col-lg-9">
    <div class="card mt-4">
        <div class="card-body">
            <h3 class="card-title">My Cart</h3>
            <!--checkout table-->
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $cart = $_SESSION['cart'];
                        /*$cart[ מערך המכיל מערכי איי.די וכמות לכל פריט
                            [0]=> [ product number 1
                                [0]=>2 product id
                                [1]=>1 amount
                                  ]
                            ]
                        */
                        $total = 0;

                        //הוצאת כל פריט בעגלה 
                        foreach($cart as $item){
                           $sql = 'SELECT products.* , images.Title AS ImageTitle, images.Filename FROM products INNER JOIN images ON products.ID = images.ProductID WHERE products.ID = ' . $item[0]; // item[0] = id

                            $query = mysqli_query($conn,$sql);
                            $product = mysqli_fetch_assoc($query); // מכיל את הפריטים
                            $quantity = $item[1]; // amount of product

                            //PRICE
                            $price = $product['Price'];
                            $saleprice = $product['SalePrice'];

                            if ($saleprice > 0) {
                                $final_price = $saleprice;
                            } else {
                                $final_price = $price;
                            }

                            $total = $total + ($final_price * $quantity);
                    ?>
                        <tr class="item" id="item-row-<?php $item[0];?>">
                            <!--image-->
                            <td><img src="images/<?php echo $product['Filename'] ?>" alt="<?php echo $product['ImageTitle'] ?>"></td>

                            <!--amount-->
                            <td>
                                <div>
                                    <div class="input-group">
                                        <input id="quantity" type="number" class="col-2 form-control px-3" value="<?php echo $quantity; ?>">
                                        <div class="input-group-append">
                                            <button id="plus-btn" class="btn btn-outline-secondary" type="button"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                            </svg></button>
                                            <button id="minus-btn" class="btn btn-outline-secondary" type="button"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-dash" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/></svg></button>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <!--price-->
                            <td>$<?php echo number_format($final_price); ?></td>

                            <td><button id="remove-btn" class="btn btn-danger"><span aria-hidden="true">&times;</span></button></td>
                        </tr>    
                    <?php
                        }
                    ?>
                </tbody>

                <tfoot>
                    <td></td>
                    <td><button id="pay-btn" class="btn btn-info">Pay Now</button></td>
                    <td>$ <?php echo number_format($total); ?></td>
                    <td><button id="clear-btn" class="btn btn-danger">Clear Cart</button></td> 
                </tfoot>
            </table>
        </div>
    </div>
</div>


<script>
    $(document).ready(()=>{
        //delete item
        $("#remove-btn").on("click", function(){
                $("#item-row-<?php $item[0];?>").empty();                
        })



        //clear cart
        $("#clear-btn").on("click", function(){
            $(".item").empty();
            //TODO - Delete session 
        })





        //plus item
        $("#plus-btn").on("click", function(){
            alert("plus");
        })





        //minus item
        $("#minus-btn").on("click", function(){
            alert("minus");
        })



        //pay
        $("#pay-btn").on("click", function(){
            alert("pay");
        })
    })
    
</script>





<?php require 'footer.php'; ?>