@extends('admin_layouts.userLayout')
@section('content')

@extends('components.sidebar')

<div class="flex flex-col p-10 bg-slate-200 w-[100%]">
    <div class="flex gap-5">
        <span class="w-[2px] rounded h-[35px] bg-slate-300"></span>
        <h1 class="text-orange-600 text-2xl font-semibold">Users</h1>
    </div>

    <div class="text-center p-7 text-sky-900 text-lg">All Users</div>

    <div class="w-full flex justify-center p-4">
        <input class="shadow appearance-none border rounded w-[50%] py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline0" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by Name">

        <input class="ml-3 py-2 px-5 rounded-md bg-red-800 text-white shadow-md hover:bg-gray-400 cursor-pointer transition assignment text-left" type="submit" name="sstudent" value="Search User"> <br>
    </div>

    <div class="flex flex-col bg-gray-100 w-[1000px] ml-5 items-center mb-32 gap-20 p-6">
        <div class="flex justify-center h-[70%] p-4 w-[80%]">
            <table class="shadow-2xl table-auto rounded-md w-[90%]" id="myTable">
                <thead class="text-white bg-gray-700">
                    <tr>
                        <th class="px-6 py-3">User Name</th>
                        <th class="px-6 py-3">Email Address</th>
                        <th class="px-6 py-3">User Type</th>
                        <th class="px-6 py-3">Edit</th>
                        <th class="px-6 py-3">Delete</th>

                    </tr>
                </thead>
                @foreach($users as $user)
                <tbody id="dynamic" class="bg-white">
                    <tr class="border-b odd:bg-white even:bg-gray-50">
                        <td class="px-6 py-4 animals">{{$user->name}}</td>
                        <td class="px-6 py-4 animals"> {{$user->email}}</td>
                        <td class="px-6 py-4 animals">{{$user->user_type}}</td>
                        <td class="px-5 py-4">
                            <a href="/editUser/{{$user->id}}" class="inline-block text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                        </td>
                        <td class="px-5 py-4">
                            <a href="/deleteUser/{{$user->id}}" class="inline-block text-center">
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

       
        <div class="flex justify-center bg-orange-600 p-2 text-white w-[40%] hover:bg-orange-400 rounded-md cursor-pointer" onclick="adduser()">
            <button class="adduser"> Add User</button>
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
            td = tr[i].getElementsByTagName("td")[0];
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

    function adduser() {
        let modal = $(".add-user-modal");
        modal.removeClass('hidden');
        modal.addClass('flex');
        stopScroll();

    }

    function closeuser() {
        let modal = $(".add-user-modal");
        modal.removeClass('flex');
        modal.addClass('hidden');
        resumeScroll();

    }
</script>