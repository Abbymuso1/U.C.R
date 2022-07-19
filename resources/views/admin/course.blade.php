@extends('layouts.userLayout')

@section('layoutContent')

@php
$index = 0;
@endphp
<div class="flex">
    <div class="flex flex-col w-full">
        <div class="flex flex-row p-5 text-black bg-white">
            <a href="/admin" class="logo" style="color:orangered; font-size:xx-large; font-family:cursive">
                Wise Choice
            </a>
            <div class="flex flex-row absolute right-10 gap-3 items-center">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <button class="flex bg-red-200 rounded-full w-[40px] h-[40px]">Image</button>
                @endif

                <p class="flex">Welcome Admin :
                <p></p><a class="flex cursor-pointer font-semibold" href="{{ route('profile.show') }}">{{ Auth::user()->name }}</a></p>

                <a class="flex cursor-pointer text-orange-600" href="{{ route('dashboard') }}">User Dashboard</a>
                <a class="flex">
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <a> <input class="flex cursor-pointer font-serif text-sm text-white rounded-md bg-red-800 w-[100px] h-[30px] justify-center hover:text-orange-600 " type="submit" value="{{ __('LOG OUT') }}"></a>
                    </form>
                </a>
            </div>
        </div>

        <!--sidebar-->

        <div class="flex">
            <div class="flex flex-col w-[17%] p-2 bg-red-900 text-white">
                <div class="flex flex-col p-5 gap-3 font-semibold">
                    <div class="flex flex-row gap-3 hover:shadow-transparent w-[200px] p-2 cursor-pointer items-center active:bg-slate-500 active:w-[200px] active:rounded-md active:shadow-sm hover:text-orange-500">
                        <i class="fa-solid fa-user"></i>
                        <a href={{url('admin')}}>Dashboard</a>
                    </div>
                    <div class="flex flex-row gap-3 hover:shadow-transparent w-[200px] p-2 cursor-pointer items-center active:bg-slate-500 active:w-[200px] active:rounded-md active:shadow-sm hover:text-orange-500">
                        <i class="fa-solid fa-user"></i>
                        <a href={{url('admin/user')}}> User</a>
                    </div>

                    <div class="flex flex-row gap-3 hover:shadow-transparent w-[200px] p-2 cursor-pointer items-center active:bg-slate-500 active:w-[200px] active:rounded-md  hover:text-orange-500">
                        <i class="fa-solid fa-note-sticky"></i>
                        <a href={{url('admin/user-entry')}}> User Entries</a>
                    </div>
                    <div class="flex flex-row gap-3 hover:shadow-transparent w-[200px] p-2 cursor-pointer items-center active:bg-slate-500 active:w-[200px] active:rounded-md  hover:text-orange-500">
                        <i class="fa-solid fa-graduation-cap"></i>
                        <a href={{url('admin/course')}}>Courses</a>
                    </div>
                    <div class="flex flex-row gap-3 hover:shadow-transparent w-[200px] p-2 cursor-pointer items-center active:bg-slate-500 active:w-[200px] active:rounded-md  hover:text-orange-500">
                        <!-- <i class="fa-solid fa-graduation-cap"></i> -->
                        <i class="fa-solid fa-book"></i>
                        <a href={{url('/log-viewer')}}>Logs</a>
                    </div>
                </div>
            </div>


            <div class="p-10 w-full bg-slate-200">
                <div class="flex gap-5">
                    <span class="w-[2px] rounded h-[35px] bg-slate-300"></span>
                    <h1 class="text-orange-600 text-2xl font-semibold">Courses</h1>
                </div>

                <!-- Use relative widths -->
                <div class="mt-10 flex w-full flex-col items-center bg-slate-100  py-20">
                    <!-- using w-full cause I can add a padding to the continer to separate the gray box
                        from the white bg -->
                    <div class="flex w-[100%] justify-center">
                        <form action="{{url('/addcourse')}}" method="post" enctype="multipart/form-data" class="flex flex-row rounded-md p-6">

                            @csrf
                            <div class="flex">
                                <label class="flex mr-7 mt-2 font-normal">Add University Course<label>
                            </div>
                            <div class="flex">
                                <input name="course_name" class="w-[320px] rounded-l-md border-2 border-slate-900 p-2" type="text">
                                <input class="rounded-r-md bg-blue-800 p-2 text-white" type="submit" value="Add">
                            </div>
                        </form>
                    </div>

                    <div class="flex flex-col p-6 ml-8">
                        <h1 class="text-xl font-semibold text-zinc-700">Current Categories</h1>
                        <h4 class="text-sm font-extralight text-zinc-700 ml-2">(Expand to view further details)</h4>
                    </div>
                    @foreach($course as $cor)
                    <div class="flex w-[80%] flex-col items-center rounded-md bg-white pb-16 shadow-md mb-12">

                        <div tabindex="-1" aria-hidden="true" class="add-personality-modal hidden bg-slate-200 bg-opacity-80 overflow-y-hidden overflow-x-hidden fixed top-0 inset-x-0 mx-auto flex justify-center z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
                            <div class="relative p-4 w-[70%]  h-full md:h-auto">
                                <div class="relative bg-white rounded-lg shadow">
                                    <button type="button" class="close-add-personality-modal absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="add-class-modal">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <div class="py-6 px-6 lg:px-8">
                                        <h3 class="mb-6 text-xl font-medium text-gray-900 dark:text-dark">Add a new holland personality
                                        </h3>
                                        <form class="" action="{{url('/addhollandname')}}" id="classroom-form" method="POST">
                                            @csrf
                                            <input type="text" name="holland_name" placeholder="New holland Personality" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 mb-10 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:text-black" required>
                                            <input type="hidden" name="course_id" value='{{$cor->id}}' />

                                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create
                                                Holland Personality</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div tabindex="-1" aria-hidden="true" class="edit-course-modal hidden bg-slate-200 bg-opacity-80 overflow-y-hidden overflow-x-hidden fixed top-0 inset-x-0 mx-auto flex justify-center z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
                            <div class="relative p-4 w-[70%]  h-full md:h-auto">
                                <div class="relative bg-white rounded-lg shadow">
                                    <button type="button" class="edit-school-close-modal absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="add-class-modal">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <div class="py-6 px-6 lg:px-8">
                                        <h3 class="mb-6 text-xl font-medium text-gray-900 dark:text-black">Edit Course
                                        </h3>
                                        <form class="" action="{{url('editcourse/'.$cor->id)}}" id="classroom-form" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" name="course_name" value="{{$cor->course_name}}" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 mb-10 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:text-black" required>

                                            <input type="hidden" name="cor_id" value='{{$cor->id}}' />

                                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit
                                                Course</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div tabindex="-1" aria-hidden="true" class="add-subreq-modal hidden bg-slate-200 bg-opacity-80 overflow-y-hidden overflow-x-hidden fixed top-0 inset-x-0 mx-auto flex justify-center z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
                            <div class="relative p-4 w-[70%]  h-full md:h-auto">
                                <div class="relative bg-white rounded-lg shadow">
                                    <button type="button" class="close-add-subreq-modal absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="add-class-modal">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <div class="py-6 px-6 lg:px-8">
                                        <h3 class="mb-6 text-xl font-medium text-gray-900 dark:text-dark">Add a new subject requirement
                                        </h3>
                                        <form class="" action="{{url('add-subject')}}" id="classroom-form" method="POST">
                                            @csrf
                                            <input type="text" name="subject_name" placeholder="Subject requirement" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 mb-10 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:text-black" required>
                                            <input type="hidden" name="course_id" value='{{$cor->id}}' />

                                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create
                                                Subject</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-row w-full rounded-t-md bg-yellow-400 p-2 text-white">
                            <div class="flex flex-row gap-4 p-2 ml-4">
                                <button id="{{$cor->id}}" class="text-2xl flex hidden"><i class="fa-solid fa-play"></i></button>
                                <button id='btn2' class="text-xl flex"><i class="fa-solid fa-play rotate-90"></i></button>
                                <h2 class="text-2xl font-normal flex">{{$cor->course_name}}</h2>
                            </div>
                            <div class="flex absolute right-32 w-[30%] justify-center gap-7 text-xs font-normal">
                                <div class="flex flex-col items-center gap-1">
                                    <button data-school='{{$cor->id}}' class="edit-course flex text-2xl"><i class="fa-solid fa-pen"></i></button>
                                    <p class="flex">Edit</p>
                                </div>
                                <div class="flex flex-col items-center gap-1">
                                    <button class="delete-course flex text-2xl" data-course="{{$cor->id}}"><i class="fa-solid fa-circle-minus"></i></button>
                                    <p class="flex">Delete</p>
                                </div>
                                <div class="flex  flex-col items-center gap-1">
                                    <p class="flex text-3xl font-thin">|</p>
                                </div>
                                <div class="flex flex-col items-center gap-1">
                                    <button data-school='{{$cor->id}}' class="add-personality flex text-2xl"> <i class="fa-solid fa-circle-plus"></i></button>
                                    <p class="flex">Add Personality</p>
                                </div>
                                <div class="flex flex-col items-center gap-1">
                                    <button data-school='{{$cor->id}}' class="add-subreq flex text-2xl"> <i class="fa-solid fa-circle-plus"></i></button>
                                    <p class="flex">Add Subject</p>
                                </div>
                            </div>
                        </div>

                        @foreach($subject as $sub)
                        <div tabindex="-1" aria-hidden="true" class="add-grade-modal hidden bg-slate-200 bg-opacity-80 overflow-y-hidden overflow-x-hidden fixed top-0 inset-x-0 mx-auto flex justify-center z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
                            <div class="relative p-4 w-[70%]  h-full md:h-auto">
                                <div class="relative bg-white rounded-lg shadow">
                                    <button type="button" class="close-add-grade-modal absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="add-class-modal">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <div class="py-6 px-6 lg:px-8">
                                        <h3 class="mb-6 text-xl font-medium text-gray-900 dark:text-black">Add Grade
                                        </h3>
                                        <form class="" action="{{url('add-grade')}}" id="classroom-form" method="POST">
                                            @csrf

                                            <input type="text" name="grade_name" placeholder="Grade" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 mb-10 focus:border-blue-500 block w-full p-2.5  dark:border-gray-500 dark:placeholder-gray-400 dark:text-black" required>
                                            <input type="number" name="grade_score" placeholder="Grade Score" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 mb-10 focus:border-blue-500 block w-full p-2.5  dark:border-gray-500 dark:placeholder-gray-400 dark:text-black" required>

                                            <input type="hidden" name="subject_id" value='{{$sub->id}}'>


                                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                                                Grade</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div tabindex="-1" aria-hidden="true" class="edit-subject-modal hidden bg-slate-200 bg-opacity-80 overflow-y-hidden overflow-x-hidden fixed top-0 inset-x-0 mx-auto flex justify-center z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
                            <div class="relative p-4 w-[70%]  h-full md:h-auto">
                                <div class="relative bg-white rounded-lg shadow">
                                    <button type="button" class="edit-class-close-modal absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="add-class-modal">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <div class="py-6 px-6 lg:px-8">
                                        <h3 class="mb-6 text-xl font-medium text-gray-900 dark:text-black">Edit Subject
                                        </h3>
                                        <form class="" action="{{url('update-subject/'.$sub->id)}}" id="classroom-form" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <input type="text" name="subject_name" value="{{$sub->subject_name}}" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 mb-10 focus:border-blue-500 block w-full p-2.5  dark:border-gray-500 dark:placeholder-gray-400 dark:text-black" required>

                                            <input type="hidden" name="sub_id" value='{{$sub->course_id}}'>


                                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit
                                                Subject</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($cor->id==$sub->course_id)
                        <div class="flex flex-row mt-10 w-[90%] bg-orange-200 py-1 px-5">
                            <div class="flex w-[40%] items-center flex-row gap-2 ml-4 text-l">
                                <h2 class=" font-normal flex">Subject Requirement : {{$sub->subject_name}}</h2>
                            </div>
                            <div class="flex w-[40%] py-1 justify-center ml-36 gap-7 text-xs font-normal">
                                <div class="flex flex-col items-center gap-1">
                                    <button class="edit-subject flex text-xl"><i class="fa-solid fa-pen"></i></button>
                                    <p class="flex">Edit</p>
                                </div>
                                <div class="flex flex-col items-center gap-1">
                                    <button class="delete-subject flex text-xl" data-class1="{{$sub->id}}"><i class="fa-solid fa-circle-minus"></i></button>
                                    <p class="flex">Delete</p>
                                </div>
                                <div class="flex  flex-col items-center gap-1">
                                    <p class="flex text-3xl font-thin">|</p>
                                </div>
                                <div class="flex flex-col items-center gap-1">
                                    <button data-school='{{$cor->id}}' class="add-grade flex text-2xl"> <i class="fa-solid fa-circle-plus"></i></button>
                                    <p class="flex">Add Grade</p>
                                </div>
                            </div>
                        </div>

                        @foreach($grade as $gr)
                        <div tabindex="-1" aria-hidden="true" class="add-university-modal hidden bg-slate-200 bg-opacity-80 overflow-y-hidden overflow-x-hidden fixed top-0 inset-x-0 mx-auto flex justify-center z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
                            <div class="relative p-4 w-[70%]  h-full md:h-auto">
                                <div class="relative bg-white rounded-lg shadow">
                                    <button type="button" class="close-add-grade-modal absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="add-class-modal">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <div class="py-6 px-6 lg:px-8">
                                        <h3 class="mb-6 text-xl font-medium text-gray-900 dark:text-black">Add University
                                        </h3>
                                        <form class="" action="{{url('add-university')}}" id="classroom-form" method="POST">
                                            @csrf

                                            <input type="text" name="university_name" placeholder="University Name" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 mb-10 focus:border-blue-500 block w-full p-2.5  dark:border-gray-500 dark:placeholder-gray-400 dark:text-black" required>
                                            <input type="text" name="university_type" placeholder="University Type" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 mb-10 focus:border-blue-500 block w-full p-2.5  dark:border-gray-500 dark:placeholder-gray-400 dark:text-black" required>

                                            <input type="hidden" name="grade_id" value='{{$gr->id}}'>


                                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                                                University</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div tabindex="-1" aria-hidden="true" class="edit-grade-modal hidden bg-slate-200 bg-opacity-80 overflow-y-hidden overflow-x-hidden fixed top-0 inset-x-0 mx-auto flex justify-center z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
                            <div class="relative p-4 w-[70%]  h-full md:h-auto">
                                <div class="relative bg-white rounded-lg shadow">
                                    <button type="button" class="edit-class-close-modal absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="add-class-modal">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <div class="py-6 px-6 lg:px-8">
                                        <h3 class="mb-6 text-xl font-medium text-gray-900 dark:text-black">Edit Grade
                                        </h3>
                                        <form class="" action="{{url('update-grade/'.$gr->id)}}" id="classroom-form" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <input type="text" name="grade_name" value="{{$gr->grade}}" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 mb-10 focus:border-blue-500 block w-full p-2.5  dark:border-gray-500 dark:placeholder-gray-400 dark:text-black" required>
                                            <input type="text" name="grade_score" value="{{$gr->score}}" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 mb-10 focus:border-blue-500 block w-full p-2.5  dark:border-gray-500 dark:placeholder-gray-400 dark:text-black" required>

                                            <input type="hidden" name="grade_id" value='{{$gr->id}}'>


                                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit
                                                Grade</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($sub->id==$gr->subject_id)

                        <div class="flex flex-row mt-2 w-[60%] bg-red-200 py-1 px-5">
                            <div class="flex w-[45%] items-center flex-row gap-2 ml-4 text-l">
                                <h2 class=" font-normal flex"> Grade requirement : {{$gr->grade}} Grade score: ({{$gr->score}})</h2>
  
                            </div>
                            <div class="flex w-[50%] py-1  ml-20 justify-center gap-4 text-xs font-normal">
                                <div class="flex flex-col items-center gap-1">
                                    <button class="edit-grade flex text-l"><i class="fa-solid fa-pen"></i></button>
                                    <p class="flex">Edit</p>
                                </div>
                                <div class="flex flex-col items-center gap-1">
                                    <button class="delete-grade flex text-l" data-class2="{{$gr->id}}"><i class="fa-solid fa-circle-minus"></i></button>
                                    <p class="flex">Delete</p>
                                </div>
                                <div class="flex  flex-col items-center gap-1">
                                    <p class="flex text-3xl font-thin">|</p>
                                </div>
                                <div class="flex flex-col items-center gap-1">
                                    <button data-school='{{$cor->id}}' class="add-university flex text-l"> <i class="fa-solid fa-circle-plus"></i></button>
                                    <p class="flex">Add Univerisity</p>
                                </div>
                            </div>
                        </div>

                        @foreach($university as $uni)
                        <div tabindex="-1" aria-hidden="true" class="edit-university-modal hidden bg-slate-200 bg-opacity-80 overflow-y-hidden overflow-x-hidden fixed top-0 inset-x-0 mx-auto flex justify-center z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
                            <div class="relative p-4 w-[70%]  h-full md:h-auto">
                                <div class="relative bg-white rounded-lg shadow">
                                    <button type="button" class="edit-class-close-modal absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="add-class-modal">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <div class="py-6 px-6 lg:px-8">
                                        <h3 class="mb-6 text-xl font-medium text-gray-900 dark:text-black">Edit University
                                        </h3>
                                        <form class="" action="{{url('update-university/'.$uni->id)}}" id="classroom-form" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <input type="text" name="university_name" value="{{$uni->university_name}}" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 mb-10 focus:border-blue-500 block w-full p-2.5  dark:border-gray-500 dark:placeholder-gray-400 dark:text-black" required>
                                            <input type="text" name="university_type" value="{{$uni->university_type}}" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 mb-10 focus:border-blue-500 block w-full p-2.5  dark:border-gray-500 dark:placeholder-gray-400 dark:text-black" required>

                                            <input type="hidden" name="grade_id" value='{{$gr->id}}'>


                                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit
                                                University</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($gr->id==$uni->grade_id)
                        <div class="flex flex-row mt-2 w-[55%] bg-slate-300 py-1 px-5">
                            <div class="flex w-[45%] items-center flex-row gap-2 ml-4 text-l">
                                <h2 class=" font-normal flex">{{$uni->university_name}}</h2>
                            </div>
                            <div class="flex w-[50%] py-1  ml-20 justify-center gap-4 text-xs font-normal">
                                <div class="flex flex-col items-center gap-1">
                                    <button class="edit-university flex text-l"><i class="fa-solid fa-pen"></i></button>
                                    <p class="flex">Edit</p>
                                </div>
                                <div class="flex flex-col items-center gap-1">
                                    <button class="delete-university flex text-l" data-class3="{{$uni->id}}"><i class="fa-solid fa-circle-minus"></i></button>
                                    <p class="flex">Delete</p>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @endif
                        @endforeach
                        @endif
                        @endforeach

                        @foreach($holland as $hol)
                        <div tabindex="-1" aria-hidden="true" class="edit-class-modal hidden bg-slate-200 bg-opacity-80 overflow-y-hidden overflow-x-hidden fixed top-0 inset-x-0 mx-auto flex justify-center z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
                            <div class="relative p-4 w-[70%]  h-full md:h-auto">
                                <div class="relative bg-white rounded-lg shadow">
                                    <button type="button" class="edit-class-close-modal absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="add-class-modal">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <div class="py-6 px-6 lg:px-8">
                                        <h3 class="mb-6 text-xl font-medium text-gray-900 dark:text-black">Edit Personality
                                        </h3>
                                        <form class="" action="{{url('editholland/'.$hol->id)}}" id="classroom-form" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" name="holland_name" value="{{$hol->holland_name}}" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 mb-10 focus:border-blue-500 block w-full p-2.5  dark:border-gray-500 dark:placeholder-gray-400 dark:text-black" required>

                                            <input type="hidden" name="hol_id" value='{{$hol->course_id}}'>


                                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit
                                                Personality</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div tabindex="-1" aria-hidden="true" class="add-interest-modal hidden bg-slate-200 bg-opacity-80 overflow-y-hidden overflow-x-hidden fixed top-0 inset-x-0 mx-auto flex justify-center z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
                            <div class="relative p-4 w-[70%]  h-full md:h-auto">
                                <div class="relative bg-white rounded-lg shadow">
                                    <button type="button" class="close-add-grade-modal absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="add-class-modal">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <div class="py-6 px-6 lg:px-8">
                                        <h3 class="mb-6 text-xl font-medium text-gray-900 dark:text-black">Add Interest
                                        </h3>
                                        <form class="" action="{{url('/addinterest')}}" id="classroom-form" method="POST">
                                            @csrf

                                            <input type="text" name="interest_desc" placeholder="Interest Question" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 mb-10 focus:border-blue-500 block w-full p-2.5  dark:border-gray-500 dark:placeholder-gray-400 dark:text-black" required>
                                            <input type="text" name="interest_score" placeholder="Interest Score" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 mb-10 focus:border-blue-500 block w-full p-2.5  dark:border-gray-500 dark:placeholder-gray-400 dark:text-black" required>

                                            <input type="hidden" name="holland_id" value='{{$hol->id}}'>


                                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                                                Interest Question</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($cor->id==$hol->course_id)
                        <div class="flex flex-row mt-10 w-[90%] bg-blue-200 py-1 px-5">
                            <div class="flex w-[40%] items-center flex-row gap-2 ml-4 text-l">
                                <h2 class=" font-normal flex">Holland Personality : {{$hol->holland_name}}</h2>
                            </div>
                            <div class="flex w-[40%] py-1 justify-center ml-36 gap-7 text-xs font-normal">
                                <div class="flex flex-col items-center gap-1">
                                    <button class="edit-class flex text-xl"><i class="fa-solid fa-pen"></i></button>
                                    <p class="flex">Edit</p>
                                </div>
                                <div class="flex flex-col items-center gap-1">
                                    <button class="delete-class flex text-xl" data-personality="{{$hol->id}}"><i class="fa-solid fa-circle-minus"></i></button>
                                    <p class="flex">Delete</p>
                                </div>
                                <div class="flex  flex-col items-center gap-1">
                                    <p class="flex text-3xl font-thin">|</p>
                                </div>
                                <div class="flex flex-col items-center gap-1">
                                    <button data-school='{{$hol->id}}' class="add-interest flex text-2xl"> <i class="fa-solid fa-circle-plus"></i></button>
                                    <p class="flex">Add Question</p>
                                </div>

                            </div>
                        </div>

                        @foreach($interest as $int)
                        <div tabindex="-1" aria-hidden="true" class="edit-interest-modal hidden bg-slate-200 bg-opacity-80 overflow-y-hidden overflow-x-hidden fixed top-0 inset-x-0 mx-auto flex justify-center z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
                            <div class="relative p-4 w-[70%]  h-full md:h-auto">
                                <div class="relative bg-white rounded-lg shadow">
                                    <button type="button" class="edit-class-close-modal absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="add-class-modal">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <div class="py-6 px-6 lg:px-8">
                                        <h3 class="mb-6 text-xl font-medium text-gray-900 dark:text-black">Edit Interest Question
                                        </h3>
                                        <form class="" action="{{url('update-interest/'.$int->id)}}" id="classroom-form" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <input type="text" name="interest_q" value="{{$int->question}}" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 mb-10 focus:border-blue-500 block w-full p-2.5  dark:border-gray-500 dark:placeholder-gray-400 dark:text-black" required>
                                            <input type="text" name="interest_score" value="{{$int->score}}" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 mb-10 focus:border-blue-500 block w-full p-2.5  dark:border-gray-500 dark:placeholder-gray-400 dark:text-black" required>

                                            <input type="hidden" name="interest_id" value='{{$int->id}}'>


                                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit
                                                Interest</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($hol->id==$int->holland_id)
                        <div class="flex flex-row mt-2 w-[60%] bg-red-200 py-1 px-5">
                            <div class="flex w-[40%] items-center flex-row gap-2 ml-4 text-l">
                                <h2 class=" font-normal flex">{{$int->question}} Score: {{$int->score}}</h2>
                               
                            </div>
                            <div class="flex w-[50%] py-1  ml-20 justify-center gap-4 text-xs font-normal">
                                <div class="flex flex-col items-center gap-1">
                                    <button class="edit-grade flex text-l"><i class="fa-solid fa-pen"></i></button>
                                    <p class="flex">Edit</p>
                                </div>
                                <div class="flex flex-col items-center gap-1">
                                    <button class="delete-interest flex text-l" data-interest="{{$int->id}}"><i class="fa-solid fa-circle-minus"></i></button>
                                    <p class="flex">Delete</p>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach

                        @endif
                        @endforeach


                    </div>
                    @endforeach

                </div>

            </div>

        </div>



        <script>
            $(document).ready(function() {

                $(".add-personality").click(function(e) {
                    let modal = $(this).parent().parent().parent().prev().prev().prev();
                    // console.log(modal);
                    modal.removeClass('hidden');
                    modal.addClass('flex');
                    stopScroll();

                });

                $(".add-interest").click(function(e) {
                    let modal = $(this).parent().parent().parent().prev();
                    // console.log(modal);
                    modal.removeClass('hidden');
                    modal.addClass('flex');
                    stopScroll();

                });

                $(".add-subreq").click(function(e) {
                    let modal = $(this).parent().parent().parent().prev();
                    // console.log(modal);
                    modal.removeClass('hidden');
                    modal.addClass('flex');
                    stopScroll();

                });

                $(".add-grade").click(function(e) {
                    let modal = $(this).parent().parent().parent().prev().prev();
                    //  console.log(modal);
                    modal.removeClass('hidden');
                    modal.addClass('flex');
                    stopScroll();

                });

                $(".edit-grade").click(function(e) {
                    let modal = $(this).parent().parent().parent().prev();
                    //  console.log(modal);
                    modal.removeClass('hidden');
                    modal.addClass('flex');
                    stopScroll();

                });

                $(".add-university").click(function(e) {
                    let modal = $(this).parent().parent().parent().prev().prev();
                    //  console.log(modal);
                    modal.removeClass('hidden');
                    modal.addClass('flex');
                    stopScroll();

                });

                $(".edit-subject").click(function(e) {
                    let modal = $(this).parent().parent().parent().prev();
                    //console.log(modal);
                    modal.removeClass('hidden');
                    modal.addClass('flex');
                    stopScroll();

                });

                $(".edit-university").click(function(e) {
                    let modal = $(this).parent().parent().parent().prev();
                    // console.log(modal);
                    modal.removeClass('hidden');
                    modal.addClass('flex');
                    stopScroll();

                });
                $(".delete-subject").click(function(e) {
                    let subject = $(this).data('class1');
                    if (confirm('Are you sure you want to permanently delete this subject?')) {

                        $.post("/subject/delete", {
                                '_token': $('meta[name=csrf-token]').attr('content'),
                                data: {
                                    subject: subject
                                },
                            },

                            function(data, status) {
                                location.reload();
                            });
                    }

                });

                $(".delete-grade").click(function(e) {
                    let class2 = $(this).data('class2');
                    if (confirm('Are you sure you want to permanently delete this grade?')) {

                        $.post("/grade/delete", {
                                '_token': $('meta[name=csrf-token]').attr('content'),
                                data: {
                                    class2: class2
                                },
                            },

                            function(data, status) {
                                location.reload();
                            });
                    }

                });


                $(".delete-university").click(function(e) {
                    let class3 = $(this).data('class3');
                    if (confirm('Are you sure you want to permanently delete this university?')) {

                        $.post("/university/delete", {
                                '_token': $('meta[name=csrf-token]').attr('content'),
                                data: {
                                    class3: class3
                                },
                            },

                            function(data, status) {
                                location.reload();
                            });
                    }

                });

                $(".delete-class").click(function(e) {
                    let personality = $(this).data('personality');
                    if (confirm('Are you sure you want to permanently delete this personality?')) {

                        $.post("/holland/delete", {
                                '_token': $('meta[name=csrf-token]').attr('content'),
                                data: {
                                    personality: personality
                                },
                            },

                            function(data, status) {
                                location.reload();
                            });
                    }

                });

                $(".delete-interest").click(function(e) {
                    let interest = $(this).data('interest');
                    if (confirm('Are you sure you want to permanently delete this interest question?')) {

                        $.post("/interest/delete", {
                                '_token': $('meta[name=csrf-token]').attr('content'),
                                data: {
                                    interest: interest
                                },
                            },

                            function(data, status) {
                                location.reload();
                            });
                    }

                });
                $(".close-add-subreq-modal").click(function(e) {

                    let modal = $(this).parent().parent().parent();
                    // console.log(modal);

                    modal.removeClass('flex');
                    modal.addClass('hidden');
                    resumeScroll();

                });

                $(".close-add-personality-modal").click(function(e) {

                    let modal = $(this).parent().parent().parent();
                    // console.log(modal);

                    modal.removeClass('flex');
                    modal.addClass('hidden');
                    resumeScroll();

                });

                $(".close-add-grade-modal").click(function(e) {

                    let modal = $(this).parent().parent().parent();
                    // console.log(modal);

                    modal.removeClass('flex');
                    modal.addClass('hidden');
                    resumeScroll();

                });

                $(".delete-course").click(function(e) {
                    let course = $(this).data('course');
                    if (confirm('Are you sure you want to permanently delete this course?')) {

                        $.post("/course/delete", {
                                '_token': $('meta[name=csrf-token]').attr('content'),
                                data: {
                                    course: course
                                },
                            },

                            function(data, status) {
                                location.reload();
                            });
                    }
                });


                $('.classroom').click(function(e) {
                    $(this).addClass("rotate-90");
                });

                $(".edit-course").click(function(e) {
                    let modal = $(this).parent().parent().parent().prev().prev();
                    // console.log(modal);
                    modal.removeClass('hidden');
                    modal.addClass('flex');
                    stopScroll();

                });

                $(".class").click(function(e) {
                    let modal = $(this).parent().parent().parent().prev().prev();
                    modal.removeClass('hidden');
                    modal.addClass('flex');
                    stopScroll();

                });


                $(".subject").click(function(e) {
                    let modal = $(this).parent().parent().parent().parent().parent().prev().prev();
                    // console.log(modal);
                    modal.removeClass('hidden');
                    modal.addClass('flex');
                    stopScroll();

                });

                $(".edit-class").click(function(e) {
                    let modal = $(this).parent().parent().parent().prev().prev();
                    //  console.log(modal);
                    modal.removeClass('hidden');
                    modal.addClass('flex');
                    stopScroll();

                });

                $(".edit-school-close-modal").click(function(e) {

                    let modal = $(this).parent().parent().parent();
                    modal.removeClass('flex');
                    modal.addClass('hidden');
                    resumeScroll();

                });





                $(".edit-class-close-modal").click(function(e) {



                    let modal = $(this).parent().parent().parent();

                    modal.removeClass('flex');
                    modal.addClass('hidden');
                    resumeScroll();

                });


                $(".edit-class-close-modal").click(function(e) {


                    let modal = $(this).parent().parent().parent();

                    modal.removeClass('flex');
                    modal.addClass('hidden');
                    resumeScroll();

                });




                function stopScroll() {

                    var scrollPosition = [
                        self.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft,
                        self.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop

                    ];
                    var html = jQuery('html'); // it would make more sense to apply this to body, but IE7 won't have that
                    html.data('scroll-position', scrollPosition);
                    html.data('previous-overflow', html.css('overflow'));
                    html.css('overflow', 'hidden');
                    window.scrollTo(scrollPosition[0], scrollPosition[1]);
                }


                function resumeScroll() {
                    var html = jQuery('html');
                    var scrollPosition = html.data('scroll-position');
                    html.css('overflow', html.data('previous-overflow'));
                    window.scrollTo(scrollPosition[0], scrollPosition[1]);
                }



            });
        </script>

        @endsection