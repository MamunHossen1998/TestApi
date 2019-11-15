<!DOCTYPE html>
<html lang="en" dir="ltr">
    <meta charset="utf-8" name="csrf-token" content="{{ csrf_token() }}">
    <title></title>
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  </head>
  <body>
   @php
     $sl = 0;
   @endphp
    <div class="container">
      <div class="row mt-5">
        <div class="col-12 m-auto">
        <div class="card">
          <div class="card-header">
            <div class="text-center">
              <h3>All Customer</h3>
            </div>
            <div class="pull-right">
              <button class="btn btn-primary" data-toggle="modal" data-target="#addcustomer">
                Add Customer
              </button>
          </div>
          <div class="card-body text-center" id="showalldatahere">
            <table class="table table-bordered">
              <thead>
                <th>Sl</th>
                <th>Name</th>
                <th>Email</th>
                <th>Pn Number</th>
                <th>District</th>
                <th>Action</th>
              </thead>
              <tbody>
                @foreach ($all_customers as $all_customer)
                  <tr>
                  <td>{{ $sl++ }}</td>
                  <td>{{ $all_customer->name }}</td>
                  <td>{{ $all_customer->pn_number }}</td>
                  <td>{{ $all_customer->email }}</td>
                  <td>{{ $all_customer->district }}</td>

                  <td>
                    <a href="{{ url("view/customer/data") }}" data-id="{{ $all_customer->id }}" id="view" class="btn btn-primary">view</a>
                    <a href="{{ url("edit/customer/data") }}" data-id="{{ $all_customer->id }}" id="edit" class="btn btn-info">Edit</a>
                    <a onclick="return confirm('Are you sure to delete')"  href="{{ url("delete/customer/data") }}" data-id="{{ $all_customer->id }}" id="delete" class="btn btn-danger">Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          {{ $all_customers->links() }}
        </div>
      </div>
      </div>
      </div>

    {{-- Add Customer --}}

  {{-- Modal --}}
  <div id="getalldata" data-url={{ url("get/customer") }}></div>
  <div id="getdatapagination" data-url={{ url("get/customer/pagination") }}></div>

<div class="modal fade" id="addcustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="" action="{{ url("add/customer") }}" method="post" id="addcustomerform">
      @csrf()
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
            </div>
            <input type="text" class="form-control" name="fname" placeholder="Username" >
          </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
            </div>
            <input type="text" class="form-control" name="pn_number" placeholder="Pn Number" >
          </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
            </div>
            <input type="email" class="form-control" name="email" placeholder="Email" >
          </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fa fa-map"></i></span>
            </div>
            <input type="text" class="form-control" name="district" placeholder="District" >
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    </form>
  </div>
</div>
<div class="load">
  <img src="{{ asset("img/th.jpg") }}" class="img-fluid loading">
</div>

{{-- view modal start --}}

<div class="modal fade" id="viewcustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="customername"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="">
         <tr>
           <th>Name:</th>
            <td class="name"></td>
           </tr>
         <tr>
           <th>Phone:</th>
            <td class="phone"></td>
          </tr>
         <tr>
           <th>Email:</th>
            <td class="email"></td>
          </tr>
         <tr>
           <th>Dist:</th>
            <td class="district"></td>
          </tr>
        </table>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
{{-- view modal end --}}

{{-- update Modal --}}

<div class="modal fade" id="updatecustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="" action="#" method="post" id="updatecustomerform">
      @csrf()
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
            </div>
            <input type="text" class="form-control" name="fname" placeholder="Username" >
          </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
            </div>
            <input type="text" class="form-control" name="pn_number" placeholder="Pn Number" >
          </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
            </div>
            <input type="email" class="form-control" name="email" placeholder="Email" >
          </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fa fa-map"></i></span>
            </div>
            <input type="text" class="form-control" name="district" placeholder="District" >
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    </form>
  </div>
</div>

{{-- <script src="{{ asset("js/app.js") }}"> </script> --}}
<script src="{{ asset("js/jquery-3.3.1.slim.min.js") }}"> </script>
<script src="{{ asset("js/popper.min.js") }}"> </script>
<script src="{{ asset("js/bootstrap.min.js") }}"> </script>

<script src="{{ asset("js/app.js") }}"> </script>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="{{ asset("script.js") }}"></script>

</body>
</html>
