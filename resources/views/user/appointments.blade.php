<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ Auth::user()->name }}'s Appointments
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
@if(count($appointment) > 0)
  <div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
        <div class="overflow-x-auto">
          <table class="min-w-full">
            <thead class="border-b">
              <tr>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  ID
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  Email
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  Service
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  Schedule
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  Status
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  Actions
                </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($appointment as $item)
                <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ $item->id }}
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{ $item->user }}
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{ $item->type }}
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    @switch($item->status)
                        @case('Pending')
                          <span class="inline-block rounded-full text-white bg-yellow-500 px-2 py-1 text-xs font-bold mr-3">{{ $item->status }}</span>
                        @break
                        @case('Accepted')
                          <span class="inline-block rounded-full text-white bg-blue-500 px-2 py-1 text-xs font-bold mr-3">{{ $item->status }}</span>
                        @break
                        @case('Approved')
                          <span class="inline-block rounded-full text-white bg-green-500 px-2 py-1 text-xs font-bold mr-3">{{ $item->status }}</span>
                        @break
                      @default
                        <span class="inline-block rounded-full text-white bg-yellow-500 px-2 py-1 text-xs font-bold mr-3">Warning</span>
                    @endswitch
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{ $item->schedule }}
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    @switch($item->status)
                        @case('Pending')
                          <a href="{{ route('view_appointment', $item->id) }}" class="bg-blue-500 p-2 font-semibold text-white inline-flex items-center space-x-2 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                          </a>
                        @break
                        @case('Accepted')
                          <a href="{{ route('view_appointment', $item->id) }}" class="bg-green-500 p-2 font-semibold text-white inline-flex items-center space-x-2 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                              <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                          </a>
                          @break
                        @case('Approved')
                          <a href="{{ route('view_appointment', $item->id) }}" class="bg-green-500 p-2 font-semibold text-white inline-flex items-center space-x-2 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                              <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                          </a>
                          @break
                      @default
                        <a href="{{ route('view_appointment', $item->id) }}" class="bg-blue-500 p-2 font-semibold text-white inline-flex items-center space-x-2 rounded">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                          </svg>
                        </a>
                    @endswitch
                    <a href="{{ route('cancel_appointment', $item->id) }}" class="bg-red-500 p-2 font-semibold text-white inline-flex items-center space-x-2 rounded">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                      </svg>
                    </a>
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@else
  <section class="text-gray-600 body-font">
  <div class="container mx-auto flex px-5 py-4 items-center justify-center flex-col">
    <img class="h-2/6 w-2/6 mb-10 object-cover object-center rounded" alt="hero" src="https://www.pngitem.com/pimgs/m/383-3835298_schedule-illustration-hd-png-download.png">
    <div class="text-center lg:w-2/3 w-full">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Schedule for an Appointment now!</h1>
      <p class="mb-8 leading-relaxed">Request for any important property docuementations has never been easier!</p>
      <div class="flex justify-center">
        <a href="{{ route('schedule') }}" class="inline-flex text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded text-lg">Take me there!</a>
      </div>
    </div>
  </div>
</section>
@endif
</x-app-layout>
