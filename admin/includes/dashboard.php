<div class="content-wrapper">
 <div class="content-wrapper">
  <div class="page-header">
  </div>
  <div class="row">
    <div class="col-md-4 stretch-card grid-margin">
      <div class="card bg-gradient-danger card-img-holder text-white">
        <div class="card-body">
          <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
          <h4 class="font-weight-normal mb-3">Danh Mục <i></i></h4>
          <h2 class="mb-5">
            <?php
            $category = new category();
            $categoryCount = $category->countCategories();     
            echo $categoryCount;
            ?>
          </h2>
        </div>
      </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
      <div class="card bg-gradient-info card-img-holder text-white">
        <div class="card-body">
          <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
          <h4 class="font-weight-normal mb-3">Sản Phẩm </h4>
          <h2 class="mb-5">
            <?php         
            $Products = new Products();        
            $countProducts = $Products->countProducts();
            echo $countProducts;
            ?>
          </h2>
        </div>
      </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
      <div class="card bg-gradient-success card-img-holder text-white">
        <div class="card-body">
          <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
          <h4 class="font-weight-normal mb-3">Người Dùng </h4>
          <h2 class="mb-5">
            <?php
            $User = new User();
            $countUsers = $User->countUsers();
            echo $countUsers;
            ?>
          </h2>
        </div>
      </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
      <div class="card bg-gradient-success card-img-holder text-white">
        <div class="card-body">
          <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
          <h4 class="font-weight-normal mb-3">Danh mục bài viết </h4>
          <h2 class="mb-5">
            <?php          
            $blogcategories = new blogcategories();        
            $countblog = $blogcategories->countblog();
            echo $countblog;
            ?>
          </h2>
        </div>
      </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
      <div class="card bg-gradient-success card-img-holder text-white">
        <div class="card-body">
          <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
          <h4 class="font-weight-normal mb-3">Danh sách bài viết </h4>
          <h2 class="mb-5">
            <?php
            $postBlog = new postBlog();
            $countPosts = $postBlog->countPosts();
            echo $countPosts;
            ?>
          </h2>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-md-7 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
        <?php
        $product = new Products();
        $category = new category();
        $categories = $category->getList();
        $data = [];
        $labels = [];
        foreach ($categories as $cate) {
          $cateID = $cate['id'];
          $cateName = $cate['categoryName'];
          $productCount = $product->countProductsByCategory($cateID); 
          $data[] = $productCount;
          $labels[] = $cateName;
        }
        ?>

        <div class="row">
          <div class="col-md-12">
            <canvas id="categoryChart"></canvas>
          </div>
        </div>

        <script>
          var ctx = document.getElementById('categoryChart').getContext('2d');
          var data = {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
              label: 'Số lượng sản phẩm trong từng danh mục',
              data: <?php echo json_encode($data); ?>,
              backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
            }]
          };
          var options = {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          };
          var categoryChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: options
          });
        </script>
      </div>
    </div>
  </div>

  <?php
  $product = new Products();
  $category = new category();
  $categories = $category->getList();
  ?>
  <div class="col-md-5">
    <div class="row">
      <?php
      foreach ($categories as $cate) {
        $cateID = $cate['id'];
        $cateName = $cate['categoryName'];
        $productCount = $product->countProductsByCategory($cateID); 
        echo "<div class='col-md-6 grid-margin stretch-card'>
                <div class='card'>
                  <div class='card-body'>
                    <h4 class='card-title'> Tên danh muc : $cateName</h4>
                    <p class='card-description'>Số sản phẩm: $productCount</p>
                  </div>
                </div>
              </div>";
      }
      ?>
    </div>
  </div>
</div>

<!-- Custom CSS to adjust the size of card content -->
<style>
  .card-body {
    font-size: 14px; /* Adjust font size as needed */
  }

  .card-title {
    font-size: 18px; /* Adjust title font size */
  }

  .card-description {
    font-size: 14px; /* Adjust description font size */
  }
</style>

</div>