@extends('admin_layouts.userLayout')
@section('content')

@extends('components.sidebar')

<div class="flex flex-col p-10 bg-slate-200 w-[100%]">
    <div class="flex gap-5">
        <span class="w-[2px] rounded h-[35px] bg-slate-300"></span>
        <h1 class="text-orange-600 text-2xl font-semibold">Grades</h1>
    </div>

    <div class="text-center p-7 text-sky-900 text-lg">All Grades</div>

    <div class="w-full flex justify-center p-4">
        <input class="shadow appearance-none border rounded w-[50%] py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline0" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by Grade">
        
        <input class="ml-3 py-2 px-5 rounded-md bg-red-800 text-white shadow-md hover:bg-gray-400 cursor-pointer transition assignment text-left" type="submit" name="sstudent" value="Search Grade"> <br>
    </div>

    <div class="flex flex-col bg-gray-100 w-[1000px] ml-5 items-center mb-32 gap-20 p-6">
        <div class="flex justify-center h-[70%] p-4 w-[80%]">
            <table class="shadow-2xl table-auto rounded-md w-[90%]" id="myTable">
                <thead class="text-white bg-gray-700">
                    <tr>
                        <th class="px-6 py-3">Grade Id</th>
                        <th class="px-6 py-3">Grade</th>
                        <th class="px-6 py-3">Edit</th>
                        <th class="px-6 py-3">Delete</th>

                    </tr>
                </thead>
                @foreach($grades as $grade)
                <tbody id="dynamic" class="bg-white">
                    <tr class="border-b odd:bg-white even:bg-gray-50">
                        <td class="px-6 py-4 animals">{{$grade->id}}</td>
                        <td class="px-6 py-4 animals"> {{$grade->grade}}</td>
                        <td class="px-5 py-4">
                            <a href="/editGrade/{{$grade->id}}" class="inline-block text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                        </td>
                        <td class="px-5 py-4">
                            <a href="/deleteGrade/{{$grade->id}}" class="inline-block text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>


        </div>

        <div tabindex="-1" aria-hidden="true" class="add-grade-modal hidden bg-slate-200 bg-opacity-80 overflow-y-hidden overflow-x-hidden fixed top-0 inset-x-0 mx-auto flex justify-center z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
            <div class="relative p-4 w-[70%]  h-full md:h-auto">
                <div class="relative bg-white rounded-lg shadow">
                    <button type="button" onclick="closegrade()" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="add-class-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div class="py-6 px-6 lg:px-8">
                        <h3 class="mb-6 text-xl font-medium text-gray-900 dark:text-dark">Add a new User
                        </h3>
                        <form class="" action="{{ url('add-grade') }}" id="classroom-form" method="POST">
                            @csrf
                            <input type="text" name="grade_name" placeholder="Grade" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 mb-10 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:text-black" required>

                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create
                               Grade</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center bg-orange-600 p-2 text-white w-[40%] hover:bg-orange-400 rounded-md cursor-pointer" onclick="addgrade()">
            <button class="adduser"> Add Grade</button>
        </div>

    </div>
</div>
</div>
@endsection

<script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    };

    function addgrade() {
        let modal = $(".add-grade-modal");
        modal.removeClass('hidden');
        modal.addClass('flex');
        stopScroll();

    }

    function closegrade() {
        let modal = $(".add-grade-modal");
        modal.removeClass('flex');
        modal.addClass('hidden');
        resumeScroll();

    }

 
</script>