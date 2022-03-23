<?php session_unset(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rolex Watches</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="main.css">
</head>
<body>

  <?php 
  include('./view/navbar.php');
  ?>

  <!-- Banner -->
  <section id="img-section">
    <div id="banner-area"></div>
  </section>

  <!-- Rolex Info -->
  <section id="info">
    <div class="container text-center">
      <div id="info">
        <p class="fw-bold">Experience a Rolex</p>
        <p class="h2 text-uppercase" style="letter-spacing: 2px;">ROLEX WATCHES</p>
        <p class="fw-light">Rolex watches are crafted from the finest raw materials and assembled with scrupulous attention to detail.
          Every componed is designed, developed and produced to the most exacting standarts
        </p>
      </div>
    </div>
  </section>

  <!-- All Producsts -->
  <section id="products">
    <div class="container text-center">
      <div class="row">

        <div class="row row-cols-lg-5 items">
          <?php
            foreach ($results as $key => $item) {
              echo '<div class="col-md-4 col-6 mt-4 p-0 item" data-id="'.$item['id'].'" role="button">';
                echo '<img src="./images/items/'.$item['model_number'].'.png" alt="" class="img-thumbnail m-2 p-3">';
                echo '<div class="caption fw-bold mb-5 mt-4">';
                echo '<p class="mb-0 small lh-1">Rolex</p>';
                echo '<p class="fs-6 mb-0 text-uppercase lh-1">'.$item['small_title'].'</p>';
                echo '</div>';
              echo '</div>';
            }
          ?>
        </div>

      </div>
    </div>
  </section>

  <!-- Product Update & Details -->
  <section id="single_product">
    <div class="container mt-3">
      <div class="row">
        <div class="col-md-6 p-3">
          <form action="">
            <input type="hidden" name="id" id="id">
            <div class="mb-4">
              <p class="fw-bold fs-6 lh-1 mb-0" for="small_title">Name</p>
              <input type="text" class="fw-light lh-1" name="small_title" id="#small_title" value="">
            </div>
            <div class="mb-4">
              <p class="fw-bold fs-6 lh-1 mb-0" for="model_case">Model Case</p>
              <input type="text" class="fw-light lh-1" name="model_case" id="#model_case" value="">
            </div>
            <div class="mb-4">
              <p class="fw-bold fs-6 lh-1 mb-0" for="water_resistance">WATER RESISTANCE</p>
              <input type="text" class="fw-light lh-1" name="water_resistance" id="#water_resistance" value="">
            </div>
            <div class="mb-4">
              <p class="fw-bold fs-6 lh-1 mb-0" for="movement">MOVEMENT</p>
              <input type="text" class="fw-light lh-1" name="movement" id="#movement" value="">
            </div>
            <div class="mb-4">
              <p class="fw-bold fs-6 lh-1 mb-0" for="caliber">CALIBER</p>
              <input type="text" class="fw-light lh-1" name="caliber" id="#caliber" value="">
            </div>
            <div class="mb-4">
              <p class="fw-bold fs-6 lh-1 mb-0" for="power_reserve">POWER RESERVE</p>
              <input type="text" class="fw-light lh-1" name="power_reserve" id="#power_reserve" value="">
            </div>
            <div class="mb-4">
              <p class="fw-bold fs-6 lh-1 mb-0" for="bracelet">BRACELET</p>
              <input type="text" class="fw-light lh-1" name="bracelet" id="#bracelet" value="">
            </div>
            <div class="mb-4">
              <p class="fw-bold fs-6 lh-1 mb-0" for="dial">DIAL</p>
              <input type="text" class="fw-light lh-1" name="dial" id="#dial" value="">
            </div>
          </div>
        </form>
        <div class="col-md-6 p-3">
            <img id="single_product_img" src="./images/items/100001.png" alt="product.png" class="img-thumbnail" value="">
        </div>
      </div>
    </div>
  </section>

    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
  $(document).ready(function(){

    $('#single_product').hide();

    $('body').on('click','.item',function() {
      $('#single_product').show();
      $('#info').hide();
      $('#products').hide();
      
  
      let id = $(this).data('id')
  
      $.ajax({
        url: "./index.php",
        type: "get",
        dataType: 'JSON',
        data: {
          act: 'get_record',
          id: id
        },
        success: function(response) {
          response = response[0];
 
          $('#id').attr('value',response['id']);
          $('input[name="small_title"]').val(response['small_title']).change(); 
          $('input[name="model_case"]').val(response['model_case']).change(); 
          $('input[name="water_resistance"]').val(response['water_resistance']).change(); 
          $('input[name="movement"]').val(response['movement']).change(); 
          $('input[name="caliber"]').val(response['caliber']).change(); 
          $('input[name="caliber"]').val(response['caliber']).change(); 
          $('input[name="power_reserve"]').val(response['power_reserve']).change(); 
          $('input[name="bracelet"]').val(response['bracelet']).change(); 
          $('input[name="dial"]').val(response['dial']).change(); 
          $('#single_product_img').attr("src", './images/items/'+response['model_number']+'.png');
        },
        error: function(e) {
          console.log(e);
        }
      });
      
  
    })

    $('body').on('click','.category-items',function() {
      $('#single_product').hide();
      $('#info').hide();
      $(".item" ).remove();
      $('#products').show();

      let id = $(this).data('id')
  
      $.ajax({
        url: "./index.php",
        type: "get",
        dataType: 'JSON',
        data: {
          id: id
        },
        success: function(response) {
          let items = '';

          $.each(response, function (i, item) {
            items += 
            '<div class="col-md-4 col-6 mt-4 p-0 item" data-id="'+item.id+'" role="button">'+
              '<img src="./images/items/'+item.model_number+'.png" alt="" class="img-thumbnail m-2 p-3">'+
              '<div class="caption fw-bold mb-5 mt-4">'+
                '<p class="mb-0 small lh-1">Rolex</p>'+
                '<p class="fs-6 mb-0 text-uppercase lh-1">'+item.small_title+'</p>'+
              '</div>'+
            '</div>'
          });
          $('.items').append(items);

        },
        error: function(e) {
          console.log(e);
        }
      });
    })

    $( "input" ).keyup(function () {
      setTimeout(function() {
        delaySuccess(data);
      }, 500);

      let id = $('#id').val()
      let val = $(this).val()
      let col = $(this).attr('name');

      // console.log(id +' - ' + val + ' - ' + col);

      $.ajax({
        url: "./index.php",
        type: "get",
        dataType: 'JSON',
        data: {
          act: 'update',
          id: id,
          col: col,
          val: val,
        },
        success: function(response) {
          console.log(response);
        },
        error: function(e) {
          console.log(e);
        }
      });
    });


  })
  
</script>

</html>