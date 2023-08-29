<!DOCTYPE html>
<html lang="en">
  <head>
        <base href="/public">
        @include('admin.partials.css')

        <style type="text/css">
            .div_center
            {
                text-align: center;
                padding: 40px;
            }
            .font_size
            {
                font-size: 40px;
                padding-bottom: 40px;
            }
            .text_color
            {
                color: black;
                padding-bottom: 20px;
            }
            label
            {
                display: inline-block;
                width: 200px;
            }
            .div_design
            {
                padding-bottom: 15px;
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

                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">x</button>

                        {{ session()->get('message') }}
                    </div>
                @endif

                <div class="div_center">
                    <h1 class="font_size">Update Product</h1>

                <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="div_design">
                        <label>Product Title :</label>
                        <input class="text_color" type="text" name="title" value="{{ $product->name }}" required>
                    </div>
                    <div class="div_design">
                        <label>Product Description :</label>
                        <input class="text_color" type="text" name="description" value="{{ $product->description }}" required>
                    </div>
                    <div class="div_design">
                        <label>Product Price :</label>
                        <input class="text_color" type="number" name="price" value="{{ $product->price }}" required>
                    </div>
                    <div class="div_design">
                        <label>Discount Price :</label>
                        <input class="text_color" type="number" name="dis_price" value="{{ $product->discount_price }}" required>
                    </div>
                    <div class="div_design">
                        <label>Product Qty :</label>
                        <input class="text_color" type="number" name="qty" min="0" value="{{ $product->qty }}" required>
                    </div>
                    <div class="div_design">
                        <label>Product Category</label>
                        <select class="text_color" name="category" required>
                                <option value="{{ $product->category }}">{{ $product->category }}</option>

                                @foreach ($category as $category)
                                        <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                @endforeach
                        </select>
                    </div>

                    <div class="div_design">
                        <label>Current Product Image :</label>

                        <img style="margin:auto;" height="100" width="100" src="/public/{{$product->image}}">
                    </div>  
                    
                    <div class="div_design">
                        <label>Change Product Image :</label>
                        <input type="file" name="image" >
                    </div>
                    <div class="div_design">
                        <input type="submit" value="Update Product" class="btn btn-primary">
                    </div>
                </form>

                </div>

            </div>  
        </div>
    
        @include('admin.partials.script')
  </body>
</html>