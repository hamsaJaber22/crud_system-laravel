@extends('layout')

@section('title')
    edit student info
@endsection

@section('content')
    <div class="m-5 d-flex">
        <a class="text-black-50 fw-bolder" href="{{ url('/') }}">
            <p>Home</p>
        </a>
        <p class="px-2">-></p>
        <p>update student</p>
    </div>

    <div class="edit_student m-auto" style="width:35%;">
        <h3 class="pb-4 text-capitalize">update student</h3>
        <div class="container">

            {{-- @if ($errors->any)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif --}}

            @include('include.success')

            <form class="edit_form px-4 py-5 text-capitalize border" method="post"
                action="{{ url("/update/$student->id") }}">
                @csrf
                <div class="mb-4">
                    <label for="exampleDropdownFormEmail1" class="form-label">student name</label>
                    <input type="name" name="name" value="{{ $student->name }}" class="form-control"
                        id="exampleDropdownFormEmail1" placeholder="name">

                    @error('name')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror

                </div>

                <div class="mb-4">
                    <label for="exampleDropdownFormPassword1" class="form-label">course</label>
                    <input type="text" name="course" value="{{ $student->course }}" class="form-control"
                        id="exampleDropdownFormPassword1" placeholder="course">

                    @error('course')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror

                </div>

                <div class="mb-4">
                    <label for="exampleDropdownFormEmail1" class="form-label">fee</label>
                    <input type="text" name="fee" value="{{ $student->fee }}" class="form-control"
                        id="exampleDropdownFormEmail1" placeholder="fee">

                    @error('fee')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-center pt-3">
                    <button type="submit" class="btn btn-primary px-3">Update</button>
                </div>


            </form>

        </div>
    </div>
@endsection
