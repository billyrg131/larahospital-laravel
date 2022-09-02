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
		<div class="container" style="padding-top: 50px;" align="center">
			@if(session()->has('message'))
			<div class="alert alert-success">
				<button type="button" class="close btn-close" data-bs-dismiss="alert">X</button>
				{{session()->get('message')}}
			</div>
			@endif
			<h1 style="font-size: 25px; margin-bottom: 10px;">Doctors</h1>
			<table style="margin-bottom: 40px;">
				<tr style="background-color: blue">
					<th style="padding: 10px">Doctor Name</th>
					<th style="padding: 10px">Phone</th>
					<th style="padding: 10px">Specialty</th>
					<th style="padding: 10px">Room</th>
					<th style="padding: 10px">Image</th>
					<th style="padding: 10px;">Actions</th>
				</tr>
				@foreach($doctors as $doctor)
				<tr style="background-color: lightseagreen" align="center">
					<td style="padding: 5px">{{$doctor->name}}</td>
					<td style="padding: 5px">{{$doctor->phone}}</td>
					<td style="padding: 5px">{{$doctor->specialty}}</td>
					<td style="padding: 5px">{{$doctor->room}}</td>
					<td style="padding: 5px"><img src="/doctorimages/{{$doctor->image}}" alt="image" width="75" height="50"></td>
					<td style="padding: 5px; display: grid; justify-items: center; gid-template-columns: 50px 50px;">
						<a href="{{url('updatedoctor', $doctor->id)}}" class="btn btn-success">Update</a> | <a href="{{url('deletedoctor', $doctor->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
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