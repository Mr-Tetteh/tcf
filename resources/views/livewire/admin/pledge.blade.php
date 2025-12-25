<div class="p-4 sm:ml-64  min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 motion-preset-expand motion-duration-2000">

    <section class="py-8 px-4">
        <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">

                <div class="lg:w-5/12">
                    @if (session()->has('message'))
                        <div
                            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-md">
                            {{ session('message') }}
                        </div>
                    @endif
                    <!-- Form Container -->
                    <form class="max-w-3xl mx-auto" wire:submit.prevent="{{$Edit? 'update': 'create'}}">
                        <!-- Header -->
                        <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-t-xl p-6">
                            <h2 class="text-2xl font-bold text-white">Pledge Management</h2>
                            <p class="text-blue-100 mt-1">Add a new pledge</p>
                        </div>

                        <!-- Form Content -->
                        <div class="bg-white rounded-b-xl shadow-lg p-8 space-y-8">
                            <!-- Pledge Details Section -->
                            <div class="space-y-6">
                                <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Pledge Details</h3>

                                <div class="space-y-6">
                                    <!-- Image Name -->
                                    <div class="relative">
                                        <label class="text-sm font-medium text-gray-700 block mb-2">
                                            Full name <span class="text-red-500">*</span>
                                        </label>
                                        <input
                                            type="text"
                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white"
                                            placeholder="Enter the Full name"
                                            wire:model="full_name"
                                        >
                                    </div>
                                    <div class="text-red-600">
                                        @error('full_name')
                                        {{$message}}
                                        @enderror
                                    </div>

                                     <div class="relative">
                                        <label class="text-sm font-medium text-gray-700 block mb-2">
                                            Pledge Type <span class="text-red-500">*</span>
                                        </label>
                                    <select
                                        wire:model.live="plede_type"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500"
                                    >
                                        <option value="">Select Pledge Type</option>
                                        <option value="Financial">Financial</option>
                                        <option value="Material">Material</option>
                                    </select>

                                    </div>

                                    <div class="text-red-600">
                                        @error('plede_type')
                                        {{$message}}
                                        @enderror
                                    </div>


                                     <div class="relative">
                                        <label class="text-sm font-medium text-gray-700 block mb-2">
                                            Phone Number <span class="text-red-500">*</span>
                                        </label>
                                        <input
                                            type="text"
                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white"
                                            placeholder="Enter the phone number"
                                            wire:model="phone_number"
                                        >
                                    </div>
                                    <div class="text-red-600">
                                        @error('phone_number')
                                        {{$message}}
                                        @enderror
                                    </div>

                                        @if ($plede_type === 'Financial')

                                       <div class="relative">
                                        <label class="text-sm font-medium text-gray-700 block mb-2">
                                            Amount<span class="text-red-500">*</span>
                                        </label>
                                        <input
                                            type="text"
                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white"
                                            placeholder="Enter the amount pledged"
                                            wire:model="amount_pledged"
                                        >
                                    </div>
                                    <div class="text-red-600">
                                        @error('amount_pledged')
                                        {{$message}}
                                        @enderror
                                    </div>
                                    @endif


                                    @if ($plede_type === 'Material')

                                    <div class="relative">
                                        <label class="text-sm font-medium text-gray-700 block mb-2">
                                            Material Pledge<span class="text-red-500">*</span>
                                        </label>
                                        <input
                                            type="text"
                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white"
                                            placeholder="Enter the pledge item"
                                            wire:model="pledge_item"
                                        >
                                    </div>
                                    <div class="text-red-600">
                                        @error('pledge_item')
                                        {{$message}}
                                        @enderror
                                    </div>
                                    @endif
                                   

                                    <!-- Submit Button -->
                                    <button
                                        type="submit"
                                        class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center justify-center gap-2"
                                    >
                                        <!-- Upload Icon -->
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                        </svg>
                                        {{$Edit? "Update image": "Upload Picture"}}

                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>           
                     </div>

               <div class="lg:w-7/12">
    <div class="bg-white rounded-xl shadow-sm p-6">
        <!-- Header with Print Button -->
        <div class="flex justify-between items-center mb-6">
            <div class="text-xl font-semibold text-gray-800">Uploaded Pledge</div>
            <button
                onclick="printPledges()"
                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-105">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                </svg>
                <span class="font-semibold">Print Pledges</span>
            </button>
        </div>

        <div class="overflow-x-auto">
            <table id="pledges-table" class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Name</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Phone</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Amount pledged</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Material pledged</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($datas as $data)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="ml-4">
                                    <div class="font-medium text-gray-900">{{$data->full_name}}</div>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="ml-4">
                                    <div class="font-medium text-gray-900">{{$data->phone_number}}</div>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="ml-4">
                                    <div class="font-medium text-gray-900">{{$data->amount_pledged ? 'GHC '. $data->amount_pledged : "N/A"}}</div>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="ml-4">
                                    <div class="font-medium text-gray-900">{{$data->pledge_item ? $data->pledge_item : "N/A"}}</div>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex space-x-3">
                                <button
                                    wire:click="edit({{$data->id}})"
                                    class="inline-flex items-center px-3 py-1.5 bg-amber-100 text-amber-700 rounded-lg hover:bg-amber-200 transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1.5" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    Edit
                                </button>
                                <div x-data="{ open: false }">
    <!-- Delete Trigger Button -->
    <button 
        @click="open = true" 
        class="inline-flex items-center px-3 py-1.5 bg-red-50 text-red-700 rounded-lg hover:bg-red-100 border border-red-200 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transform hover:scale-105"
    >
        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
        </svg>
        Delete
    </button>

    <!-- Modal Overlay -->
    <div 
        x-show="open" 
        x-transition.opacity.duration.300ms
        class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 p-4"
        @click.self="open = false"
    >
        <!-- Modal Container -->
        <div 
            x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            class="bg-white rounded-2xl shadow-2xl w-full max-w-md transform"
            @click.stop
        >
            <!-- Modal Header with Icon -->
            <div class="relative pt-8 pb-6 px-8 text-center">
                <!-- Warning Icon Circle -->
                <div class="mx-auto w-20 h-20 bg-gradient-to-br from-red-100 to-red-50 rounded-full flex items-center justify-center mb-6 shadow-lg">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center">
                        <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                </div>

                <!-- Close Button -->
                <button 
                    @click="open = false"
                    class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors duration-200"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                <!-- Title -->
                <h2 class="text-2xl font-bold text-gray-900 mb-3">
                    Confirm Deletion
                </h2>
                
                <!-- Description -->
                <p class="text-gray-600 leading-relaxed">
                    Are you sure you want to delete this record? 
                    <span class="block mt-2 font-semibold text-red-600">This action cannot be undone.</span>
                </p>
            </div>

            <!-- Divider -->
            <div class="border-t border-gray-100"></div>

            <!-- Modal Footer with Buttons -->
            <div class="px-8 py-6 bg-gray-50 rounded-b-2xl">
                <div class="flex flex-col sm:flex-row gap-3">
                    <!-- Cancel Button -->
                    <button 
                        @click="open = false"
                        class="flex-1 px-6 py-3 bg-white border-2 border-gray-300 text-gray-700 font-semibold rounded-xl hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-4 focus:ring-gray-200 transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center space-x-2"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        <span>Cancel</span>
                    </button>
                    
                    <!-- Delete Button -->
                    <button 
                        wire:click="delete({{ $data->id }})"
                        @click="open = false"
                        class="flex-1 px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white font-semibold rounded-xl hover:from-red-700 hover:to-red-800 focus:outline-none focus:ring-4 focus:ring-red-200 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center space-x-2"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        <span>Delete</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

            </div>
        </div>
    </section>
