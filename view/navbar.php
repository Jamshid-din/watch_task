<!-- Navbar -->
<section id="navbar">
  <div class="container">
    <nav class="navbar navbar-expand-md navbar-white bg-white m-2">
      <div class="container-fluid">
        <a class="navbar-brand" href="./index.php">
          <div class="text-center">
            <img src="./images/logo.png" class="rounded" alt="...">
          </div>
        </a>
        
        <button class="navbar-toggler" id="navbar-toggler-btn" type="button">
          Menu <img style="width: 12px;" src="./images/menu.svg" alt="">
        </button>

        <div class="collapse navbar-collapse" id="">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link text-dark active" aria-current="page" href="./index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark category-items" data-id="all" href="#">All Items</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark category-items" data-id="6" href="#">Daydate</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark category-items" data-id="5" href="#">Daydate Pearl</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark category-items" data-id="4" href="#">Date Just</a>
            </li>
          </ul>
        </div>

        <div class="mobile_content">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link text-dark active" aria-current="page" href="./index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark category-items" data-id="all" href="#">All Items</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark category-items" data-id="6" href="#">Daydate</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark category-items" data-id="5" href="#">Daydate Pearl</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark category-items" data-id="4" href="#">Date Just</a>
            </li>
          </ul>
        </div>


      </div>
    </nav>
  </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $('.mobile_content').hide();
    $('body').unbind().on('click','#navbar-toggler-btn',function () {
      $('.mobile_content').toggle()

      $('.nav-link').on('click', function () {
        $('.mobile_content').hide()
      })
    })

  })
</script>