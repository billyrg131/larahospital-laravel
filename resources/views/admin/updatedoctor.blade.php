<!DOCTYPE html>
<html lang="en">
  <head>
	<base href="/public">
    @include('admin.css')
	<style>
		label{
			display: inline-block;
			width: 200px;

		}
	</style>
  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
      <div class="container-fluid page-body-wrapper">
		<div class="container" align="center" style="padding-top: 50px">
			<h1 style="font-size: 25px; margin-bottom: 10px">Update Doctor</h1>
			@if(session()->has('message'))
			<div class="alert alert-success">
				<button type="button" class="close btn-close" data-bs-dismiss="alert">X</button>
				{{session()->get('message')}}
			</div>
			@endif
			<form action="{{url('editdoctor', $data->id)}}" method="POST" enctype="multipart/form-data">
				@csrf
				<div style="padding: 15px">
					<label>Doctor's Name: </label>
					<input type="text" name="name" value="{{$data->name}}" placeholder="Doctor Name..." style="color: black" required="">
				</div>
				<div style="padding: 15px">
					<label>Phone Number: </label>
					<input type="text" name="phone" value="{{$data->phone}}" placeholder="Phone No..." style="color: black" required="">
				</div>
				<div style="padding: 15px">
					<label>Room Number: </label>
					<input type="text" name="room" value="{{$data->room}}" placeholder="Room No..." style="color: black" required="">
				</div>
				<div style="padding: 15px">
					<label>Specialty: </label>
					<input type="text" value="{{$data->specialty}}" name="specialty" style="color: black;" required=""/>
				</div>
				<div style="padding: 15px">
					<label>Doctor Photo: </label>
					<img src="/doctorimages/{{$data->image}}" alt="image" height="50" width="75">
				</div>
				<div style="padding: 15px">
					<label>Change Old Image: </label>
					<input type="file" name="file">
				</div>
				<div style="padding: 15px">
					
					<input type="submit" value="Submit" class="btn btn-success">
				</div>
			</form>
		</div>
	  </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>