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
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

      <style type="text/css">
                .center
                {
                    margin: auto;
                    width: 70%;
                    text-align: center;
                    padding: 30px;
                }
                table,th,td
                {
                    border: 1px solid gray;
                }
                .th_dug
                {
                    font-size: 30px;
                    padding: 5px;
                    background: skyblue;
                }
                .img_deg
                {
                    height: 100px;
                    width: 100px;
                }
                .total_deg
                {
                    padding: 40px;
                    font-size: 20px;
                }
      </style>
   </head>
   <body>
        <div class="hero_area">
         <!-- header section strats -->
          @include('website.partials.header')


          <!-- order comfirm message -->
            @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert"
                    aria-hidden="true">x</button>
                    {{ session()->get('message') }}
                </div>
            @endif
        

        <div class="center">
                <table>
                        <tr>
                                <th class="th_dug">Product Title</th>
                                <th class="th_dug">Product Quantity</th>
                                <th class="th_dug">Price</th>
                                <th class="th_dug">Image</th>
                                <th class="th_dug">Action</th>
                        </tr>

                            <?php $totalprice=0; ?>

                         @foreach ($cart as $cart)   
                        <tr>
                                <td>{{ $cart->product_title }}</td>
                                <td>{{ $cart->quantity }}</td>
                                <td>${{ $cart->price }}</td>
                                <td><img class="img_deg" src="/product/{{ $cart->image  }}"></td>
                                <td>
                                    <a class="btn btn-danger" onclick="return confirm('Are you sure to remove this Product ?')"
                                     href="{{ route('remove.cart', $cart->id) }}">Remove Product</a>
                                </td>
                        </tr>

                        <?php $totalprice=$totalprice + $cart->price; ?>

                        @endforeach

                </table>
                <div class="total_deg">
                    <h1>Total Price : ${{ $totalprice }}</h1>
                </div>


                <div>

                    <h1 style="font-size: 25px; padding-botton: 15px">Proceed to Order</h1>
                    <a href="{{ route('cash.order') }}" class="btn btn-danger">Cash on Delivery</a>
                    <a href="{{ route('stripe',$totalprice) }}" class="btn btn-danger">Pay using Card</a>
                </div>





        </div>

      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>