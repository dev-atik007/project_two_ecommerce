<!DOCTYPE html>
<html lang="en">
  <head>
        @include('admin.partials.css')

     <style type="text/css">

            .div_center
            {
                text-align: center;
                padding-top: 40px;
            }
            .h2_font
            {
                font-size: 40px;
                padding-bottom: 40px;
            }
            .input_color
            {
                color: black;
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

                @if(session()->has('message'))

                    <button type="button" class="close" data-dissmiss="alert" aria-hidden="true">X</button>
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>

                @endif
          
                <div class="div_center">
                    <h2 class="h2_font">Add Category</h2>

                    <form action="{{ route('add.category') }}" method="POST">
                        @csrf

                        <input class="input_color" type="text" name="category" placeholder="White Category Name">

                        <input type="submit" class="btn btn-primary" name="name" value="Add Category">

                    </form>
                </div>

            </div>  
        </div>
    </div>
        @include('admin.partials.script')
  </body>
</html>