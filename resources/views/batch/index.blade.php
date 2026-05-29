@extends('commonlayout.app')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

$(document).on("click",".savebatch",function(e){

    e.preventDefault();
     $.ajaxSetup({
              headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
              }
        });
    $.ajax({

        url:"/managebatch/store",

        type:"POST",

        data:$('#batchform').serialize(),

        success:function(res)
        {
            console.log("sucessfully added")
            location.reload();
        },

        error:function(err)
        {
            console.log(err.responseJSON);
        }

    });

});

</script>

<div class="container mt-5">

    <div class="card">

        

        <div class="card-body">

            <form id="batchform" >

                @csrf

                <div class="mb-3">

                    <label>Batch No</label>

                    <input type="text"
                           name="batch_no"
                           class="form-control">

                </div>

                <div class="mb-3">

                    <label>Course</label>

                    <select name="course_id"
                            class="form-control">

                        <option value="">
                            Select Course
                        </option>

                        @foreach($courses as $course)

                            <option value="{{ $course->id }}">

                                {{ $course->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3">

                    <label>Teacher</label>

                    <input type="text"
                           name="teacher"
                           class="form-control">


                </div>

                <button type="submit" 
                        class="savebatch btn btn-success">

                    Save Batch

                </button>

            </form>

        </div>

    </div>

    <table class="table table-bordered mt-4">

        <thead class="table-dark">

            <tr>

                <th>ID</th>
                <th>Batch No</th>
                <th>Course</th>
                <th>Teacher</th>

            </tr>

        </thead>

        <tbody>

            @foreach($batches as $batch)

                <tr>

                    <td>{{ $batch->id }}</td>

                    <td>{{ $batch->batch_no }}</td>

                    <td>{{ $batch->course->name }}</td>

                    <td>{{ $batch->teacher }}</td>

                </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection