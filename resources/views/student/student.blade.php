@include('layouts.head')
<body>
@include('layouts.topbar')
  <br>

  <div  class="container  ms-5">

  <a href="" class='btn btn-success float-end '  data-bs-toggle="modal" data-bs-target="#myModal">Add student</a>
</div>

<div class="container mt-3">

<div class="row">


<div class="col-2">
  <br>
@include('layouts.sidebar')
</div>

<div class="col-10">

 <table class="table table-striped">
    <thead>
      <tr>
        <th>slno</th>
        <th>Studentname</th>
       <th>Details</th>
       <th>Action</th>


      </tr>
    </thead>


    <tbody>
      @foreach($data as $row)
      <tr>
        <td>{{$loop->index}}</td>
        <td> {{$row->Studentname}}</td>
       <td><a href="{{route ('studentshow',encrypt($row->student_id))}}"  class="text-decoration-none ">Details</a></td>
       <td><a href="{{route ('studentdelete',encrypt($row->student_id))}}"  class="text-decoration-none text-danger ">Delete</a></td>

        </tr>
      @endforeach
      </tbody>

</table>
<div class='float-end '>

{{ $data->links() }}

</div>

</div>
</div>
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

      <form action="{{route('studentsave')}}" method="post"  enctype="multipart/form-data">
      @csrf
      <div class="form-group">
           <label for="Name" class="form-label">Name:</label>
           <input type="text" class="form-control" id="Name" name="Studentname" value={{old('Studentname')}}>
        </div>
        @error('Studentname')
        <span class="text-danger">{{$message}}</span>
    @enderror
        <div class="form-group">
           <label for="Teachername" class="form-label">Phone:</label>
           <input type="number" class="form-control" id="Phone" name="Phone" value={{old('Phone')}}>
        </div>
        @error('Phone')
        <span class="text-danger">{{$message}}</span>
    @enderror
        <div class="form-group">
            <label for="image">Dr image:</label>
            <input type="file" class="form-control" id="image"  name="image"  value={{old('image')}}>
          </div>
          @error('image')
          <span class="text-danger">{{$message}}</span>
      @enderror
        <div class="form-group">
           <label for="Courseid" class="form-label">Courseid:</label>

           <select name="course_id[]" id="Courseid"  class="form-control" multiple>
           <option>--select--</option>
           @foreach($data2 as $row)
           <option value="{{$row->course_id}}">{{$row->Coursename}}-{{$row->Teachingday}}-{{$row->Batchtime}}</option>
           @endforeach
        </select>
        @error('course_id')
        <span class="text-danger">{{$message}}</span>
    @enderror
        </div>

<br>
        <div class="form-group float-left">
           <button type="submit" class="btn btn-primary"> Add Student</button>

        </div>

      </form>

      </div>

      </div>
      </div>
      </div>

       <!-- endModal-->


</body>
</html>
