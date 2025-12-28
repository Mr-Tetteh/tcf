<div class="p-4 sm:ml-64 min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 motion-preset-expand motion-duration-2000">

    <section class="py-8 px-4">
        <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">

                <!-- Form Section - Left Side -->
                <div class="lg:w-5/12 print:hidden">
                    @if (session()->has('message'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-md mb-4">
                            {{ session('message') }}
                        </div>
                    @endif
                    
                    <form class="max-w-3xl mx-auto" wire:submit.prevent="{{$isEdit? 'update': 'create'}}" enctype="multipart/form-data">
                        <!-- Header -->
                        <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-t-xl p-6">
                            <h2 class="text-2xl font-bold text-white">Upload Expenditure</h2>
                            <p class="text-blue-100 mt-1">Add a new expenditure to the records</p>
                        </div>

                        <!-- Form Content -->
                        <div class="bg-white rounded-b-xl shadow-lg p-8 space-y-8">
                            <!-- Expenditure Details Section -->
                            <div class="space-y-6">
                                <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Expenditure Details</h3>

                                <div class="space-y-6">
                                    <!-- Name -->
                                    <div class="relative">
                                        <label class="text-sm font-medium text-gray-700 block mb-2">
                                             Name
                                        </label>
                                        <input
                                            wire:model="name"
                                            type="text"
                                            name="name"
                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white"
                                            placeholder="Enter expenditure name"
                                        >
                                        @error('name')
                                        <span class="text-red-500 text-sm">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <!-- Amount -->
                                    <div class="relative">
                                        <label class="text-sm font-medium text-gray-700 block mb-2">
                                            Amount
                                        </label>
                                        <input
                                            wire:model="amount"
                                            type="text"
                                            name="amount"
                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white"
                                            placeholder="Enter amount"
                                        >
                                        @error('amount')
                                        <span class="text-red-500 text-sm">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Purpose Section -->
                            <div class="space-y-6">
                                <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Expenditure Purpose</h3>
                                
                                <div class="relative">
                                    <label for="expenditure-purpose" class="text-sm font-medium text-gray-700 block mb-2">
                                        Purpose
                                    </label>
                                    <textarea
                                        id="expenditure-purpose"
                                        name="purpose"
                                        wire:model="purpose"
                                        rows="4"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white"
                                        placeholder="Enter expenditure purpose"
                                    ></textarea>
                                    @error('purpose')
                                    <span class="text-red-500 text-sm mt-2 block">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="flex items-center justify-end space-x-4 pt-6">
                                <button
                                    type="submit"
                                    class="px-6 py-2.5 rounded-lg bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200"
                                >
                                    {{$isEdit ? 'Update Expenditure' : 'Upload Expenditure'}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Table Section - Right Side -->
                <div class="lg:w-7/12">
                    <div class="bg-white rounded-xl shadow-sm p-6" id="printable-section">
                        <!-- Header with Print Button -->
                        <div class="flex items-center justify-between mb-6 print:mb-8">
                            <div>
                                <div class="text-xl font-semibold text-gray-800">Expenditure Records</div>
                                <div class="text-sm text-gray-500 mt-1 print:hidden">Total Records: {{count($expenditures)}}</div>
                            </div>
                            <button 
                                onclick="printExpenditures()"
                                class="print:hidden inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-colors duration-200 shadow-sm"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                                </svg>
                                Print Records
                            </button>
                        </div>

                        <!-- Print Header (only visible when printing) -->
                        <div class="hidden print:block mb-6 text-center border-b-2 border-gray-300 pb-4">
                            <h1 class="text-2xl font-bold text-gray-900">Expenditure Records</h1>
                            <p class="text-gray-600 mt-2">Printed on: <span id="print-date"></span></p>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50 print:bg-gray-200">
                                <tr>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Name</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Amount</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Purpose</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 print:hidden">Actions</th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                @foreach($expenditures as $expenditure)
                                    <tr class="hover:bg-gray-50 transition-colors duration-200 print:border-b print:border-gray-300">
                                        <td class="px-6 py-4">
                                            <div class="font-medium text-gray-900">{{$expenditure->name}}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium bg-gray-100 text-gray-800 print:bg-transparent print:px-0">
                                                {{$expenditure->amount}}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-gray-500">{{$expenditure->purpose}}</td>
                                        <td class="px-6 py-4 print:hidden">
                                            <div class="flex space-x-3">
                                                <button
                                                    wire:click="edit({{$expenditure->id}})"
                                                    class="inline-flex items-center px-3 py-1.5 bg-amber-100 text-amber-700 rounded-lg hover:bg-amber-200 transition-colors duration-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                    </svg>
                                                    Edit
                                                </button>
                                                <button 
                                                    wire:click="$set('deleteId', {{$expenditure->id}})"
                                                    class="inline-flex items-center px-3 py-1.5 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition-colors duration-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                             <b class="text-3xl">Grand Total:</b>  GHC {{ number_format($expenditures->flatten(2)->sum('amount'), 2) }}
                            </table>
                            
                        </div>

                        <!-- Print Footer (only visible when printing) -->
                        <div class="hidden print:block mt-8 pt-4 border-t-2 border-gray-300 text-center text-sm text-gray-600">
                            <p>Total Records: {{count($expenditures)}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Delete Confirmation Modal -->
    @if ($deleteId)
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 p-4 animate-fade-in print:hidden">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md transform transition-all animate-scale-in">
            <div class="relative pt-8 pb-6 px-8 text-center">
                <div class="mx-auto w-20 h-20 bg-gradient-to-br from-red-100 to-red-50 rounded-full flex items-center justify-center mb-6 shadow-lg">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center">
                        <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                </div>

                <h2 class="text-2xl font-bold text-gray-900 mb-3">Confirm Deletion</h2>
                <p class="text-gray-600 leading-relaxed">
                    Are you sure you want to delete this expenditure? 
                    <span class="block mt-2 font-semibold text-red-600">This action cannot be undone.</span>
                </p>
            </div>

            <div class="border-t border-gray-100"></div>

            <div class="px-8 py-6 bg-gray-50 rounded-b-2xl">
                <div class="flex gap-3">
                    <button 
                        wire:click="$set('deleteId', null)" 
                        class="flex-1 px-6 py-3 bg-white border-2 border-gray-300 text-gray-700 font-semibold rounded-xl hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-4 focus:ring-gray-200 transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98]"
                    >
                        Cancel
                    </button>
                    
                    <button 
                        wire:click="delete" 
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
    @endif


<!-- Print Styles -->
<style>
    @media print {
        /* Hide everything except the printable section */
        body * {
            visibility: hidden;
        }
        
        #printable-section, #printable-section * {
            visibility: visible;
        }
        
        #printable-section {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            padding: 20px;
        }
        
        /* Remove shadows and rounded corners for print */
        .shadow-sm, .rounded-xl {
            box-shadow: none !important;
            border-radius: 0 !important;
        }
        
        /* Ensure table fits on page */
        table {
            page-break-inside: auto;
        }
        
        tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }
        
        /* Print-specific styling */
        .print\:block {
            display: block !important;
        }
        
        .print\:hidden {
            display: none !important;
        }
        
        /* Better borders for print */
        .print\:border-b {
            border-bottom-width: 1px !important;
        }
        
        .print\:border-gray-300 {
            border-color: #d1d5db !important;
        }
    }
</style>

<!-- Print JavaScript -->
<script>
    function printExpenditures() {
        // Set the print date
        const printDate = new Date().toLocaleDateString('en-US', { 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        });
        document.getElementById('print-date').textContent = printDate;
        
        // Trigger print dialog
        window.print();
    }
</script>
</div>
