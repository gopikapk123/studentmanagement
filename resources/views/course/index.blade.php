@extends('commonlayout.app')

@section('content')

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).on("click",'.savecourse',function(e)
    {
        e.preventDefault();
        $.ajaxSetup({
              headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
              }
        });
        $.ajax({
            url:"managecourse/store",
            type:"post",
            data:$('#formdata').serialize(),
            success:function(res)
            {
                console.log("sucessfully created");
                location.reload();
            },
            error:function(err)
            {
                console.log("failed");

            }
        })
    });
</script>


<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h2>Course List</h2>

       

    </div>

    <!-- Success Message -->

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    <!-- Add Course Form -->

    <div class="card mb-4 shadow-sm">

        <div class="card-header bg-dark text-white">
            Add Course
        </div>

        <div class="card-body">

            <form  id='formdata' action="{{url('/managecourse/store')}}" method="post">

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        Course Name
                    </label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           placeholder="Enter Course Name">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Duration
                    </label>

                    <input type="text"
                           name="duration"
                           class="form-control"
                           placeholder="Enter Duration">

                </div>

                <button type="submit"
                        class="savecourse btn btn-success">
                    Save Course
                </button>

            </form>

        </div>

    </div>

    <!-- Course Table -->

    <table class="table table-bordered table-striped">

        <thead class="table-dark">

            <tr>
                <th>ID</th>
                <th>Course Name</th>
                <th>Duration</th>
            </tr>

        </thead>

        <tbody>

            @forelse($course as $courses)

                <tr>

                    <td>{{ $courses->id }}</td>
                    <td>{{ $courses->name }}</td>
                    <td>{{ $courses->duration }}</td>

                </tr>

            @empty

                <tr>

                    <td colspan="3" class="text-center">
                        No Courses Found
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection