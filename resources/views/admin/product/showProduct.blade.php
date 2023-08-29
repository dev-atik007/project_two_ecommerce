<!DOCTYPE html>
<html lang="en">
  <head>
     @include('admin.partials.css')

    <style type="text/css">
        .center
        {
            margin: auto;
            width: 50%;
            border: 2px solid white;
            text-align: center;
            margin-top: 40px;
        }
        .font_size
        {
            text-align: center;
            font-size: 40px;
            padding-top: 20px;
        }
        .img_size
        {
            width: 110px;
            height: 110;
        }
        .th_color
        {
            background-color: skyblue;
        }
        .th_deg
        {
            padding: 15px;
        }
    </style>


  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->

            @include('admin.partials.sidebar')
             @include('admin.partials.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                @if (session()->has('message'))
                    <div class="alert alert-success">
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

                           {{ session()->get('message') }}
                    </div>
                    
                @endif

                <h2 class="font_size">All Products</h2>

                <table class="center">
                    <tr class="th_color">
                        <td class="th_deg">ID</td>
                        <td class="th_deg">Product Title</td>
                        <td class="th_deg">Description</td>
                        <td class="th_deg">Quantity</td>
                        <td class="th_deg">Category</td>
                        <td class="th_deg">Price</td>
                        <td class="th_deg">Discount Price</td>
                        <td class="th_deg">Product Image</td>
                        <td class="th_deg">Action</td>
                        
                    </tr>
                    @foreach ($product as $key=>$product)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->qty }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->discount_price }}</td>
                        <td>
                            <img class="img_size" src="/product/{{$product->image}}">
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{ route('product.edit', $product->id) }}">Edit</a>
                            <a onclick="return confirm('Are You Sure To Delete This')" class="btn btn-danger" href="{{ route('product.delete', $product->id) }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>


            </div>
      </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->

      @include('admin.partials.script')

    <!-- End custom js for this page -->
  </body>
</html>