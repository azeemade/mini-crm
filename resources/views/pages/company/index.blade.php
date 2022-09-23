@extends('layout.app')
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="flex justify-between items-center mb-2">
            <div class="">
                <nav class="rounded-md w-full">
                    <ol class="list-reset flex">
                      <li><a href="{{ url('admin/dashboard')}}" class="text-blue-600 hover:text-blue-700">Home</a></li>
                      <li><span class="text-gray-500 mx-2">/</span></li>
                      <li class="text-gray-500">Companies</li>
                    </ol>
                </nav>
            </div>
            <div class="">
                <a href="{{ url('admin/companies/create')}}" class="text-white rounded-lg inline-block px-6 py-2.5 bg-blue-800 font-medium">Add company</a>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
        <div class="overflow-hidden">
          <table class="min-w-full text-center">
            <thead class="border-b bg-gray-800">
              <tr>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                  #
                </th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                    Logo
                </th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                  Name
                </th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                  Email
                </th>
                {{-- <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                    No of employees
                </th> --}}
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                    Website
                </th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                  Action
                </th>
              </tr>
            </thead class="border-b">
            <tbody>
                @foreach ($companies as $item)
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->id }}</td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap justify-center flex">
                            <img src="{{ asset('storage/'.$item->logo) }}" alt="" class="h-10 w-10">
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            {{ $item->name }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            {{ $item->email }}
                        </td>
                        {{-- <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            @if($item->employees != NULL)
                                {{ count($item->employees) }}
                            @else
                                0
                            @endif
                        </td> --}}
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            {{ $item->website }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center">
                                <a href="{{ url('admin/companies/'.$item->id.'/edit')}}" class="mr-4 dark:text-gray-500">Edit</a>
                                <form action="{{ route('companies.destroy', $item->id)}}" method="POST" class="mb-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 inline-block px-6 bg-transparent font-medium">
                                        Remove
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
          {{ $companies->links() }}
        </div>
      </div>
    </div>
  </div>
  
@stop