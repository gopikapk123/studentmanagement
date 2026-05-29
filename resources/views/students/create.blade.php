@extends('commonlayout.app')

@section('content')


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function saveStudents()
    {
        $.ajaxSetup({
            headers:
            {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            $.ajax({
                 url:"/managestudents/store",
                 type:'post',
                 data:$('#formData').serialize(),
                 success:function(res)
                 {
                   alert("created succesfully");
                    window.location.href = "/managestudents";
                 },
                 error:function(err)
                 {
                    alert('failed to create');
                 }

            });

            
        
    }
</script>

<div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-2xl font-bold text-gray-800">
            Add New Student
        </h1>

        <a href="{{ url('managestudent') }}"
           class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">

            Cancel

        </a>

    </div>

    <form id="formData" action="{{ url('/managestudents/store') }}"
          method="POST" >

        @csrf

        <!-- STUDENT NAME -->
        <div class="mb-5">

            <label class="block mb-2 font-medium text-gray-700">
                Student Name
            </label>

            <input type="text"
                   name="name"
                   placeholder="Enter student name"
                   class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

            @error('name')

                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>

            @enderror

        </div>

        <!-- ADDRESS -->
        <div class="mb-5">

            <label class="block mb-2 font-medium text-gray-700">
                Address
            </label>

            <textarea name="address"
                      rows="4"
                      placeholder="Enter address"
                      class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>

            @error('address')

                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>

            @enderror

        </div>

        <!-- MOBILE -->
        <div class="mb-5">

            <label class="block mb-2 font-medium text-gray-700">
                Mobile Number
            </label>

            <input type="text"
                   name="mobile"
                   placeholder="Enter mobile number"
                   class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

            @error('mobile')

                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>

            @enderror

        </div>

        <!-- BUTTONS -->
        <div class="flex gap-4">

           <button type="button"
        onclick="saveStudents()"
        class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">

    Save Student

</button>

            <a href="{{ url('managestudent') }}"
               class="bg-gray-400 text-white px-6 py-3 rounded-lg hover:bg-gray-500">

                Back

            </a>

        </div>

    </form>

</div>

@endsection