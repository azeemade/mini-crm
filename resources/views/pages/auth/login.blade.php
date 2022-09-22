@extends('layout.app')
@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="">
            <form method="post" action="/auth/login" enctype="multipart/form-data" class="shadow-md rounded-lg w-[400px] p-4">
                <p class="text-medium text-3xl text-center mb-4">mini-crm</p>
                @if ($errors->any())
                    <div class="bg-red-100 rounded-lg py-5 px-6 mb-4 text-base text-red-700 mb-3" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @csrf
                <div class="form-floating mb-3 xl:w-96">
                    <input type="email" name="email" class="form-control
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
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput" class="text-gray-700">Email address</label>
                </div>
                <div class="form-floating mb-3 xl:w-96">
                    <input type="password" name="password" class="form-control
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
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword" class="text-gray-700">Password</label>
                </div>
                <button type="submit" class="
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
                  ease-in-out">Submit</button>
            </form>
          </div>          
    </div>
@stop