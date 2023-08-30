<!DOCTYPE html>
<html lang="en">
  <head>
        <base href="/admin">
     @include('admin.partials.css')

        <style type="text/css">
                .title_dug
                {
                        text-align: center;
                        font-size: 27px;
                        font-weight: bold;
                        padding-bottom: 30px;
                }
                .table_deg
                {
                    border: 2px solid white;
                    width: 70%;
                    margin: auto;
                    padding-top: 50px;
                    text-align: center;
                }
                .th_dg
                {
                    background-color: red;
                }
                .img_size
                {
                    width: 50px;
                    height: 50;
                }
        </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->

          @include('admin.partials.sidebar')

      <!-- partial -->

          @include('admin.partials.header')
          <div class="main-panel">
            <div class="content-wrapper">
        <!-- partial -->
        <h1 class="title_dug">All Orders</h1>

        <table class="table_deg">
                <tr class="th_dg">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Product title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Payment Status</th>
                        <th>Delivery status</th>
                        <th>Image</th>
                        <th>Delivired</th>
                     
                </tr>

                @foreach ($order as $key=>$order)
                <tr>
                    <th>{{ $key+1 }}</th>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->product_title }}</td>
                    <td>{{ $order->qty }}</td>
                    <td>{{ $order->price }}</td>
                    <td>{{ $order->payment_status }}</td>
                    <td>{{ $order->delivery_status }}</td>
                    <td>
                        <img class="img_size" src="/product/{{ $order->image }}" alt="">
                    </td>
                    <div>
                        <td>
                            @if ($order->delivery_status=='processing')
                                <a href="{{ route('delivered',$order->id) }}" onclick="return confirm('Are you sure this product is delivered')" class="btn btn-primary">Delivered</a>
                                @else
                                    <p style="color: green;">Delivered</p>
                            @endif 
                        </td>
                    </div>
                </tr>
                @endforeach
        </table>
          
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->

      @include('admin.partials.script')

    <!-- End custom js for this page -->
  </body>
</html>