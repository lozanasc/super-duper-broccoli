<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ $appointment->user }}'s request for {{ $appointment->type }}
        </h2>
    </x-slot>
@if(session('status'))
  <div role="alert" class="py-4 px-8">
      <div class="bg-blue-500 text-white font-bold rounded-t px-4 py-2">
      </div>
      <div class="border border-t-0 border-blue-400 rounded-b bg-blue-100 px-4 py-3 text-blue-700">
          <p>{{session('status')}}</p>
      </div>
  </div>
@endif
  <div class="bg-white min-h-full min-w-full px-8">
    <div class="bg-gray-200 p-4 rounded-lg mb-2">
      <h1 class="text-lg font-bold mb-1 text-gray-700 block">Type of Service</h1>
      <p class="font-light mb-1 text-gray-800 block">{{ $appointment->type }}</p>
    </div>
    <div class="bg-gray-200 p-4 rounded-lg mb-2">
      <h1 class="text-lg font-bold mb-1 text-gray-700 block">Status</h1>
      <p class="font-light mb-1 text-gray-800 block">{{ $appointment->status }}</p>
    </div>
    <div class="bg-gray-200 p-4 rounded-lg mb-2">
      <h1 class="text-lg font-bold mb-1 text-gray-700 block">Schedule</h1>
      <p class="font-light mb-1 text-gray-800 block">{{ $appointment->schedule }}</p>
    </div>
    <div class="bg-gray-200 p-4 rounded-lg mb-2">
      @switch($appointment->status)
        @case("Accepted")
          <div class="bg-gray-200 p-4 rounded-lg mb-2">
              <h1 class="text-lg font-bold mb-1 text-gray-700 block">
                @if($appointment->complete === "Complete")
                  {{ $appointment->user }}'s submitted requirements for {{ $appointment->type }}
                @else
                  {{ $appointment->user }} have not submitted requirements!
                @endif
              </h1>
              @if($appointment->complete === "Complete")
                @switch($appointment->type)
                  @case("Provision of Services for the Appraisal and Assessment of New and Undeclared Real Property...")
                    <div class="bg-gray-200 rounded-lg mb-2">
                      <h1 class="text-lg font-bold mb-1 text-gray-700 block">Copy of Building Permit:</h1>
                      <a
                        href="{{ Storage::url($requirements->consolidation_plan) }}"
                        type="submit"
                        class="border border-blue-500 bg-blue-500 text-white rounded-md mr-2 px-4 py-2 transition duration-500 ease select-none hover:bg-blue-600 focus:outline-none focus:shadow-outline"
                      >
                          See submitted file
                      </a>
                    </div>
                    <div class="bg-gray-200 rounded-lg mb-2">
                      <h1 class="text-lg font-bold mb-1 text-gray-700 block">Copy of Building Floor Plans:</h1>
                      <a
                        href="{{ Storage::url($requirements->deed) }}"
                        type="submit"
                        class="border border-blue-500 bg-blue-500 text-white rounded-md mr-2 px-4 py-2 transition duration-500 ease select-none hover:bg-blue-600 focus:outline-none focus:shadow-outline"
                      >
                          See submitted file
                      </a>
                    </div>
                    <div class="bg-gray-200 rounded-lg mb-2">
                      <h1 class="text-lg font-bold mb-1 text-gray-700 block">Certificate of Occupancy:</h1>
                      <a
                        href="{{ Storage::url($requirements->transfer_cert) }}"
                        type="submit"
                        class="border border-blue-500 bg-blue-500 text-white rounded-md mr-2 px-4 py-2 transition duration-500 ease select-none hover:bg-blue-600 focus:outline-none focus:shadow-outline"
                      >
                          See submitted file
                      </a>
                    </div>
                    <div class="bg-gray-200 rounded-lg mb-2">
                      <h1 class="text-lg font-bold mb-1 text-gray-700 block">Sworn Statement:</h1>
                      <a
                        href="{{ Storage::url($requirements->tax_clearance) }}"
                        type="submit"
                        class="border border-blue-500 bg-blue-500 text-white rounded-md mr-2 px-4 py-2 transition duration-500 ease select-none hover:bg-blue-600 focus:outline-none focus:shadow-outline"
                      >
                          See submitted file
                      </a>
                    </div>
                    <div class="bg-gray-200 rounded-lg mb-2">
                      <h1 class="text-lg font-bold mb-1 text-gray-700 block">Tax Clearance:</h1>
                      <a
                        href="{{ Storage::url($requirements->tax_receipt) }}"
                        type="submit"
                        class="border border-blue-500 bg-blue-500 text-white rounded-md mr-2 px-4 py-2 transition duration-500 ease select-none hover:bg-blue-600 focus:outline-none focus:shadow-outline"
                      >
                          See submitted file
                      </a>
                    </div>
                  @break
                  @case("Provisions of Services for the Transfer/Segregation/Consolidation of Tax Declaration...")
                    <div class="bg-gray-200 rounded-lg mb-2">
                      <h1 class="text-lg font-bold mb-1 text-gray-700 block">One (1) copy of approved subdivision/consolidation plan.:</h1>
                      <a
                        href="{{ Storage::url($requirements->consolidation_plan) }}"
                        type="submit"
                        class="border border-blue-500 bg-blue-500 text-white rounded-md mr-2 px-4 py-2 transition duration-500 ease select-none hover:bg-blue-600 focus:outline-none focus:shadow-outline"
                      >
                          See submitted file
                      </a>
                    </div>
                    <div class="bg-gray-200 rounded-lg mb-2">
                      <h1 class="text-lg font-bold mb-1 text-gray-700 block">One (1) copy of Extra-judicial Settlement/Deed of Partition/Deed of sale and other deed of conveyance (as applicable):</h1>
                      <a
                        href="{{ Storage::url($requirements->deed) }}"
                        type="submit"
                        class="border border-blue-500 bg-blue-500 text-white rounded-md mr-2 px-4 py-2 transition duration-500 ease select-none hover:bg-blue-600 focus:outline-none focus:shadow-outline"
                      >
                          See submitted file
                      </a>
                    </div>
                    <div class="bg-gray-200 rounded-lg mb-2">
                      <h1 class="text-lg font-bold mb-1 text-gray-700 block">One (1) copy of Transfer Certificate of Title (if registered property):</h1>
                      <a
                        href="{{ Storage::url($requirements->transfer_cert) }}"
                        type="submit"
                        class="border border-blue-500 bg-blue-500 text-white rounded-md mr-2 px-4 py-2 transition duration-500 ease select-none hover:bg-blue-600 focus:outline-none focus:shadow-outline"
                      >
                          See submitted file
                      </a>
                    </div>
                    <div class="bg-gray-200 rounded-lg mb-2">
                      <h1 class="text-lg font-bold mb-1 text-gray-700 block">Current Tax Clearance from City Treasurer’s Office:</h1>
                      <a
                        href="{{ Storage::url($requirements->tax_clearance) }}"
                        type="submit"
                        class="border border-blue-500 bg-blue-500 text-white rounded-md mr-2 px-4 py-2 transition duration-500 ease select-none hover:bg-blue-600 focus:outline-none focus:shadow-outline"
                      >
                          See submitted file
                      </a>
                    </div>
                    <div class="bg-gray-200 rounded-lg mb-2">
                      <h1 class="text-lg font-bold mb-1 text-gray-700 block">Transfer Tax payment receipt:</h1>
                      <a
                        href="{{ Storage::url($requirements->tax_receipt) }}"
                        type="submit"
                        class="border border-blue-500 bg-blue-500 text-white rounded-md mr-2 px-4 py-2 transition duration-500 ease select-none hover:bg-blue-600 focus:outline-none focus:shadow-outline"
                      >
                          See submitted file
                      </a>
                    </div>
                    <div class="bg-gray-200 rounded-lg mb-2">
                      <h1 class="text-lg font-bold mb-1 text-gray-700 block">Petition form, accomplished and notarized:</h1>
                      <a
                        href="{{ Storage::url($requirements->petition_form) }}"
                        type="submit"
                        class="border border-blue-500 bg-blue-500 text-white rounded-md mr-2 px-4 py-2 transition duration-500 ease select-none hover:bg-blue-600 focus:outline-none focus:shadow-outline"
                      >
                          See submitted file
                      </a>
                    </div>
                    <div class="bg-gray-200 rounded-lg mb-2">
                      <h1 class="text-lg font-bold mb-1 text-gray-700 block">Certificate Authorizing Registration (CAR), BIR:</h1>
                      <a
                        href="{{ Storage::url($requirements->cert_auth_reg) }}"
                        type="submit"
                        class="border border-blue-500 bg-blue-500 text-white rounded-md mr-2 px-4 py-2 transition duration-500 ease select-none hover:bg-blue-600 focus:outline-none focus:shadow-outline"
                      >
                          See submitted file
                      </a>
                    </div>
                  @break
                  @case("Issuance of Certified Photocopies and Certifications of Real Property Units...")
                    <div class="bg-gray-200 rounded-lg mb-2">
                      <h1 class="text-lg font-bold mb-1 text-gray-700 block">Request Form:</h1>
                      <a
                        href="{{ Storage::url($requirements->form) }}"
                        type="submit"
                        class="border border-blue-500 bg-blue-500 text-white rounded-md mr-2 px-4 py-2 transition duration-500 ease select-none hover:bg-blue-600 focus:outline-none focus:shadow-outline"
                      >
                          See submitted file
                      </a>
                    </div>
                  @break
                  @case("Provision of Services for the Research of Old Tax Declaration")
                    <div class="bg-gray-200 rounded-lg mb-2">
                      <h1 class="text-lg font-bold mb-1 text-gray-700 block">No requirements, only show service fee receipt in person.</h1>
                    </div>
                  @break
                  @default
                @endswitch
              @endif
          </div>
          @break
        @default
      @endswitch
    </div>
    <div class="bg-gray-200 p-4 rounded-lg mb-2">
    @switch($appointment->status)
      @case("Pending")
        <a
          href="{{ route('accept_appointment', $appointment->id) }}"
          type="submit"
          class="border border-green-500 bg-green-500 text-white rounded-md mr-2 px-4 py-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline"
        >
            Accept
        </a>
        @break
        @case("Accepted")
        <a
          href="{{ route('approve_appointment', $appointment->id) }}"
          type="submit"
          class="border border-green-500 bg-green-500 text-white rounded-md mr-2 px-4 py-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline"
        >
            Approve
        </a>
        @break
      @default
    @endswitch
    <a
      href="{{ route('cancel_appointment', $appointment->id) }}"
      type="submit"
      class="border border-red-500 bg-red-500 text-white rounded-md px-4 py-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline"
    >
      @if($appointment->type==="Approved")
        Reject
      @else
        Delete
      @endif
    </a>
    </div>
  </div>
</x-app-layout>
