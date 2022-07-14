<div class="flex flex-col">

  <div class="flex flex-row p-5 text-black bg-white">
    <a class="flex text-3xl font-bold">U.C.R System</a>
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
          <a> <input class="flex cursor-pointer font-serif text-sm text-white rounded-md bg-red-800 w-[100px] h-[30px] justify-center mt-4 hover:text-orange-600 " type="submit" value="{{ __('LOG OUT') }}"></a>
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