<?php require 'header.php'; ?>

<!--Carousle-->
<div class="col-lg-9">
  <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active">
        <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <div class="row">
    <?php 
      if(isset($_REQUEST['cat'])){
        $product_id = $_REQUEST['cat']; // מושך מהכתובת אתר 

        //שאילתא למשיכת כל המוצרים מטבלאת מוצרים וטבלאת תמונות
        $sql = 'SELECT products.*, images.Title AS ImageTitle, images.Filename FROM products INNER JOIN images ON products.ID = images.ProductID WHERE products.ID = ' . $product_id;
      } else {
        $sql = 'SELECT products.*, images.Title AS ImageTitle, images.Filename FROM products INNER JOIN images ON products.ID = images.ProductID';
      }

      $products = mysqli_query($conn, $sql);
      foreach($products as $product) {
        // $product = ID	Title	SKU	Price	SalePrice	Description	ImageTitle	Filename
    ?>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <!--photo-->
            <a href="product.php?id=<?php echo $product['ID']; ?>"><img class="card-img-top" src="images/<?php echo $product['Filename'];?>" alt="<?php echo $product['ImageTitle']; ?>"></a>

            <div class="card-body">
              <h4 class="card-title">

                <!--Title-->
                <a href="product.php?id=<?php echo $product['ID']; ?>"><?php echo $product['Title']; ?></a>
              </h4>

              <!--Price-->
              <h5> 
                <?php 
                  $price = $product['Price'];
                  $saleprice = $product['SalePrice'];
                  //אם יש מחיר הנחה הצג אותו
                  if($saleprice > 0){   
                ?>
                  <del>$<?php echo $price; ?></del>
                  <ins>$<?php echo $saleprice; ?></ins>
                <?php
                  } else {
                    // אחרת תציג מחיר רגיל
                ?>  
                  <ins>$<?php echo $price; ?></ins>
                <?php
                  }
                ?>
              </h5>

              <!--Description-->
              <?php
                $description = $product['Description'];
                if(str_word_count($description) > 10){
                  //מחזיר מערך שהמפתח הוא מיקום האות במחרוזת והערך הוא המילה
                  $words = str_word_count($description, 2);
                  $position = array_keys($words);//מייצר מערך לפי מפתחות
                  $final_desc = substr($description, 0 , $position[10]) . '...';
                } else {
                  $final_desc = $description;
                }
                echo $final_desc;
              ?>
            </div>
            
            <div class="card-footer">
              <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
            </div>
          </div>
          </div>
    <?php
      }
    ?>
  </div>
  <!-- /.row -->

</div>
<!-- /.col-lg-9 -->

<?php require_once 'footer.php'; ?>