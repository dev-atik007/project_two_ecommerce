<!DOCTYPE html>
<html>
   <head>
        <base href="/website">
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <link href="home/css/style.css" rel="stylesheet" />
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
   <body>
      
          @include('website.partials.header')
 
     
      <!-- product details list start -->

      <div class="col-sm-6 col-md-4 col-lg-4" style="margin:auto; width: 40%; padding: 30px">
                     <div class="box">
                
                        <div class="img-box" style="padding: 20px;">
                           <img src="product/{{ $product->image }}" alt="">
                        </div>
                        <div class="detail-box">
                           <h5>
                              {{ $product->name }}
                           </h5>

                           @if($product->discount_price!=null)
                              <h6 style="color:red">
                                 Discount price
                                 <br>
                                 ${{ $product->discount_price }}
                              </h6>

                              <h6 style="text-decoration: line-through; color:blue">
                                 Price
                                 <br>
                                 ${{ $product->price }}
                              </h6>
                           @else
                              <h6 style="color: blue">
                                 Price
                                 <br>
                                 ${{ $product->price }}
                              </h6>
                           @endif

                           <h6>Product Category :{{ $product->category }}</h6>
                           <h6>Product Details :{{ $product->description }}</h6>
                           <h6>Avaiable Quantity :{{ $product->qty }}</h6>
                    
                           <form action="{{ route('add.cart', $product->id) }}" method="post">
                                 @csrf

                                 <div class="row">
                                    <div class="col-md-4">
                                       <input type="number" name="qty" value="1" min="1" style="width: 100px">
                                    </div>
                                    <div class="col-md-4">
                                       <input type="submit" value="Add To Cart">
                                    </div>
                                 </div>
                              </form>
                           


                        </div>
                     </div>
                  </div>

      <!-- product details list end -->
     
      @include('website.partials.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         </p>
      </div>
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <script src="home/js/popper.min.js"></script>
      <script src="home/js/bootstrap.js"></script>
      <script src="home/js/custom.js"></script>
   </body>
</html>