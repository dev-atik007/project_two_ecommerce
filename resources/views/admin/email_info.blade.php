<!DOCTYPE html>
<html lang="en">
  <head>
        <base href="/admin">
     @include('admin.partials.css')

        <style type="text/css">
            label
            {
                display: inline-block;
                /* width: 200px; */
                /* font-size: 15px; */
                /* font-weight: bold; */
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


        <h1 style="text-align: center; font-size: 25px">Sent Email to {{ $order->email }}</h1>

        <form>
        <div>
            <label style="padding-left: 35%; padding-top: 30px">Email Greeting :</label>
            <input type="text" name="greeting">
        </div>
        <div>
            <label style="padding-left: 35%; padding-top: 30px">Email First Line :</label>
            <input type="text" name="firstline">
        </div>
        <div>
            <label style="padding-left: 35%; padding-top: 30px">Email Body :</label>
            <input type="text" name="body">
        </div>
        <div>
            <label style="padding-left: 35%; padding-top: 30px">Email Button Name :</label>
            <input type="text" name="button">
        </div>
        <div>
            <label style="padding-left: 35%; padding-top: 30px">Email Url :</label>
            <input type="text" name="url">
        </div>
        <div>
            <label style="padding-left: 35%; padding-top: 30px">Email Last Line :</label>
            <input type="text" name="last">
        </div>
        <div style="padding-left: 55%; padding-top: 35px">
            <input type="submit" value="Sent Email" class="btn btn-primary">
        </div>
        </form>

          
          
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