@extends('admin_layouts.userLayout')
@section('content')

@extends('components.sidebar')
<div class="flex flex-col bg-slate-200 p-10">
    <div class="flex gap-5 mb-4">
        <span class="w-[2px] rounded h-[35px] bg-slate-300"></span>
        <h1 class="text-orange-600 text-2xl font-semibold">Dashboard</h1>
    </div>
    <!-- Use relative widths -->
    <div class="flex flex-col bg-slate-100">
        <div class="flex flex-wrap w-[100%] gap-10 justify-center p-4 py-5">

            <div class="flex flex-col h-[150px] w-[200px] rounded-xl bg-white shadow-md md:w-[200px] transition ease-in-out hover:shadow-lg hover:">
                <div class="w-50 flex justify-center items-center h-10 rounded-tr-md rounded-tl-md">
                    <a href="{{url('admin/user')}}" class="text-center bg-orange-300 text-black w-[100%] py-3 rounded-tr-md rounded-tl-md shadow-md">Users</a>
                </div>
                <div class="flex mt-2 text-lg font-extralight text-zinc-700 justify-center mt-10">
                    <p data-user="{{$users->count()}}" class="flex text-5xl font-semibold">{{$users->count()}}</p>
                </div>
            </div>
            <div class="flex flex-col h-[150px] w-[200px] rounded-xl bg-white shadow-md md:w-[200px] transition ease-in-out hover:shadow-lg hover:">
                <div class="w-50 flex justify-center items-center h-10 rounded-tr-md rounded-tl-md">
                    <a href="{{url('admin/user')}}" class="text-center bg-orange-300 text-black w-[100%] py-3 rounded-tr-md rounded-tl-md shadow-md">User Entries</a>
                </div>
                <div class="flex mt-2 text-lg font-extralight text-zinc-700 justify-center mt-10">
                    <p class="flex text-5xl font-semibold">{{$usergradeentry->count()}}</p>
                </div>
            </div>
            <div class="flex flex-col h-[150px] w-[200px] rounded-xl bg-white shadow-md md:w-[200px] transition ease-in-out hover:shadow-lg hover:">
                <div class="w-50 flex justify-center items-center h-10 rounded-tr-md rounded-tl-md">
                    <a href="{{url('admin/user')}}" class="text-center bg-orange-300 text-black w-[100%] py-3 rounded-tr-md rounded-tl-md shadow-md">Courses Available</a>
                </div>
                <div class="flex mt-2 text-lg font-extralight text-zinc-700 justify-center mt-10">
                    <p class="flex text-5xl font-semibold">{{$courses->count()}}</p>
                </div>
            </div>
            <div class="flex flex-col h-[150px] w-[200px] rounded-xl bg-white shadow-md md:w-[200px] transition ease-in-out hover:shadow-lg hover:">
                <div class="w-50 flex justify-center items-center h-10 rounded-tr-md rounded-tl-md">
                    <a href="{{url('admin/user')}}" class="text-center bg-orange-300 text-black w-[100%] py-3 rounded-tr-md rounded-tl-md shadow-md">User Feedback</a>
                </div>
                <div class="flex mt-2 text-lg font-extralight text-zinc-700 justify-center mt-10">
                    <p class="flex text-5xl font-semibold">{{$feedback->count()}}</p>
                </div>
            </div>
        </div>
        <div class="flex flex-row gap-10 p-10 items-center">
            <div class="flex flex-col  p-2 rounded shadow w-[500px] ">
                <div class="shadow-lg rounded-lg overflow-hidden">
                    <div class="py-3 px-5 bg-gray-50">User chart</div>
                    <canvas class="p-10" id="chartBar"></canvas>
                </div>

                <!-- Required chart.js -->
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                <!-- Chart bar -->
                <script>
                    const labelsBarChart = [
                        "Male",
                        "Female",

                    ];
                    const dataBarChart = {
                        labels: labelsBarChart,
                        datasets: [{
                            label: "My First dataset",
                            backgroundColor: "hsl(252, 82.9%, 67.8%)",
                            borderColor: "hsl(252, 82.9%, 67.8%)",
                            data: [1, 2, 10],
                        }, ],
                    };

                    const configBarChart = {
                        type: "bar",
                        data: dataBarChart,
                        options: {},
                    };

                    var chartBar = new Chart(
                        document.getElementById("chartBar"),
                        configBarChart
                    );
                </script>
            </div>
            <div class="flex flex-col  p-2 rounded shadow w-[500px] h-[550px]">
                <div class="shadow-lg rounded-lg overflow-hidden">
                    <div class="py-3 px-5 bg-gray-50">User Entries</div>
                    <canvas class="p-10" id="chartDoughnut"></canvas>
                </div>

                <!-- Required chart.js -->
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                <!-- Chart doughnut -->
                <script>
                    const dataDoughnut = {
                        labels: ["Mathematics", "English", "Swahili"],
                        datasets: [{
                            label: "My First Dataset",
                            data: [300, 50, 100],
                            backgroundColor: [
                                "rgb(133, 105, 241)",
                                "rgb(164, 101, 241)",
                                "rgb(101, 120, 241)",
                              
                                
                            ],
                            hoverOffset: 4,
                        }, ],
                    };

                    const configDoughnut = {
                        type: "doughnut",
                        data: dataDoughnut,
                        options: {},
                    };

                    var chartBar = new Chart(
                        document.getElementById("chartDoughnut"),
                        configDoughnut
                    );
                </script>
            </div>
        </div>
        <div class="flex flex-row gap-10 p-5">
            <div class="flex flex-col bg-white p-2 rounded shadow w-[900px]">
                <div class="flex flex-row p-2 gap-2">
                    <div class="flex text-black w-[150px] cursor-pointer hover:shadow-4xl">
                        <p>Users Feedback</p>
                    </div>
                    <div class="flex flex-row items-center gap-2 ml-96">
                        <label class="flex text-sm">Search:</label>
                        <input class="flex rounded-md border-slate-200 border-2" id="myInput" onkeyup="myFunction()" placeholder="Search by subject">
                    </div>

                </div>

                <div class="flex justify-center">
                    <table class="divide-y divide-gray-300" id="myTable">
                        <thead class="bg-zinc-200 w-[100%]">
                            <tr>
                                <th class="px-5 py-2 text-xs text-black">
                                    ID
                                </th>
                                <th class="px-5 py-2 text-xs text-black">
                                    Name
                                </th>
                                <th class="px-5 py-2 text-xs text-black">
                                    Email
                                </th>
                                <th class="px-5 py-2 text-xs text-black">
                                    Subject
                                </th>
                                <th class="px-5 py-2 text-xs text-black">
                                    Feedback
                                </th>
                                <th class="px-5 py-2 text-xs text-black">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-300">
                            @foreach($feedback as $feed)
                            <tr class="text-center">
                                <td class="px-5 py-4 text-sm text-gray-500">
                                    {{$feed->id}}
                                </td>
                                <td class="px-5 py-4">
                                    <div class="name text-sm text-gray-900">
                                        {{$feed->name}}
                                    </div>
                                </td>
                                <td class="px-5 py-4">
                                    <div class="email text-sm text-gray-500">
                                        <a target="_BLANK" href="https://mail.google.com/mail/u/2/#inbox?compose={{$feed->email}}">{{$feed->email}}</a>
                                    </div>
                                </td>

                                <td class="subject px-5 py-4 text-sm text-gray-500">
                                    {{$feed->subject}}

                                </td>
                                <td class="message px-6 py-4 text-sm text-gray-500">
                                    {{$feed->message}}
                                </td>
                                <td class="px-5 py-4">
                                    <a href="/deleteFeed/{{$feed->id}}"" class=" inline-block text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                    <div tabindex="-1" aria-hidden="true" id="edit-feed" class="edit-feed hidden bg-slate-200 bg-opacity-80 overflow-y-hidden overflow-x-hidden fixed top-0 inset-x-0 mx-auto flex justify-center z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
                        <div class="relative p-4 w-[70%]  h-full md:h-auto">
                            <div class="relative bg-white rounded-lg shadow">
                                <button type="button" class=" close-modal absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="add-class-modal">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <div class="py-6 px-6 lg:px-8">
                                    <h3 class="mb-6 text-xl font-medium text-gray-900 dark:text-dark">Add a new class
                                    </h3>
                                    <form class="" action="" id="classroom-form" method="POST">
                                        @csrf
                                        <input type="text" id="name" placeholder="New Class" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 mb-10 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:text-black" required>
                                        <input type="email" id="email" placeholder="New Class" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 mb-10 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:text-black" required>
                                        <input type="text" id="subject" placeholder="New Class" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 mb-10 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:text-black" required>
                                        <input type="text" id="message" placeholder="New Class" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 mb-10 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:text-black" required>

                                        <input type="hidden" name="school_id" value='' />

                                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create
                                            Class</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script type="text/javascript">
                        function myFunction() {
                            var input, filter, table, tr, td, i, txtValue;
                            input = document.getElementById("myInput");
                            filter = input.value.toUpperCase();
                            table = document.getElementById("myTable");
                            tr = table.getElementsByTagName("tr");
                            for (i = 0; i < tr.length; i++) {
                                td = tr[i].getElementsByTagName("td")[3];
                                if (td) {
                                    txtValue = td.textContent || td.innerText;
                                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                        tr[i].style.display = "";
                                    } else {
                                        tr[i].style.display = "none";
                                    }
                                }
                            }
                        }
                    </script>
                </div>
            </div>
            <div class="flex flex-col bg-white h-[300px] w-[400px] p-2 rounded shadow p-2 w-full lg:w-3/4 lg:max-w-lg">
                <h1 class="text-grey-darkest flex">Todo List</h1>

                <div class="p-2 flex flex-row gap-3">
                    <div class="flex mt-4">
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker" name="text" id="text" placeholder="Add Todo">
                        <button class="flex-no-shrink p-2 border-2 rounded text-teal border-teal hover:text-white hover:bg-zinc-200" id="add-task-btn">Add</button>
                        <button class="p-2 lg:px-4 md:mx-2 text-center border border-solid border-indigo-600 rounded bg-indigo-600 text-white transition-colors duration-300 mt-1 md:mt-0 md:ml-1" style="display: none" id="save-todo-btn">Edit Todo</button>
                    </div>
                </div>
                <div id="listBox"></div>
            </div>

            <script>
                const text = document.getElementById("text");
                const addTaskButton = document.getElementById("add-task-btn");
                const saveTaskButton = document.getElementById("save-todo-btn");
                const listBox = document.getElementById("listBox");
                const saveInd = document.getElementById("saveIndex");
                let todoArray = [];

                addTaskButton.addEventListener("click", (e) => {
                    e.preventDefault();
                    let todo = localStorage.getItem("todo");
                    if (todo === null) {
                        todoArray = [];
                    } else {
                        todoArray = JSON.parse(todo);
                    }
                    todoArray.push(text.value);
                    text.value = "";
                    localStorage.setItem("todo", JSON.stringify(todoArray));
                    displayTodo();
                });

                function displayTodo() {
                    let todo = localStorage.getItem("todo");
                    if (todo === null) {
                        todoArray = [];
                    } else {
                        todoArray = JSON.parse(todo);
                    }
                    let htmlCode = "";
                    todoArray.forEach((list, ind, hey) => {
                        htmlCode += `<div class='flex mb-4 items-center'>
                        <p class='w-full text-grey-darkest'>${list}</p>
                        <button onclick='deleteTodo(${ind})' class='flex-no-shrink p-2 ml-2 border-2 rounded text-white bg-green-500'>Done</button></div>`;
                    });
                    listBox.innerHTML = htmlCode;
                }

                function deleteTodo(ind) {
                    let todo = localStorage.getItem("todo");
                    todoArray = JSON.parse(todo);
                    todoArray.splice(ind, 1);
                    localStorage.setItem("todo", JSON.stringify(todoArray));
                    displayTodo();
                }

                let tableRowElement;

                function toggleModal(element) {

                    tableRowElement = element.parentElement.parentElement;
                    console.log(tableRowElement);

                    const name = tableRowElement.getElementsByClassName('name')[0].innerHTML;
                    const email = tableRowElement.getElementsByClassName('email')[0].innerHTML;
                    const phone = tableRowElement.getElementsByClassName('phone')[0].innerHTML;
                    const address = tableRowElement.getElementsByClassName('address')[0].innerHTML;


                    document.getElementById('name').value = name;
                    document.getElementById('email').value = email;
                    document.getElementById('phone').value = phone;
                    document.getElementById('address').value = address;

                    openModal();
                }

                function openModal() {

                    document.getElementById("edit-feed").style.display = "block"
                    document.getElementById("exampleModal").classList.add("show");
                }
            </script>
        </div>
    </div>







    @endsection