<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Profile: {{ $user->name }}
        </h2>
    </x-slot>
@if(session('status'))
  <div role="alert" class="p-4">
      <div class="bg-blue-500 text-white font-bold rounded-t px-4 py-2">
      </div>
      <div class="border border-t-0 border-blue-400 rounded-b bg-blue-100 px-4 py-3 text-blue-700">
          <p>{{session('status')}}</p>
      </div>
  </div>
@endif
  <div class="bg-white min-h-full min-w-full px-8">
    @if($user->profile_photo_url !== null)
      <img src="{{ $user->profile_photo_url }}" alt="Profile picture" class="h-24 w-24 rounded-full p-2 bg-white mx-auto m-4">
    @endif
    <div class="bg-gray-200 p-4 rounded-lg mb-2">
      <h1 class="text-lg font-bold mb-1 text-gray-700 block">Name</h1>
      <p class="font-light mb-1 text-gray-800 block">{{ $user->name }}</p>
    </div>
    <div class="bg-gray-200 p-4 rounded-lg mb-2">
      <h1 class="text-lg font-bold mb-1 text-gray-700 block">Email</h1>
      <p class="font-light mb-1 text-gray-800 block">{{ $user->email }}</p>
    </div>
    <div class="bg-gray-200 p-4 rounded-lg mb-2">
      <h1 class="text-lg font-bold mb-1 text-gray-700 block">Role</h1>
      <p class="font-light mb-1 text-gray-800 block">{{ $user->role }}</p>
    </div>
    <div class="bg-gray-200 p-4 rounded-lg mb-2">
      <a
        href="{{ route('promote_user', $user->id) }}"
        type="submit"
        class="border border-green-500 bg-green-500 text-white rounded-md px-4 py-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline"
      >
          Promote
      </a>
      <a
        href="{{ route('demote_user', $user->id) }}"
        type="submit"
        class="border border-red-500 bg-red-500 text-white rounded-md ml-2 px-4 py-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline"
      >
          Demote
      </a>
    </div>
  </div>
</x-app-layout>
