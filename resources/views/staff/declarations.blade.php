<x-app-layout>
@if(session('status'))
    <div role="alert" class="p-4">
        <div class="bg-blue-500 text-white font-bold rounded-t px-4 py-2">
        </div>
        <div class="border border-t-0 border-blue-400 rounded-b bg-blue-100 px-4 py-3 text-blue-700">
            <p>{{session('status')}}</p>
        </div>
    </div>
@endif

<form action="{{ route("add_declaration") }}" method="POST" enctype="multipart/form-data" class="bg-white py-2 px-6">
    @csrf
    <label class="block mt-2 p-2 rounded-md">
        <span class="text-gray-800 font-bold">Owner</span>
        <input
            type="text"
            name="owner"
            id="owner"
            class="
            mt-1
            block
            w-full
            rounded-md
            border-gray-300
            shadow-sm
            focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
            "
            placeholder=""
        />
    </label>
    <label class="block mt-4 p-2 rounded-md">
        <span class="text-gray-800 font-bold">Scanned Tax Declaration</span>
        <input
            type="file"
            name="file"
            id="file"
            class="
            mt-1
            block
            w-full
            rounded-md
            border-gray-300
            shadow-sm
            focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
            "
            placeholder=""
        />
    </label>
    <style>
        [x-cloak] {
            display: none;
        }
    </style>
    <div class="antialiased sans-serif">
        <div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
            <div class="container min-w-full py-2">
                <div class="mb-5">
                    <label for="datepicker" class="font-bold mb-1 text-gray-700 block">Date of Declaration</label>
                    <div class="relative">
                        <input type="hidden" name="date_declared" x-ref="date">
                        <input 
                            name="date_declared"
                            id="date_declared"
                            type="text"
                            readonly
                            x-model="datepickerValue"
                            @click="showDatepicker = !showDatepicker"
                            @keydown.escape="showDatepicker = false"
                            class="min-w-full py-3 leading-none rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                            placeholder="Select date">
                            <div class="absolute top-0 right-0 px-3 py-2">
                                <svg class="h-6 w-6 text-gray-400"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div
                                class="bg-white mt-12 rounded-lg shadow p-4 absolute top-0 left-0" 
                                style="width: 17rem" 
                                x-show.transition="showDatepicker"
                                @click.away="showDatepicker = false">
                                <div class="flex justify-between items-center mb-2">
                                    <div>
                                        <span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-gray-800"></span>
                                        <span x-text="year" class="ml-1 text-lg text-gray-600 font-normal"></span>
                                    </div>
                                    <div>
                                        <button 
                                            type="button"
                                            class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 rounded-full" 
                                            :class="{'cursor-not-allowed opacity-25': month == 0 }"
                                            :disabled="month == 0 ? true : false"
                                            @click="month--; getNoOfDays()">
                                            <svg class="h-6 w-6 text-gray-500 inline-flex"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                            </svg>  
                                        </button>
                                        <button 
                                            type="button"
                                            class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 rounded-full" 
                                            :class="{'cursor-not-allowed opacity-25': month == 11 }"
                                            :disabled="month == 11 ? true : false"
                                            @click="month++; getNoOfDays()">
                                            <svg class="h-6 w-6 text-gray-500 inline-flex"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                            </svg>									  
                                        </button>
                                    </div>
                                </div>
                                <div class="flex flex-wrap mb-3 -mx-1">
                                    <template x-for="(day, index) in DAYS" :key="index">	
                                        <div style="width: 14.26%" class="  -1">
                                            <div
                                                x-text="day" 
                                                class="text-gray-800 font-medium text-center text-xs"></div>
                                        </div>
                                    </template>
                                </div>
                                <div class="flex flex-wrap -mx-1">
                                    <template x-for="blankday in blankdays">
                                        <div 
                                            style="width: 14.28%"
                                            class="text-center border p-1 border-transparent text-sm"	
                                        ></div>
                                    </template>	
                                    <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">	
                                        <div style="width: 14.28%" class="px-1 mb-1">
                                            <div
                                                @click="getDateValue(date)"
                                                x-text="date"
                                                class="cursor-pointer text-center text-sm rounded-full leading-loose transition ease-in-out duration-100"
                                                :class="{'bg-blue-500 text-white': isToday(date) == true, 'text-gray-700 hover:bg-blue-200': isToday(date) == false }"	
                                            ></div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const MONTH_NAMES = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            const DAYS = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            function app() {
                return {
                    showDatepicker: false,
                    datepickerValue: '',
                    month: '',
                    year: '',
                    no_of_days: [],
                    blankdays: [],
                    days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                    initDate() {
                        let today = new Date();
                        this.month = today.getMonth();
                        this.year = today.getFullYear();
                        this.datepickerValue = new Date(this.year, this.month, today.getDate()).toDateString();
                    },
                    isToday(date) {
                        const today = new Date();
                        const d = new Date(this.year, this.month, date);
                        return today.toDateString() === d.toDateString() ? true : false;
                    },
                    getDateValue(date) {
                        let selectedDate = new Date(this.year, this.month, date);
                        this.datepickerValue = selectedDate.toDateString();
                        this.$refs.date.value = selectedDate.getFullYear() +"-"+ ('0'+ selectedDate.getMonth()).slice(-2) +"-"+ ('0' + selectedDate.getDate()).slice(-2);
                        console.log(this.$refs.date.value);
                        this.showDatepicker = false;
                    },
                    getNoOfDays() {
                        let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();
                        let dayOfWeek = new Date(this.year, this.month).getDay();
                        let blankdaysArray = [];
                        for ( var i=1; i <= dayOfWeek; i++) {
                            blankdaysArray.push(i);
                        }
                        let daysArray = [];
                        for ( var i=1; i <= daysInMonth; i++) {
                            daysArray.push(i);
                        }
                        this.blankdays = blankdaysArray;
                        this.no_of_days = daysArray;
                    }
                }
            }
        </script>
    </div>
    <button
        type="submit"
        class="border border-blue-500 bg-blue-500 text-white rounded-md px-4 py-2 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline"
    >
        Add Declaration
    </button>
</form>
@if(count($declarations) > 0)
<div class="flex flex-col px-8">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    <form action="{{ route("search_declaration") }}" method="POST" class="bg-white px-6">
    @csrf
    <label class="block mt-2 p-2 rounded-md">
        <span class="text-gray-800 font-bold">Search tax declarations by owner</span>
        <input
            type="text"
            name="query"
            id="query"
            class="
            mt-1
            block
            w-full
            rounded-md
            border-gray-300
            shadow-sm
            focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
            "
            placeholder=""
        />
    </label>
</form>
    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
        <div class="overflow-x-auto">
        <table class="min-w-full">
            <thead class="border-b">
            <tr>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                ID
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Owner
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Date Declared
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Actions
                </th>
            </tr>
            </thead>
            <tbody>
                @foreach ($declarations as $item)
                <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ $item->id }}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{ $item->owner }}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{ $item->date_declared }}
                </td>
                
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('view_declaration', $item->id) }}" class="bg-green-500 p-2 font-semibold text-white inline-flex items-center space-x-2 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </a>
                    <a href="{{ route('delete_declaration', $item->id) }}" class="bg-red-500 p-2 font-semibold text-white inline-flex items-center space-x-2 rounded">
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
<section class="text-gray-600 body-font mt-4">
    <div class="container mx-auto flex px-5 py-4 items-center justify-center flex-col">
        <div class="text-center lg:w-2/3 w-full">
            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">No declarations recorded!</h1>
        </div>
    </div>
</section>
@endif
</x-app-layout>