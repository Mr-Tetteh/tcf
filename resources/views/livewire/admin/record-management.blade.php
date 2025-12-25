<div
    class="p-4 sm:ml-64  min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 motion-preset-expand motion-duration-2000">

    <section class="py-8 px-4">
        <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">

                <div class="lg:w-5/12">
                    <!-- Form Container -->
                    @if (session()->has('message'))
                        <div
                            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-md">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form class="max-w-3xl mx-auto" wire:submit="{{$isEdit ? 'update' :'create' }} ">
                        <!-- Header -->
                        <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-t-xl p-6">
                            <h2 class="text-2xl font-bold text-white">Record Management</h2>
                        </div>

                        <!-- Form Content -->
                        <div class="bg-white rounded-b-xl shadow-lg p-8 space-y-8">
                            <!-- Picture Details Section -->
                            <div class="space-y-6">
                                <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Record Details</h3>

                                <div class="space-y-6">
                                    <div class="relative">
                                        <label class="text-sm font-medium text-gray-700 block mb-2">
                                            Record Title <span class="text-red-500">*</span>
                                        </label>
                                        <input
                                            type="text"

                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white"
                                            placeholder="Enter the title of the record"
                                            wire:model="title"
                                        >
                                    </div>
                                    <div class="text-red-600">
                                        @error('title')
                                        {{$message}}
                                        @enderror
                                    </div>


                                    <div class="relative">
                                        <label class="text-sm font-medium text-gray-700 block mb-2">
                                            Time started <span class="text-red-500">*</span>
                                        </label>
                                        <input
                                            type="time"

                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white"
                                            wire:model="start"
                                        >
                                    </div>
                                    <div class="text-red-600">
                                        @error('start')
                                        {{$message}}
                                        @enderror
                                    </div>


                                    <div class="relative">
                                        <label class="text-sm font-medium text-gray-700 block mb-2">
                                            Time End <span class="text-red-500">*</span>
                                        </label>
                                        <input
                                            type="time"

                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white"
                                            wire:model="end"
                                        >
                                    </div>
                                    <div class="text-red-600">
                                        @error('name')
                                        {{$message}}
                                        @enderror
                                    </div>


                                    <!-- Submit Button -->
                                    <button
                                        type="submit"
                                        class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center justify-center gap-2"
                                    >
                                        <!-- Upload Icon -->
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                        </svg>
                                        {{$isEdit ? "Update Record" : "Upload Record"}}
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
            <div class="text-xl font-semibold text-gray-800">Uploaded Record Management</div>
            <button
                onclick="printRecords()"
                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-105">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                </svg>
                <span class="font-semibold">Print Records</span>
            </button>
        </div>

        <div class="overflow-x-auto">
            <table id="records-table" class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Record Title</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Time Started</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Time Ended</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Date</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($records as $record)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="ml-4">
                                    <div class="font-medium text-gray-900">{{$record->title}}</div>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4 text-gray-500">
                            <div class="flex items-center">
                                <div class="ml-4">
                                    <div class="font-medium text-gray-900">{{$record->start}}</div>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4 text-gray-500">
                            <div class="flex items-center">
                                <div class="ml-4">
                                    <div class="font-medium text-gray-900">{{$record->end}}</div>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4 text-gray-500">
                            <div class="flex items-center">
                                <div class="ml-4">
                                    <div class="font-medium text-gray-900">{{$record->created_at->format('jS F, Y')}}</div>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex space-x-3">
                                <button
                                    wire:click="edit({{$record->id}})"
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
                                <button
                                    wire:click="delete({{$record->id}})"
                                   class="inline-flex items-center px-3 py-1.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1.5" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    Delete
                                </button>
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
    /**
     * Prints the Records table with professional formatting
     * Optimized for Livewire 3 and A4 Landscape orientation
     */
    window.printRecords = function() {
        const table = document.getElementById('records-table');
        
        if (!table) {
            alert('Unable to find records table');
            return;
        }

        const rows = table.querySelectorAll('tbody tr');
        
        if (rows.length === 0) {
            alert('No records available to print');
            return;
        }

        const printWindow = window.open('', '_blank', 'width=1100,height=800');
        const today = new Date().toLocaleDateString('en-US', { 
            weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' 
        });

        let htmlContent = `
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset="UTF-8">
                <title>Record Management Report</title>
                <style>
                    @page { size: A4 landscape; margin: 1.2cm; }
                    body { font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; padding: 20px; color: #1f2937; line-height: 1.4; }
                    .header { text-align: center; margin-bottom: 25px; border-bottom: 3px solid #2563eb; padding-bottom: 15px; }
                    .header h1 { color: #1e3a8a; font-size: 26pt; margin: 0; text-transform: uppercase; letter-spacing: 1px; }
                    .header p { color: #3b82f6; font-size: 14pt; font-weight: 600; margin: 5px 0; }
                    .summary-bar { background: #f1f5f9; border: 1px solid #e2e8f0; padding: 12px; border-radius: 6px; margin-bottom: 20px; display: inline-block; min-width: 200px; text-align: center; }
                    .summary-label { font-size: 9pt; color: #64748b; text-transform: uppercase; font-weight: bold; }
                    .summary-value { font-size: 18pt; color: #1e3a8a; font-weight: bold; }
                    table { width: 100%; border-collapse: collapse; margin-top: 10px; table-layout: fixed; }
                    th { background: #f8fafc; padding: 12px 10px; text-align: left; font-size: 10pt; color: #475569; border: 1px solid #cbd5e1; text-transform: uppercase; }
                    td { padding: 10px; border: 1px solid #e2e8f0; font-size: 10pt; word-wrap: break-word; }
                    tr:nth-child(even) { background: #fbfcfd; }
                    .record-title { font-weight: bold; color: #111827; }
                    .time-cell { color: #059669; font-family: monospace; font-size: 11pt; }
                    .footer { margin-top: 40px; border-top: 1px solid #e2e8f0; padding-top: 15px; text-align: center; font-size: 9pt; color: #94a3b8; }
                    @media print { 
                        body { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
                    }
                </style>
            </head>
            <body>
                <div class="header">
                    <h1>Tabernacle Christian Fellowship</h1>
                    <p>Record Management Report</p>
                    <div style="color: #64748b; font-size: 10pt;">Generated on: ${today}</div>
                </div>
                
                <div style="text-align: center;">
                    <div class="summary-bar">
                        <div class="summary-label">Total Records Logged</div>
                        <div class="summary-value">${rows.length}</div>
                    </div>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th style="width: 40px">#</th>
                            <th>Record Title</th>
                            <th style="width: 150px">Time Started</th>
                            <th style="width: 150px">Time Ended</th>
                            <th style="width: 180px">Date Created</th>
                        </tr>
                    </thead>
                    <tbody>`;

        rows.forEach((row, index) => {
            const cells = row.querySelectorAll('td');
            // Using querySelector to find the inner text within the nested div structure
            const title = cells[0].querySelector('.font-medium')?.textContent.trim() || 'N/A';
            const start = cells[1].querySelector('.font-medium')?.textContent.trim() || 'N/A';
            const end   = cells[2].querySelector('.font-medium')?.textContent.trim() || 'N/A';
            const date  = cells[3].querySelector('.font-medium')?.textContent.trim() || 'N/A';

            htmlContent += `
                <tr>
                    <td style="text-align:center; color: #94a3b8;">${index + 1}</td>
                    <td class="record-title">${title}</td>
                    <td class="time-cell">${start}</td>
                    <td class="time-cell">${end}</td>
                    <td>${date}</td>
                </tr>`;
        });

        htmlContent += `
                    </tbody>
                </table>
                <div class="footer">
                    <p>Printed on ${new Date().toLocaleString()}</p>
                </div>
            </body>
            </html>`;

        printWindow.document.write(htmlContent);
        printWindow.document.close();

        // Allow images/styles to load then trigger print
        setTimeout(() => {
            printWindow.focus();
            printWindow.print();
            printWindow.onafterprint = () => printWindow.close();
        }, 500);
    };
</script>
@endscript