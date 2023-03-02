




@include('layouts.head')
<body>
@include('layouts.topbar')
  <br>



<div class="container-fluid">

<div class="row">


<div class="col-2 ">
  <br>
@include('layouts.sidebar')
</div>

<div class="col-10">
    <div class="row">

<div class="ms-5 col-8 ">

<div class="ms-5 text-center">

 <h4 > Name:  {{$data->Studentname}}</h4>
  <br>
 <h4> Phone:  {{$data->Phone}}</h4>


</div>
</div>

 <div class=" col-2 ">
    <img  class="border border-secondary" height='130' width='130' src="{{asset('storage/image/'.$data->image)}}"  alt="Doctor image">
</div>

</div>
<hr>

<br><br>
<div class="row">

  <h3 class="text-center text-primary">Course Details</h3>
  <br><br>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>slno</th>
        <th>Coursename</th>
        <th>Batchtime</th>
        <th>Teachingday</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data2 as $data3 )

        <tr>

            <td> {{ $loop->iteration }}</td>

         <td> {{$data3->courserelation->Coursename }}</td>
         <td> {{$data3->courserelation->Batchtime }}</td>

         <td> {{$data3->courserelation->Teachingday }}</td>




             <td><button type="button" class="btn btn-warning">  <a  class="text-decoration-none  text-light "href=""  data-bs-toggle="modal" data-bs-target="#myModal">Edit</a>
             </button></td>
             <td><button type="button" class="btn btn-danger"><a href="{{route ('studentdelete',encrypt($data3->stcourse_id))}}"
             class="text-decoration-none  text-light" >Delete</a></button></td>
            </tr>
            @endforeach

      </tbody>
</table>
</div>

</div>
</div>


</div>
<div  class="container">

    <a href="{{route('student')}}" class='btn btn-success float-end me-3' >Back</a>
  </div>



<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">


        <div class="modal-header">
          <h4 class="modal-title text-dark">Student details</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body text-dark">

        <form action="{{route ('stdetailupdate',encrypt($data->student_id))}}" method="post"  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
             <label for="Studentname" class="form-label">Name:</label>
             <input type="text" class="form-control" id="Studentname" name="Studentname"  value="{{$data->Studentname}}">
          </div>
          @error('Studentname')
          <span class="text-danger">{{$message}}</span>
      @enderror
          <div class="form-group">
             <label for="Phone" class="form-label">Phone:</label>
             <input type="number" class="form-control" id="Phone" name="Phone"  value="{{$data->Phone}}">
          </div>
          @error('Phone')
          <span class="text-danger">{{$message}}</span>
      @enderror
          <div class="form-group">
            <label for="image">Dr image:</label>
            <input type="file" class="form-control" id="image"  name="image"  value="{{$data->image}}">
          </div>
          @error('image')
          <span class="text-danger">{{$message}}</span>
      @enderror
          <select name="course_id" id="course_id"  class="form-control" multiple>
            @foreach ($data2 as $data3 )
            <option selected='selected'> {{$data3->courserelation->Coursename }}-{{$data3->courserelation->Teachingday }}-{{$data3->courserelation->Batchtime }}</option>
            @endforeach
            @foreach($course as $row)
            <option value="{{$row->course_id}}">{{$row->Coursename}}-{{$row->Teachingday}}-{{$row->Batchtime}}</option>
            @endforeach

        </select >
        @error('course_id')
        <span class="text-danger">{{$message}}</span>
    @enderror
  <br>
          <div class="form-group float-left">
             <button type="submit" class="btn btn-primary">Update</button>

          </div>

        </form>

        </div>

        </div>
        </div>
        </div>

         <!-- endModal-->



</body>
</html>













