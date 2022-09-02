<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
      <div class="container-fluid page-body-wrapper">
		<div align="center" style="padding-top: 50px">
			<h1 style="font-size: 25px; margin-bottom: 10px">Appointments</h1>
			<table>
				<tr style="background-color: blue">
					<th style="padding: 10px">Customer Name</th>
					<th style="padding: 10px">Email</th>
					<th style="padding: 10px">Phone</th>
					<th style="padding: 10px">Doctor Name</th>
					<th style="padding: 10px">Date</th>
					<th style="padding: 10px">Message</th>
					<th style="padding: 10px">Status</th>
					<th style="padding: 10px">Approve</th>
					<th style="padding: 10px">Cancel</th>
				</tr>
				@foreach ($data as $appoint)
				<tr style="background-color: lightseagreen" align="center">
					<td style="padding: 5px">{{$appoint->name}}</td>
					<td style="padding: 5px">{{$appoint->email}}</td>
					<td style="padding: 5px">{{$appoint->phone}}</td>
					<td style="padding: 5px">{{$appoint->doctor}}</td>
					<td style="padding: 5px">{{$appoint->date}}</td>
					<td style="padding: 5px">{{$appoint->message}}</td>
					<td style="padding: 5px">{{$appoint->status}}</td>
					<td style="padding: 5px">
						<a href="{{url('approveappointment', $appoint->id)}}" class="btn btn-success" onclick="return confirm('Are you sure?')">Approve</a>
					</td>
					<td style="padding: 5px">
						<a href="{{url('cancelappoint', $appoint->id)}}" class="btn btn-danger">Cancel</a>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
	  </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>