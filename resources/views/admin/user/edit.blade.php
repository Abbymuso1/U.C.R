@extends('admin_layouts.userLayout')
@section('content')

@extends('components.sidebar')
<div class="flex flex-col p-10 bg-slate-200 w-[100%]">
    <div class="flex gap-5">
        <span class="w-[2px] rounded h-[35px] bg-slate-300"></span>
        <h1 class="text-orange-600 text-2xl font-semibold">Edit User</h1>
    </div>

    <div tabindex="-1" aria-hidden="true" class="p-24 flex justify-center">
        <div class="relative p-4 w-[70%]  h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow">
                <a href="{{url('admin/user')}}" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white bg-blue-200 w-[200px] justify-center" data-modal-toggle="add-class-modal">
                    Back
                </a>

                <div class="py-6 px-6 lg:px-8">
                    <h3 class="mb-6 text-xl font-medium text-gray-900 dark:text-dark">Edit User
                    </h3>
                    <form class="" action="{{url('update-user/'.$user->id) }}" id="classroom-form" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="text" name="name" value="{{$user->name}}" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 mb-10 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:text-black" required>
                        <input type="text" name="email" value="{{$user->email}}" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 mb-10 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:text-black" required>
                        <input type="text" name="usertype" value="{{$user->user_type}}" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 mb-10 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:text-black" required>

                        <input type="hidden" name="user_id" value='{{$user->id}}' />

                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit
                            User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection