@extends('layout.app')
@section('content')
<div class="">
    <section class="content-header">
        <div class="container-fluid">
            <div class="flex justify-between items-center mb-2">
                <div class="">
                    <nav class="rounded-md w-full">
                        <ol class="list-reset flex">
                        <li><a href="{{ url('admin/dashboard')}}" class="text-blue-600 hover:text-blue-700">Home</a></li>
                        <li><span class="text-gray-500 mx-2">/</span></li>
                        <li><a href="{{ url('admin/employees')}}" class="text-blue-600 hover:text-blue-700">Employees</a></li>
                        <li><span class="text-gray-500 mx-2">/</span></li>
                        <li class="text-gray-500">Update Employee</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="flex justify-center items-center">
        <div class="block p-6 rounded-lg shadow-lg bg-white max-w-md">
            <form method="post" action="/admin/employees/{{$employee->id}}" enctype="multipart/form-data">
                @if ($errors->any())
                    <div class="bg-red-100 rounded-lg py-5 px-6 mb-4 text-base text-red-700 mb-3" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @method('PATCH')
                @csrf
                <div class="form-floating mb-5">
                    <input type="text" name="firstname" value="{{ $employee->firstname}}" class="form-control
                        block
                        w-full
                        px-3
                        py-1.5
                        text-base
                        font-normal
                        text-gray-700
                        bg-white bg-clip-padding
                        border border-solid border-gray-300
                        rounded
                        transition
                        ease-in-out
                        m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="floatingInput1" placeholder="Goldman sachs">
                    <label for="floatingInput1" class="text-gray-700">Firstname</label>
                </div>
                <div class="form-floating mb-5">
                    <input type="text" name="lastname" value="{{ $employee->lastname}}" class="form-control
                        block
                        w-full
                        px-3
                        py-1.5
                        text-base
                        font-normal
                        text-gray-70
                        bg-white bg-clip-padding
                        border border-solid border-gray-300
                        rounded
                        transition
                        ease-in-out
                        m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="floatingInput2" placeholder="name@example.com">
                    <label for="floatingInput2" class="text-gray-700">Lastname</label>
                </div>
                <div class="mb-3 xl:w-96">
                    <select name="company" class="form-select appearance-none
                      block
                      w-full
                      px-3
                      py-1.5
                      text-base
                      font-normal
                      text-gray-700
                      bg-white bg-clip-padding bg-no-repeat
                      border border-solid border-gray-300
                      rounded
                      transition
                      ease-in-out
                      m-0
                      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                        <option selected disabled>Select a company</option>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}" {{$company->id == $employee->company ? 'selected' : ''}}>{{ $company->name }}</option>
                        @endforeach
                    </select>
                  </div>
                <div class="form-floating mb-5">
                    <input type="email" name="email" value="{{ $employee->email}}" class="form-control
                        block
                        w-full
                        px-3
                        py-1.5
                        text-base
                        font-normal
                        text-gray-700
                        bg-white bg-clip-padding
                        border border-solid border-gray-300
                        rounded
                        transition
                        ease-in-out
                        m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="floatingInput3" placeholder="example.com">
                    <label for="floatingInput3" class="text-gray-700">Email</label>
                </div>
                <div class="form-floating mb-5">
                    <input type="tel" name="phone" value="{{ $employee->phone}}" class="form-control 
                        block
                        w-full
                        px-3
                        py-1.5
                        text-base
                        font-normal
                        text-gray-700
                        bg-white bg-clip-padding
                        border border-solid border-gray-300
                        rounded
                        transition
                        ease-in-out
                        m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="floatingInput4" placeholder="example.com">
                    <label for="floatingInput4" class="text-gray-700">Phone</label>
                </div>
                <button type="submit" class="
                    w-full
                    px-6
                    py-2.5
                    bg-blue-600
                    text-white
                    font-medium
                    text-xs
                    leading-tight
                    uppercase
                    rounded
                    shadow-md
                    hover:bg-blue-700 hover:shadow-lg
                    focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                    active:bg-blue-800 active:shadow-lg
                    transition
                    duration-150
                    ease-in-out">Update company</button>
            </form>
        </div>
    </div>
</div>
  
@stop