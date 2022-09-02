<!DOCTYPE html>
<html lang="en">
  <head>
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
		
	  <div class="container" align='center' style="padding-top: 50px">
		<h1 style="font-size: 25px; margin-bottom: 10px">Add Doctors</h1>
		@if(session()->has('message'))
		<div class="alert alert-success">
			<button type="button" class="close btn-close" data-bs-dismiss="alert">X</button>
			{{session()->get('message')}}
		</div>
		@endif
		<form action="{{url('uploaddoctor')}}" method="POST" enctype="multipart/form-data">
			@csrf
			<div style="padding: 15px">
				<label>Doctor's Name: </label>
				<input type="text" name="doctorName" placeholder="Doctor Name..." style="color: black" required="">
			</div>
			<div style="padding: 15px">
				<label>Phone Number: </label>
				<input type="text" name="phone" placeholder="Phone No..." style="color: black" required="">
			</div>
			<div style="padding: 15px">
				<label>Room Number: </label>
				<input type="text" name="room" placeholder="Room No..." style="color: black" required="">
			</div>
			<div style="padding: 15px">
				<label>Specialty: </label>
				<select style="color: black; width: 200px" name="specialty" required="">
					<option>--Select---</option>
					<option value="Cardiology">Cardiology</option>
					<option value="Paediatrics">Paediatrics</option>
					<option value="ENT">ENT(Ear, nose & throat)</option>
					<option value="Orthopedics">Orthopedics</option>
					<option value="Dental">Dental</option>
					<option value="Neurology">Neurology</option>
					<option value="General Health">General Health</option>
					
				</select>
			</div>
			<div style="padding: 15px">
				<label>Doctor Photo: </label>
				<input type="file" name="file" required="">
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