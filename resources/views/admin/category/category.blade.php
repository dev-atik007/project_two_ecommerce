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
            .center
            {
                margin: auto;
                width: 50%;
                text-align: center;
                margin-top: 40px;
                border: 3px solid white;
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

                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"
                        >x</button>
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

                <table class="center">
                    <tr>
                        <td>ID</td>
                        <td>Category Name</td>
                        <td>Action</td>
                    </tr>

                    @foreach ($data as $key=>$category)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $category->category_name }}</td>
        
                        <td>
                            <a onclick="return confirm('Are You Sure To Delete This')" class="btn btn-danger" href="{{ route('delete.category', $category->id) }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach

                </table>

            </div>  
        </div>
    </div>
        @include('admin.partials.script')
  </body>
</html>