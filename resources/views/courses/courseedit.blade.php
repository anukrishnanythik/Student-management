@include('layouts.head')
<body>
@include('layouts.topbar')
  <br>

   <br>
   <br>
   <div class="container  mt-3">

<div class="row">


<div class="col-8">
<form action="{{route('courseupdate',encrypt($data->course_id))}}" method="post">
      @csrf
    <div class="form-group">
         <label for="Coursename" class="form-label">Coursename:</label>
         <input type="text" class="form-control" id="Coursename" name="Coursename"  value="{{$data->Coursename}}">
      </div>
      <div class="form-group">
         <label for="Teachername" class="form-label">Teachername:</label>
         <input type="text" class="form-control" id="Teachername" name="Teachername"  value="{{$data->Teachername}}">
      </div>
      <div class="form-group">
         <label for="Batchtime" class="form-label">Batchtime:</label>
         <input type="text" class="form-control" id="Batchtime" name="Batchtime"  value="{{$data->Batchtime}}">
      </div>
      <div class="form-group">
         <label for="Teachingday" class="form-label">Teachingday:</label>
         <input type="text" class="form-control" id="Teachingday" name="Teachingday"  value="{{$data->Teachingday}}">
      </div>
      <br>
      <div class="form-group">
         <button type="submit" class="btn btn-primary"> Update course</button>

      </div>

</form>

</div> </div> </div>


</body>
</html>
