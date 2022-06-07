<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $appointment->status === "Pending" ? "Edit" : "Proceeding with "}} Requested Appointment
        </h2>
    </x-slot>
@if(session('status'))
    <div role="alert" class="p-4">
        <div class="bg-blue-500 text-white font-bold rounded-t px-4 py-2">
            Info
        </div>
        <div class="border border-t-0 border-blue-400 rounded-b bg-blue-100 px-4 py-3 text-blue-700">
            <p>{{session('status')}}</p>
        </div>
    </div>
@endif
{{-- ? Flow:
    * If status is still pending changes in the type of service and schedule is still allowed
    * If status is already accepted changes in the aforementioned variables are no longer allowed
--}}
@switch($appointment->status)
    @case("Accepted")
        @switch($appointment->type)
            @case("Provision of Services for the Appraisal and Assessment of New and Undeclared Real Property...")
                <div class="bg-white py-2 px-6">
                    <h1 class="leading-4 font-bold">
                        REQUEST: Provision of Services for the Appraisal and Assessment of New and Undeclared Real Property Units 
                        <br>
                        including Machineries and for the Re-assessment of Renovated Building for Taxation Purposes.
                    </h1>
                    <p class="font-light italic">
                        If requirements below are complete, this transaction can normally be completed in three (3) to four (4) working days.
                    </p>
                    <form action="{{ route("service1", $appointment->id) }}" method="POST" enctype="multipart/form-data">
                        <label class="block mt-4 p-2 bg-gray-200 rounded-md">
                            <span class="text-gray-800 font-bold">One (1) copy of approved Building Permit.</span>
                            <input
                                type="file"
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
                        <label class="block mt-4 p-2 bg-gray-200 rounded-md">
                            <span class="text-gray-800 font-bold">One (1) copy of approved building floor plans.</span>
                            <input
                                type="file"
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
                        <label class="block mt-4 p-2 bg-gray-200 rounded-md">
                            <span class="text-gray-800 font-bold">One (1) copy of certificate of occupancy.</span>
                            <input
                                type="file"
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
                        <label class="block mt-4 p-2 bg-gray-200 rounded-md">
                            <span class="text-gray-800 font-bold">Accomplished and duly notarized sworn statement of owner with itemized listing of machineries if any. (For machineries only)</span>
                            <a href="{{Storage::url("forms/sworn.pdf")}}" class="text-gray-800 font-bold italic text-sm underline">Download Form Here</a>
                            <input
                                type="file"
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
                        <label class="block mt-4 p-2 bg-gray-200 rounded-md">
                            <span class="text-gray-800 font-bold">For renovated buildings, current Tax Clearance from City Treasurer’s Office.</span>
                            <input
                                type="file"
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
                        <button
                            type="submit"
                            class="border border-green-500 bg-green-500 text-white rounded-md mt-4 px-4 py-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline"
                        >
                            Submit Requirements
                        </button>
                    </form>
                </div>
                @break
            @case("Provisions of Services for the Transfer/Segregation/Consolidation of Tax Declaration...")
                <div class="bg-white py-2 px-6">
                    <h1 class="leading-4 font-bold">
                        REQUEST: Provisions of Services for the Transfer/Segregation/Consolidation of Tax Declaration of Donated/Sold/Subdivided/Consolidated Lots
                    </h1>
                    <p class="font-light italic">
                        If requirements below are complete, this transaction can normally be completed in three (3) to five (5) working days.
                    </p>
                    <form action="{{ route("service1", $appointment->id) }}" method="POST" enctype="multipart/form-data">
                        <label class="block mt-4 p-2 bg-gray-200 rounded-md">
                            <span class="text-gray-800 font-bold">One (1) copy of approved subdivision/consolidation plan.</span>
                            <input
                                type="file"
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
                        <label class="block mt-4 p-2 bg-gray-200 rounded-md">
                            <span class="text-gray-800 font-bold">One (1) copy of Extra-judicial Settlement/Deed of Partition/Deed of sale and other deed of conveyance (as applicable).</span>
                            <input
                                type="file"
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
                        <label class="block mt-4 p-2 bg-gray-200 rounded-md">
                            <span class="text-gray-800 font-bold">One (1) copy of Transfer Certificate of Title (if registered property).</span>
                            <input
                                type="file"
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
                        <label class="block mt-4 p-2 bg-gray-200 rounded-md">
                            <span class="text-gray-800 font-bold">Current Tax Clearance from City Treasurer’s Office.</span>
                            <input
                                type="file"
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
                        <label class="block mt-4 p-2 bg-gray-200 rounded-md">
                            <span class="text-gray-800 font-bold">Transfer Tax payment receipt.</span>
                            <input
                                type="file"
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
                        <label class="block mt-4 p-2 bg-gray-200 rounded-md">
                            <span class="text-gray-800 font-bold">Petition form, accomplished and notarized.</span>
                            <input
                                type="file"
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
                        <label class="block mt-4 p-2 bg-gray-200 rounded-md">
                            <span class="text-gray-800 font-bold">Certificate Authorizing Registration (CAR), BIR.</span>
                            <input
                                type="file"
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
                        <button
                            type="submit"
                            class="border border-green-500 bg-green-500 text-white rounded-md mt-4 px-4 py-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline"
                        >
                            Submit Requirements
                        </button>
                    </form>
                </div>
                @break
            @case("Issuance of Certified Photocopies and Certifications of Real Property Units...")
                <div class="bg-white py-2 px-6">
                    <h1 class="leading-5 font-bold">
                        REQUEST: Issuance of Certified Photocopies and Certifications of Real Property Units 
                        <br>
                        (Certificate of total landholdings, and Certificate of Improvements with or without)
                    </h1>
                    <p class="font-light italic">
                        Upon payment of required fees, this transaction can normally be completed in one (1) working day.
                    </p>
                    <p class="font-normal mt-4">
                        <strong>FEES:</strong><br>
                        <strong>Certified True Copy of Tax Declaration</strong> (P25.00) each plus documentary stamp <br>
                        <strong>Certificate of Improvements (with or without)</strong> (P50.00) each plus documentary stamp <br>
                        <strong>Certificate of Total Landholdings</strong> (P50.00) each plus documentary stamp <br>
                    </p>
                    <form action="{{ route("service1", $appointment->id) }}" method="POST" enctype="multipart/form-data">
                        <label class="block mt-4 p-2 bg-gray-200 rounded-md">
                            <span class="text-gray-800 font-bold">Request Form</span>
                            <br>
                            <a href="{{Storage::url("forms/request.pdf")}}" class="text-gray-800 font-bold italic text-sm underline">Download Form Here</a>
                            <input
                                type="file"
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
                        <button
                            type="submit"
                            class="border border-green-500 bg-green-500 text-white rounded-md mt-4 px-4 py-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline"
                        >
                            Submit Requirement
                        </button>
                    </form>
                </div>
                @break
            @case("Provision of Services for the Research of Old Tax Declaration")
                <div class="bg-white py-2 px-6">
                    <h1 class="leading-5 font-bold">
                        REQUEST: Provision of Services for the Research of Old Tax Declaration
                        
                    </h1>
                    <p class="font-light italic">                                                
                    This transaction for old documents filed in the office. This transaction can normally be completed in one (1) day. <br>
                    Request for additional supporting documents for documentation such as deed of sale and other deed of conveyances <br>
                    will be normally completed in two (2) to three (3) days. 
                    </p>
                    <p class="font-normal mt-4">
                        <strong>FEES:</strong><br>
                        <strong>Research Fee</strong> (P50.00)
                    </p>
                </div>
                @break
            @default
                
        @endswitch
        
        @break
    @case("Approved")
        <section class="text-gray-600 body-font">
        <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
            <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" alt="hero" src="https://miro.medium.com/max/1190/1*8QgPF5tXwo5NqhvXXncwSQ.png">
            <div class="text-center lg:w-2/3 w-full">
            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Appointment Approved!</h1>
            <p class="mb-8 leading-relaxed">You request {{ $appointment->type }} has been approved!</p>
            <div class="flex justify-center">
                <a href="{{ route('generate', $appointment->id )}}" class="inline-flex text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded text-lg">Generate Printable</a>
            </div>
            </div>
        </div>
        </section>
        @break
    @default
    <form action="{{ route("update_appointment", $appointment->id) }}" method="POST" class="bg-white py-2 px-6">
        @csrf
        <h3>Service Type: <strong>{{$appointment->type}}</strong></h3>
        <h3>Schedule: <strong>{{$appointment->schedule}}</strong></h3>
        <h3>Status: <strong>{{$appointment->status}}</strong></h3>
        <label class="block mt-4">
            <span class="font-bold mb-1 text-gray-700 block">Type of Service</span>
            <select
                name="type"
                id="type"
                class="
                block
                w-full
                mt-1
                rounded-md
                border-gray-300
                shadow-sm
                focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
                "
            >
                <option>
                    Provision of Services for the Appraisal and Assessment of New and Undeclared Real Property...
                </option>
                <option>
                    Provisions of Services for the Transfer/Segregation/Consolidation of Tax Declaration...
                </option>
                <option>
                    Issuance of Certified Photocopies and Certifications of Real Property Units...
                </option>
                <option>
                    Provision of Services for the Research of Old Tax Declaration
                </option>
            </select>
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
                        <label for="datepicker" class="font-bold mb-1 text-gray-700 block">Select Date</label>
                        <div class="relative">
                            <input type="hidden" name="date" x-ref="date">
                            <input 
                                name="schedule"
                                id="schedule"
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
            class="border border-blue-500 bg-blue-500 text-white rounded-md px-4 py-2 transition duration-500 ease select-none hover:bg-blue-600 focus:outline-none focus:shadow-outline"
        >
            Update Appointment
        </button>
    </form>
@endswitch
</x-app-layout>