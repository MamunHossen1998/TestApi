<table class="table table-bordered" id="showalldata">
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
