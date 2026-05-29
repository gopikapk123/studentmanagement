@extends('commonlayout.app')

@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

function updateStudent()
{
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({

        url: "/managestudents/update/{{ $student->id }}",

        type: "POST",

        data: $('#editForm').serialize(),

        success:function(res)
        {
            alert("Updated Successfully");

            window.location.href="/managestudents";
        },

        error:function(err)
        {
            alert("Update Failed");
        }

    });
}

</script>

<div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-2xl font-bold text-gray-800">
            Edit Student
        </h1>

        <a href="{{ url('/managestudents') }}"
           class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">

            Back

        </a>

    </div>

    <form id="editForm">

        @csrf

        <!-- NAME -->
        <div class="mb-5">

            <label class="block mb-2 font-medium text-gray-700">
                Student Name
            </label>

            <input type="text"
                   name="name"
                   value="{{ $student->name }}"
                   class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

        </div>

        <!-- ADDRESS -->
        <div class="mb-5">

            <label class="block mb-2 font-medium text-gray-700">
                Address
            </label>

            <textarea name="address"
                      rows="4"
                      class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $student->address }}</textarea>

        </div>

        <!-- MOBILE -->
        <div class="mb-5">

            <label class="block mb-2 font-medium text-gray-700">
                Mobile Number
            </label>

            <input type="text"
                   name="mobile"
                   value="{{ $student->mobile }}"
                   class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

        </div>

        <!-- BUTTONS -->
        <div class="flex gap-4">

            <button type="button"
                    onclick="updateStudent()"
                    class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">

                Update Student

            </button>

            <a href="{{ url('/managestudents') }}"
               class="bg-gray-400 text-white px-6 py-3 rounded-lg hover:bg-gray-500">

                Cancel

            </a>

        </div>

    </form>

</div>

@endsection