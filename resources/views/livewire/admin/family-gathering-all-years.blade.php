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