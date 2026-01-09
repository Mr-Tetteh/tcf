<div class="p-10 sm:ml-64 min-h-screen bg-gradient-to-br from-gray-50 via-blue-50 to-gray-100">

    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Family Gathering Directory</h1>
        <p class="text-gray-600">Manage and view family member information</p>
    </div>

    {{-- ================= YEAR LOOP ================= --}}
    @foreach($familiesByYear as $year => $days)
        <div id="print-{{ $year }}"
             class="year-section bg-white rounded-lg shadow-lg overflow-hidden mb-10 lg:mx-20"
             data-year="{{ $year }}">

            <!-- Print Button -->
         <div class="p-4 bg-gray-100 border-b print:hidden">
    <button
        onclick="printYear('{{ $year }}')"
        id="printBtn-{{ $year }}"
        class="inline-flex items-center px-5 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
        <span class="print-btn-text">Print {{ $year }} Directory</span>
        <span class="print-btn-loading hidden flex items-center">
            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Preparing...
        </span>
    </button>
</div>

            <!-- Year Header -->
            <div class="px-6 py-4 bg-gradient-to-r from-blue-500 to-blue-600">
                <h2 class="text-2xl font-bold text-white">
                    Family Gathering – {{ $year }}
                </h2>
            </div>

            {{-- ================= DAY LOOP ================= --}}
            @foreach($days as $day => $families)

                <!-- Day Header -->
                <div class="bg-gray-50 px-6 py-3 border-b">
                    <h3 class="text-lg font-semibold text-gray-700">
                        {{ \Carbon\Carbon::parse($day)->format('l, d F Y') }}
                    </h3>
                    <p class="text-sm text-gray-500">
                        {{ $families->count() }} member(s) registered
                    </p>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Full Name</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Contact</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Residence</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Denomination</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Year</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Amount Paid</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach($families as $family)
                                <tr class="member-row hover:bg-blue-50">
                                    <td class="px-6 py-4 font-semibold">{{ $family->full_name }}</td>
                                    <td class="px-6 py-4">{{ $family->contact }}</td>
                                    <td class="px-6 py-4">{{ $family->residence }}</td>
                                    <td class="px-6 py-4">{{ $family->denomination }}</td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 text-xs rounded-full bg-blue-100 text-blue-800">
                                            {{ $family->year }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 font-medium">
                                        GHC {{ number_format($family->amount_paid, 2) }}
                                    </td>

                                    <td>
                                 <button
                                        wire:click="edit({{ $family->id }})"
                                        class="inline-flex items-center px-3 py-1.5 bg-indigo-50 text-indigo-700 rounded-lg hover:bg-indigo-100 transition"
                                    >
                                        <svg class="h-4 w-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        Edit
                                    </button>
                                    

                                        <button
                                            wire:click="delete({{ $family->id }})"
                                            class="inline-flex items-center px-3 py-1.5 bg-indigo-50 text-red-700 rounded-lg hover:bg-indigo-100 transition"
                                        >
                                            <svg class="h-4 w-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                            <!-- Day Total -->
                            <tr class="bg-gray-50">
                                <td colspan="6" class="px-6 py-3 text-right font-semibold">
                                    Day Total: GHC {{ number_format($families->sum('amount_paid'), 2) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            @endforeach

            <!-- Year Total -->
            <div class="px-6 py-4 bg-gray-100 text-right font-bold">
                Year Total:
                GHC {{ collect($days)->flatten()->sum('amount_paid') }}
            </div>

        </div>
    @endforeach


@if ($IsEdit)
  <div id="dialog" aria-labelledby="dialog-title" class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
    <el-dialog-backdrop class="fixed inset-0 bg-gray-500/75 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in"></el-dialog-backdrop>

    <div tabindex="0" class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
      <el-dialog-panel class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
          
              <form wire:submit="update"
                          class="bg-white rounded-xl shadow-sm p-8 space-y-8">
                        <div class="flex items-center justify-between border-b pb-6">
                            <h1 class="text-2xl font-bold text-gray-800">
                                Update Family Gathering Record
                            </h1>
                        </div>

                        <!-- Name Fields Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="firstName" class="block text-sm font-medium text-gray-700">
                                    Full Name <span class="text-red-500">*</span>
                                </label>
                                <input
                                    wire:model="full_name"
                                    type="text"
                                    id="fullName"
                                    name="fullName"
                                    placeholder="Enter full name"
                                    autocomplete="Danielo"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200"
                                >
                                <div class="text-red-400 text-sm">
                                    @error('full_name') {{$message}} @enderror
                                </div>
                            </div>

                             <div class="space-y-2">
                                <label for="contact" class="block text-sm font-medium text-gray-700">
                                    Contact Number <span class="text-red-500">*</span>
                                </label>
                                <input
                                    wire:model="contact"
                                    type="number"
                                    id="contact"
                                    name="contact"
                                    placeholder="Enter contact number"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200"
                                >
                                <div class="text-red-400 text-sm">
                                    @error('contact') {{$message}} @enderror
                                </div>
                            </div>

                            
                        </div>

                        <!-- Other Names and Residence -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            

                            <div class="space-y-2">
                                <label for="residence" class="block text-sm font-medium text-gray-700">
                                    Residence <span class="text-red-500">*</span>
                                </label>
                                <input
                                    wire:model="residence"
                                    type="text"
                                    id="residence"
                                    name="residence"
                                    placeholder="Enter residence"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200"
                                >
                                <div class="text-red-400 text-sm">
                                    @error('residence') {{$message}} @enderror
                                </div>
                            </div>

                         

                               <div class="space-y-2">
                            <label for="church" class="block text-sm font-medium text-gray-700">
                                Demomination <span class="text-red-500">*</span>
                            </label>
                            <input
                                wire:model="denomination"
                                type="text"
                                id="denomination"
                                name="denomination"
                                placeholder="Enter denomination"
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200"
                            >
                            <div class="text-red-400 text-sm">
                                @error('denomination') {{$message}} @enderror
                            </div>
                        </div>

                           <div class="space-y-2">
                                <label for="amount_paid" class="block text-sm font-medium text-gray-700">
                                    Amount Paid <span class="text-red-500">*</span>
                                </label>
                                <input
                                    wire:model="amount_paid"
                                    type="text"
                                    id="amount_paid"
                                    name="amount_paid"
                                    placeholder="Enter amount paid"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200"
                                >
                                <div class="text-red-400 text-sm">
                                    @error('amount_paid') {{$message}} @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="pt-6 space-y-4">
                            <button
                                type="submit"
                                class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200 font-medium text-lg"
                            >
                                Update
                            </button>


                        </div>
                    </form>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
          <button wire:click="cancelEdit"  class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs inset-ring inset-ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
        </div>
      </el-dialog-panel>
    </div>
  </div>
@endif


</div>

@script
<script>
window.printYear = function(year) {
    // 1. Find the specific year container
    const section = document.getElementById(`print-${year}`);
    const button = document.getElementById(`printBtn-${year}`);
    
    if (!section) {
        alert('Nothing to print for year ' + year);
        return;
    }
    
    // 2. Show loading state on the button
    const btnText = button.querySelector('.print-btn-text');
    const btnLoading = button.querySelector('.print-btn-loading');
    
    if(btnText && btnLoading) {
        btnText.classList.add('hidden');
        btnLoading.classList.remove('hidden');
    }
    button.disabled = true;

    // 3. Clone the section so we can modify it for printing without affecting the UI
    const printContent = section.cloneNode(true);
    
    // Remove the print button from the clone so it doesn't show up on paper
    const printBtnInClone = printContent.querySelector('.print\\:hidden');
    if (printBtnInClone) printBtnInClone.remove();

    const memberCount = section.querySelectorAll('.member-row').length;
    
    // 4. Create a new print window
    const printWindow = window.open('', '_blank', 'width=1024,height=768');
    
    printWindow.document.write(`
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="UTF-8">
                <title>Family Directory – ${year}</title>
                <script src="https://cdn.tailwindcss.com"><\/script>
                <style>
                    @media print {
                        @page { margin: 1cm; size: A4 portrait; }
                        body { -webkit-print-color-adjust: exact; print-color-adjust: exact; background: white; }
                        table { width: 100%; border-collapse: collapse; page-break-inside: auto; }
                        tr { page-break-inside: avoid; page-break-after: auto; }
                        th, td { border: 1px solid #e5e7eb; padding: 6px 8px; font-size: 10px; }
                        th { background-color: #f3f4f6 !important; font-weight: bold; text-transform: uppercase; }
                        .bg-blue-600 { background-color: #2563eb !important; color: white !important; }
                    }
                </style>
            </head>
            <body class="p-6">
                <div class="mb-6 border-b-4 border-blue-600 pb-4">
                    <h1 class="text-3xl font-bold text-gray-800">Family Gathering Directory</h1>
                    <div class="flex justify-between items-end mt-2">
                        <div>
                            <p class="text-lg font-semibold text-blue-600">Year: ${year}</p>
                            <p class="text-sm text-gray-500">Total Members: ${memberCount}</p>
                        </div>
                        <div class="text-right text-xs text-gray-400">
                            <p>Printed: ${new Date().toLocaleDateString()}</p>
                            <p>Time: ${new Date().toLocaleTimeString()}</p>
                        </div>
                    </div>
                </div>
                
                <div class="print-tables-wrapper">
                    ${printContent.innerHTML}
                </div>

                <div class="mt-8 pt-4 border-t border-gray-200 text-center text-xs text-gray-400">
                    <p>Family Gathering – ${year}</p>
                    <p>This document is confidential and intended for family use only.</p>
                </div>

                <script>
                    window.onload = function() {
                        // Small delay to ensure Tailwind styles apply before print dialog opens
                        setTimeout(() => {
                            window.print();
                            window.onafterprint = function() { window.close(); };
                        }, 500);
                    };
                <\/script>
            </body>
        </html>
    `);
    
    printWindow.document.close();
    
    // 5. Reset the original button state
    setTimeout(() => {
        if(btnText && btnLoading) {
            btnText.classList.remove('hidden');
            btnLoading.classList.add('hidden');
        }
        button.disabled = false;
    }, 1500);
};
</script>
@endscript