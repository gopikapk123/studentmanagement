
<!-- resources/views/students/index.blade.php -->
 @extends('commonlayout.app')

@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    $(document).on("click",'.editbtn',function(e){

           let id=$(this).data('id');
           let name=$(this).data('name');
           let address=$(this).data('address');
           let mobile=$(this).data('mobile');

           $('#editid').val(id);
           $('#editname').val(name);
           $('#editaddress').val(address);
           $('#editmobile').val(mobile);

           $.ajax({
            url:"/managestudents/edit/"+id,
            type:'get',
            success:function(res)
            {
                console.log("sucessfull")
            },
            error:function(err)
            {
                console.log("failed")
            }
           });

    });


    $(document).on('click','.deletebtn',function(e)
    {

     e.preventDefault();
     let id=$(this).data('id');
     $('#id').val(id);

     $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
     });
     $.ajax({
        url:"/managestudents/delete/"+id,
        type:"post",
        success:function(res)
        {
            console.log("deleted sucesfully");
            window.location.href="/managestudents";
        },
        error:function(err)
        {
            console.log("error")
        }
     });
     });

</script>

<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Students List</h2>

        <a href="{{ url('/managestudents/create') }}" class="btn btn-primary">
            Add User
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Mobile</th>
                <th width="200">Action</th>
            </tr>
        </thead>

        <tbody>
              <a href="{{ url('/managestudents/export') }}" class="btn btn-success py-3" >
                  Export CSV
              </a>
            @forelse($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->mobile }}</td>

                    <td>
                        
                        <!-- Edit Button -->
                        <a href="{{ url('/managestudents/edit/'.$student->id) }}"
                           class=" editbtn btn btn-warning btn-sm" 
                           data-id="{{ $student->id }}"
                           data-name="{{ $student->name }}"
                           data-address="{{ $student->address }}"
                           data-mobile="{{ $student->mobile }}">
                            Edit
                        </a>

                        <!-- Delete Button -->
                        <form action=""
                              method="POST"
                              style="display:inline-block;">

                            @csrf

                            <button type="submit" data-id="{{ $student->id }}"
                                    class="deletebtn btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete?')">
                                Delete
                            </button>

                        </form>
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="5" class="text-center">
                        No Students Found
                    </td>
                </tr>
            @endforelse

        </tbody>
    </table>
<div class="mt-4">
    {{$students->links()}}
</div>

</body>
</html>

@endsection