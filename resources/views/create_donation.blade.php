<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Welcome to the Donation Board ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Input Details for your Donation Request
                </div>
                {{-- // {{ __("You're logged in!") }} --}}
            </div>
        </div>
    </div>

    <div class="p-4 m-4 justify-center h-screen flex items-center">

        @if (session('success'))
                <div class="bg-green-50 border border-green-200 text-sm text-green-600 rounded-md p-4" role="alert">
                    <span class="font-bold">Success</span> {{ session('message') }}
                </div>
            @elseif(session('error'))
                <div class="bg-red-50 border border-red-200 text-sm text-red-600 rounded-md p-4" role="alert">
                    <span class="font-bold">Error</span> {{ session('error') }}
                </div>
            @endif

        <div
            class=" w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <form class="max-w-sm mx-auto">
                <h5 class="text-xl font-medium text-gray-900 dark:text-white">Request A Donation</h5>

                 <div class="m-2">
                    <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Donation Title</label>
                    <input type="text" id="small-input"
                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <div class="m-2">
                    <label for="target"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Donation Target</label>
                    <input name="target" type="number" id="target"
                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <div class="m-2">
                    <label for="donation_text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Write an Heart Felt
                    Message</label>
                <textarea id="donation_text" rows="4" name="donation_text"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Leave a comment..."></textarea>
                </div>

            </form>
        </div>


    </div>

</x-app-layout>
