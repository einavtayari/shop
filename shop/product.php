<?php require_once 'header.php'; ?>
<div class="col-lg-9">
  <?php
      $product_id = $_GET['id']; // מושך מהכתובת אתר 

      //משיכת מוצרים מטבלאות מוצרים ותמונות
      $sql = 'SELECT products.*, images.Title AS ImageTitle, images.Filename FROM products INNER JOIN images ON products.ID = images.ProductID WHERE products.ID = ' . $product_id;

      $products = mysqli_query($conn, $sql);
      $product = mysqli_fetch_assoc($products);
      //Array ( [ID] => x [Title] => x [SKU] => x [Price] => x [SalePrice] => x [Description] => x [ImageTitle] => x [Filename] => x )
  ?>
  <div class="card mt-4">
    <img class="card-img-top img-fluid" src="images/<?php echo $product['Filename']; ?>" alt="">
    <div class="card-body">
        <!--Title-->
      <h3 class="card-title"><?php echo $product['Title']; ?></h3>

      <!--Price-->
      <h4>
        <?php
          $price = $product['Price'];
          $saleprice = $product['SalePrice'];
          
          if ($saleprice > 0) {
        ?>
          <del>$<?php echo $price; ?></del>
          <ins>$<?php echo $saleprice; ?></ins>
        <?php
          } else {
        ?>
          <ins>$<?php echo $price; ?></ins>
        <?php
          }
        ?>
      </h4>

      <!--amount-->
      <input type="number" class="quantity" value="1" />

      <!--Add to cart btn-->
      <button class="btn btn-primary atc" type="button" class="btn btn-primary">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
        </svg>
        Add to cart
      </button>

      <!--Full description-->
      <p class="card-text"><?php echo $product['Description']; ?></p>

      <!--Stars-->
      <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
      4.0 stars
    </div>
  </div>
  <!-- /.card -->

  <div class="card card-outline-secondary my-4">
    <div class="card-header">
      Product Reviews
    </div>
    <div class="card-body">
    <?php
      $sql = 'SELECT * FROM reviews WHERE ProductID = ' . $product_id ;
      $reviews = mysqli_query($conn, $sql);
      //Array ( [ID] => x [Review] => x [Date] => x [Author] => x [ProductID] => x )
      foreach($reviews as $item){
    ?>
        <p><?php echo $item['Review'] ?></p>
        <small class="text-muted">Posted by <?php echo $item['Author'] ?> on <?php echo $item['Date'] ?></small>
        <hr>
    <?php
      }
    ?>
      <a id="write-btn" href="#" class="btn btn-success">Leave a Review</a>
    </div>
  </div>
  <!-- /.card -->

</div>
<!-- /.col-lg-9 -->

<script>
  $(document).ready(function() {

    //הוספת מוצר לעגלה 
    $('.atc').on('click', function() {
      $.ajax({
        url: 'add_to_cart.php',
        type: 'post',
        data: {
          product: <?php echo $product_id; ?>,
          quantity: $('.quantity').val()
        },
        success: function(res) {
          alert('Added to cart!');
        }
      });
    });


    //בלחיצה על כפתור הוספת תגובה 
    $('#write-btn').on('click', function(e) {
      e.preventDefault();
      alert('add review');
    });
  });

</script>

<?php require_once 'footer.php'; ?>