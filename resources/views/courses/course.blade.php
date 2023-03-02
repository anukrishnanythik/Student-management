@include('layouts.head')
<body>
@include('layouts.topbar')
  <br>
  <div  class="container  ms-5">

    <a href="" class='btn btn-success float-end '  data-bs-toggle="modal" data-bs-target="#myModal">Add course</a>
</div>



<div class="container mt-3">

<div class="row">
@if (session()->has('message'))
<p>{{session()->get('message')}}</p>
@endif

<div class="col-2">
  <br>
@include('layouts.sidebar')
</div>
<div class="col-10">
 <table class="table table-striped">
    <thead>
      <tr>
        <th>slno</th>
        <th>Coursename</th>
        <th>Teachername</th>
        <th>Batchtime</th>
        <th>Teachingday</th>
        <th></th>
        <th></th>

      </tr>
    </thead>


    <tbody>
      @foreach($data as $row)
      <tr>
        <td>{{$data->firstitem()+$loop->index}}</td>
        <td>{{$row->Coursename}}</td>
        <td>{{$row->Teachername}}</td>
        <td>{{$row->Batchtime}}</td>
        <td>{{$row->Teachingday}}</td>
        @if($row->trashed())
        <td><button type="button" class="btn btn-info"><a href="{{route ('courseactivate',encrypt($row->course_id))}}"  class="text-decoration-none text-dark"   >Activate</a></button></td>
        <td><button type="button" class="btn btn-danger"><a href="{{route ('forcedelete',encrypt($row->course_id))}}"  class="text-decoration-none  text-light" >Forcedelete</a></button></td>

      @else
        <td><button type="button" class="btn btn-warning"><a href="{{route ('courseedit',encrypt($row->course_id))}}"  class="text-decoration-none text-dark"   >Edit</a></button></td>
        <td><button type="button" class="btn btn-danger"><a href="{{route ('coursedelete',encrypt($row->course_id))}}"  class="text-decoration-none  text-light" >Delete</a></button></td>
        @endif
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
        <h4 class="modal-title text-dark">Course details</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body text-dark">
        <form action="{{route('coursesave')}}" method="post">

      @csrf
        <div class="form-group">
           <label for="Coursename" class="form-label">Coursename:</label>
           <input type="text" class="form-control" id="Coursename" name="Coursename"  value={{old('Coursename')}}>
        </div>
        @error('Coursename')
            <span class="text-danger">{{$message}}</span>
        @enderror
        <div class="form-group">
           <label for="Teachername" class="form-label">Teachername:</label>
           <input type="text" class="form-control" id="Teachername" name="Teachername" value={{old('Teachername')}}>
        </div>
        @error('Teachername')
            <span class="text-danger">{{$message}}</span>
        @enderror
        <div class="form-group">
           <label for="Batchtime" class="form-label">Batchtime:</label>
           <input type="text" class="form-control" id="Batchtime" name="Batchtime" value={{old('Batchtime')}}>
        </div>
        @error('Batchtime')
            <span class="text-danger">{{$message}}</span>
        @enderror
        <div class="form-group">
           <label for="Teachingday" class="form-label">Teachingday:</label>
           <input type="text" class="form-control" id="Teachingday" name="Teachingday" value={{old('Teachingday')}}>
        </div>
        @error('Teachingday')
            <span class="text-danger">{{$message}}</span>
        @enderror
<br>
        <div class="form-group">
           <button type="submit" class="btn btn-primary"> Add course</button>

        </div>

      </form>

      </div>

      </div>
      </div>
      </div>

       <!-- endModal-->


</body>
</html>
