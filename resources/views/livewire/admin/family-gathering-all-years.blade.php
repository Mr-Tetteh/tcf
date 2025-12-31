<div class="p-10 sm:ml-64 min-h-screen bg-gradient-to-br from-gray-50 via-blue-50 to-gray-100 motion-preset-expand motion-duration-2000">
    <!-- Header Section -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Family Gathering Directory</h1>
        <p class="text-gray-600">Manage and view family member information</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Total Number of registered members</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $number_of_registered_members }}</p>
                </div>
                <svg class="w-10 h-10 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>
        </div>
    </div>


    <!-- Table Container -->
    @foreach($familiesByYear as $year => $families)
    <div id="print-{{ $year }}" class="year-section bg-white rounded-lg shadow-lg overflow-hidden mb-6 lg:mx-20" data-year="{{ $year }}">
        <!-- Print Button -->
        <div class="p-4 bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200 print:hidden">
            <button
                onclick="printYear('{{ $year }}')"
                id="printBtn-{{ $year }}"
                class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold rounded-lg shadow-md hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform hover:scale-105 transition-all duration-200"
            >
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                </svg>
                <span class="print-btn-text">Print {{ $year }} Directory</span>
                <span class="print-btn-loading hidden">
                    <svg class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </span>
            </button>
            <p class="text-xs text-gray-500 mt-2">Click to generate a print-friendly version of this year's directory</p>
        </div>

        <!-- Year Header -->
        <div class="px-6 py-4 bg-gradient-to-r from-blue-500 to-blue-600">
            <h2 class="text-2xl font-bold text-white flex items-center">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                Family Gathering – {{ $year }}
            </h2>
            <p class="text-blue-100 text-sm mt-1">{{ count($families) }} member(s) registered</p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                            <span class="flex items-center">
                                Full Name
                                <svg class="w-4 h-4 ms-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                </svg>
                            </span>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                            <span class="flex items-center">
                                Contact
                                <svg class="w-4 h-4 ms-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                </svg>
                            </span>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                            <span class="flex items-center">
                                Residence
                                <svg class="w-4 h-4 ms-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                </svg>
                            </span>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                            <span class="flex items-center">
                                Denomination
                                <svg class="w-4 h-4 ms-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                </svg>
                            </span>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                            <span class="flex items-center">
                                Year
                                <svg class="w-4 h-4 ms-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                </svg>
                            </span>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 ms-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                </svg>
                            </span>
                            Amount Paid
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach($families as $family)
                    <tr class="member-row hover:bg-blue-50 transition-all duration-200" 
                        data-name="{{ strtolower($family->full_name) }}"
                        data-contact="{{ strtolower($family->contact) }}"
                        data-residence="{{ strtolower($family->residence) }}"
                        data-denomination="{{ strtolower($family->denomination) }}"
                        data-year="{{ $family->year }}">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <div class="h-10 w-10 rounded-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center text-white font-semibold shadow-md">
                                        {{ strtoupper(substr($family->full_name, 0, 1)) }}
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-semibold text-gray-900">
                                        {{ $family->full_name }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                {{ $family->contact }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                {{ $family->residence }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                                {{ $family->denomination }}
                            </div>
                        </td>
                        
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex px-3 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800 shadow-sm">
                                {{ $family->year }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                                GHC{{ $family->amount_paid }}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    <b>Grand Total: GHC {{ $families->sum('amount_paid') }}</b> <br> <br>
                    <b>Total number of individuals with unrecorded payments or who did not collect their name tags: {{ $number_of_registered_members_without_amount_paid }}</b>
                </tbody>
            </table>
        </div>
    </div>
    @endforeach
</div>

@script
<script>
// Search and Filter Functionality
function filterMembers() {
    const searchValue = document.getElementById('searchInput').value.toLowerCase();
    const yearFilter = document.getElementById('yearFilter').value;
    
    const allRows = document.querySelectorAll('.member-row');
    const allSections = document.querySelectorAll('.year-section');
    
    let visibleCount = 0;
    let visibleSections = new Set();
    
    // Filter rows
    allRows.forEach(row => {
        const name = row.getAttribute('data-name');
        const contact = row.getAttribute('data-contact');
        const residence = row.getAttribute('data-residence');
        const denomination = row.getAttribute('data-denomination');
        const year = row.getAttribute('data-year');
        
        const matchesSearch = !searchValue || 
            name.includes(searchValue) || 
            contact.includes(searchValue) || 
            residence.includes(searchValue) || 
            denomination.includes(searchValue);
        
        const matchesYear = !yearFilter || year === yearFilter;
        
        if (matchesSearch && matchesYear) {
            row.style.display = '';
            visibleCount++;
            visibleSections.add(year);
        } else {
            row.style.display = 'none';
        }
    });
    
    // Show/hide year sections
    allSections.forEach(section => {
        const sectionYear = section.getAttribute('data-year');
        if (!yearFilter || sectionYear === yearFilter) {
            if (visibleSections.has(sectionYear)) {
                section.style.display = '';
            } else {
                section.style.display = 'none';
            }
        } else {
            section.style.display = 'none';
        }
    });
    
    // Update counter
    const counter = document.getElementById('resultsCounter');
    if (searchValue || yearFilter) {
        counter.textContent = `Showing ${visibleCount} member(s)`;
        counter.classList.add('font-medium', 'text-blue-600');
    } else {
        counter.textContent = '';
        counter.classList.remove('font-medium', 'text-blue-600');
    }
}

// Enhanced Print Functionality
window.printYear = function(year) {
    const section = document.getElementById(`print-${year}`);
    const button = document.getElementById(`printBtn-${year}`);
    
    if (!section) {
        alert('Nothing to print for year ' + year);
        return;
    }
    
    // Show loading state
    const btnText = button.querySelector('.print-btn-text');
    const btnLoading = button.querySelector('.print-btn-loading');
    btnText.classList.add('hidden');
    btnLoading.classList.remove('hidden');
    button.disabled = true;
    
    // Get the table content
    const tableContent = section.querySelector('.overflow-x-auto').innerHTML;
    const memberCount = section.querySelectorAll('.member-row').length;
    
    // Create print window
    const printWindow = window.open('', '_blank', 'width=1024,height=768');
    
    printWindow.document.write(`
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="UTF-8">
                <title>Family Gathering Directory – ${year}</title>
                <script src="https://cdn.tailwindcss.com"><\/script>
                <style>
                    @media print {
                        @page { 
                            margin: 0.5cm;
                            size: A4 portrait;
                        }
                        body { 
                            -webkit-print-color-adjust: exact;
                            print-color-adjust: exact;
                            font-size: 10px;
                        }
                        table { 
                            page-break-inside: auto;
                            font-size: 9px;
                            width: 100%;
                            table-layout: fixed;
                        }
                        tr { 
                            page-break-inside: avoid;
                            page-break-after: auto;
                        }
                        thead { 
                            display: table-header-group;
                        }
                        th, td {
                            padding: 0.35rem 0.4rem !important;
                            word-wrap: break-word;
                            overflow-wrap: break-word;
                            white-space: normal !important;
                            font-size: 8.5px;
                            line-height: 1.3;
                        }
                        th {
                            font-size: 8px;
                            font-weight: 700;
                        }
                        /* Column widths optimized for portrait */
                        th:nth-child(1), td:nth-child(1) { width: 22%; }  /* Name */
                        th:nth-child(2), td:nth-child(2) { width: 18%; }  /* Contact */
                        th:nth-child(3), td:nth-child(3) { width: 20%; }  /* Residence */
                        th:nth-child(4), td:nth-child(4) { width: 28%; }  /* Denomination */
                        th:nth-child(5), td:nth-child(5) { width: 12%; }  /* Year */
                        th:nth-child(6), td:nth-child(6) { width: 12%; }  /* Amount Paid */
                        
                        .page-break {
                            page-break-before: always;
                        }
                        .print-header {
                            font-size: 11px;
                            margin-bottom: 1rem;
                            padding-bottom: 0.5rem;
                        }
                        .print-header h1 {
                            font-size: 1.25rem;
                            margin-bottom: 0.25rem;
                        }
                        .print-header p {
                            font-size: 0.7rem;
                            margin: 0.1rem 0;
                        }
                        .print-footer {
                            font-size: 0.65rem;
                            margin-top: 1rem;
                            padding-top: 0.5rem;
                        }
                        /* Hide icons in print */
                        svg {
                            display: none !important;
                        }
                        /* Compact avatar */
                        .flex-shrink-0 {
                            height: 24px !important;
                            width: 24px !important;
                        }
                        .h-10 {
                            height: 24px !important;
                            width: 24px !important;
                            font-size: 10px !important;
                        }
                        .ml-4 {
                            margin-left: 0.5rem !important;
                        }
                    }
                    body { 
                        background: white !important;
                        font-family: system-ui, -apple-system, sans-serif;
                    }
                    .print-header {
                        border-bottom: 3px solid #2563eb;
                        margin-bottom: 1.5rem;
                        padding-bottom: 0.75rem;
                    }
                    .print-footer {
                        margin-top: 1.5rem;
                        padding-top: 0.75rem;
                        border-top: 1px solid #e5e7eb;
                        text-align: center;
                        color: #6b7280;
                        font-size: 0.75rem;
                    }
                    table {
                        table-layout: fixed;
                        width: 100%;
                    }
                    th, td {
                        overflow: hidden;
                    }
                </style>
            </head>
            <body class="p-8">
                <div class="max-w-full mx-auto">
                    <div class="print-header">
                        <h1 class="text-3xl font-bold text-gray-800 mb-2">Family Gathering Directory</h1>
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-xl font-semibold text-blue-600">Year: ${year}</p>

                                <p class="text-sm text-gray-600">Total Members: ${memberCount}</p>
                            </div>
                            <div class="text-right text-sm text-gray-600">
                                <p>Printed: ${new Date().toLocaleDateString()}</p>
                                <p>Time: ${new Date().toLocaleTimeString()}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="overflow-visible" style="width: 100%;">
                        ${tableContent}
                    </div>
                    
                    <div class="print-footer">
                        <p>Family Gathering– ${year}</p>
                        <p class="text-xs mt-1">This document is confidential and intended for TCF use only.</p>
                    </div>
                </div>
                
                <script>
                    window.onload = function() {
                        setTimeout(() => {
                            window.print();
                            window.onafterprint = function() {
                                window.close();
                            };
                        }, 800);
                    };
                <\/script>
            </body>
        </html>
    `);
    
    printWindow.document.close();
    
    // Reset button state after a delay
    setTimeout(() => {
        btnText.classList.remove('hidden');
        btnLoading.classList.add('hidden');
        button.disabled = false;
    }, 2000);
};
</script>
@endscript