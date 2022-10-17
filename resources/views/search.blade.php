@extends('layout')

@section('title')
    student
@endsection

@section('content')
    <div class="table_data">
        <div class="container pt-5">

            <form action="{{ url('search') }}" method="get" class="pb-5">
                <input type="text" name="search" required />
                <button type="submit" class="btn btn-success py-1">Search</button>
            </form>

            <div class="d-flex justify-content-between">
                <h3 class="text-capitalize"> student data </h3>
                <a class="btn btn-primary text-capitalize" href="{{ url('/add') }}">add student</a>
            </div>

            <table class="table table-dark table-striped mt-5 mx-auto text-center">
                <tr class="text-capitalize">
                    <th class="text-white">#</th>
                    <th class="text-white">name</th>
                    <th class="text-white">course</th>
                    <th class="text-white">fee</th>
                    <th class="text-white">action</th>
                </tr>
                <h3>students number : {{ $students->count() }}</h3>

                @include('include.success')

                @if ($students->isNotEmpty())
                    @foreach ($students as $student)
                        <tr class="">
                            <td class="">{{ $student->id }}</td>
                            <td class="">{{ $student->name }}</td>
                            <td class="">{{ $student->course }}</td>
                            <td class="">{{ $student->fee }}</td>

                            <td class="d-flex justify-content-center">

                                <a class="btn btn-primary text-capitalize px-2 " href="{{ url("edit/$student->id") }}">
                                    edit</a>

                                <form method="post" action="{{ url("/delete/$student->id") }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger text-capitalize ms-3 px-2 py-1">delete</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                @else
                    <div>
                        <h2>No data found</h2>
                    </div>
                @endif




            </table>

@endsection