</div>
@script
<script>
    // Explicitly attach to window so onclick="printPledges()" can find it
    window.printPledges = function() {
        const table = document.getElementById('pledges-table');
        
        if (!table) {
            alert('Unable to find pledges table');
            return;
        }

        // Get all data rows
        const rows = table.querySelectorAll('tbody tr');
        
        // Calculate stats
        let monetaryCount = 0;
        let materialCount = 0;
        
        rows.forEach(row => {
            const cells = row.querySelectorAll('td');
            if (cells.length >= 4) {
                if (cells[2].textContent.trim() !== 'N/A') monetaryCount++;
                if (cells[3].textContent.trim() !== 'N/A') materialCount++;
            }
        });

        const printWindow = window.open('', '_blank', 'width=1024,height=768');
        const today = new Date().toLocaleDateString('en-US', { 
            weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' 
        });

        // Use a single template literal for cleaner code
        let htmlContent = `
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset="UTF-8">
                <title>Pledges Report</title>
                <style>
                    @page { size: A4 portrait; margin: 1.5cm; }
                    body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif; padding: 20px; color: #111; line-height: 1.5; }
                    .header { text-align: center; margin-bottom: 30px; border-bottom: 3px solid #2563eb; padding-bottom: 20px; }
                    .header h1 { color: #1e3a8a; font-size: 24pt; margin: 0; }
                    .header p { color: #3b82f6; font-size: 14pt; font-weight: 600; margin: 5px 0 0 0; }
                    .stats { display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px; margin-bottom: 30px; }
                    .stat-box { background: #f8fafc; border: 1px solid #e2e8f0; padding: 15px; border-radius: 8px; text-align: center; }
                    .stat-label { font-size: 10pt; color: #64748b; text-transform: uppercase; font-weight: bold; }
                    .stat-value { font-size: 18pt; color: #1e3a8a; font-weight: bold; }
                    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                    th { background: #f1f5f9; padding: 12px 8px; text-align: left; font-size: 10pt; border: 1px solid #cbd5e1; }
                    td { padding: 10px 8px; border: 1px solid #e2e8f0; font-size: 10pt; }
                    tr:nth-child(even) { background: #f8fafc; }
                    .amount { color: #166534; font-weight: bold; }
                    .material { color: #6b21a8; font-weight: bold; }
                    .na { color: #94a3b8; font-style: italic; }
                    .footer { margin-top: 50px; border-top: 1px solid #e2e8f0; padding-top: 15px; text-align: center; font-size: 9pt; color: #64748b; }
                    @media print { 
                        body { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
                        .stat-box { background-color: #f8fafc !important; border: 1px solid #e2e8f0 !important; }
                    }
                </style>
            </head>
            <body>
                <div class="header">
                    <h1>Tabernacle Christian Fellowship</h1>
                    <p>Official Pledges Report</p>
                    <div style="margin-top:10px; color: #64748b;">${today}</div>
                </div>
                <div class="stats">
                    <div class="stat-box"><div class="stat-label">Total Entries</div><div class="stat-value">${rows.length}</div></div>
                    <div class="stat-box"><div class="stat-label">Financial Pledges</div><div class="stat-value">${monetaryCount}</div></div>
                    <div class="stat-box"><div class="stat-label">Material Pledges</div><div class="stat-value">${materialCount}</div></div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th style="width: 30%">Full Name</th>
                            <th style="width: 20%">Phone</th>
                            <th style="width: 22%">Amount</th>
                            <th style="width: 23%">Material</th>
                        </tr>
                    </thead>
                    <tbody>`;

        rows.forEach((row, index) => {
            const cells = row.querySelectorAll('td');
            const name = cells[0].querySelector('.font-medium').textContent.trim();
            const phone = cells[1].querySelector('.font-medium').textContent.trim();
            const amount = cells[2].querySelector('.font-medium').textContent.trim();
            const material = cells[3].querySelector('.font-medium').textContent.trim();

            htmlContent += `
                <tr>
                    <td style="text-align:center">${index + 1}</td>
                    <td>${name}</td>
                    <td>${phone}</td>
                    <td class="${amount === 'N/A' ? 'na' : 'amount'}">${amount}</td>
                    <td class="${material === 'N/A' ? 'na' : 'material'}">${material}</td>
                </tr>`;
        });

        htmlContent += `
                    </tbody>
                </table>
                <div class="footer">
                    <p>System Generated Report - Pledge Management Module</p>
                    <p>Printed on: ${new Date().toLocaleString()}</p>
                </div>
            </body>
            </html>`;

        printWindow.document.write(htmlContent);
        printWindow.document.close();

        // Trigger print after a short delay to ensure rendering
        setTimeout(() => {
            printWindow.focus();
            printWindow.print();
            printWindow.onafterprint = () => printWindow.close();
        }, 500);
    };
</script>
@endscript