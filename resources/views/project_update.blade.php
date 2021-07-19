<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Project
        </h2>
    </x-slot>
    <div class="py-12" id="app">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Project Information</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Update information.
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">

                        <form action="{{route('projects.store')}}" method="POST">
                            @csrf
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <!-- Session Status -->
                                    <x-auth-session-status class="mb-4" :status="session('status')"/>

                                    <!-- Validation Errors -->
                                    <x-auth-validation-errors class="mb-4" :errors="$errors"/>
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 ">
                                            <label for="first-name" class="block text-sm font-medium text-gray-700">Project
                                                Name</label>
                                            <input type="text" name="name" id="first-name"
                                                   autocomplete="given-name"
                                                   value="{{ $project->name }}"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>


                                        <div class="col-span-6">
                                            <label for="status" class="block text-sm font-medium text-gray-700">Project
                                                Status</label>
                                            <select id="status" name="status" autocomplete="country"
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option
                                                    value="pending" {{ ($project->status =='pending') ? 'selected':'' }}>
                                                    Pending
                                                </option>
                                                <option
                                                    value="in_progress" {{ ($project->status =='in_progress') ? 'selected':'' }}>
                                                    In Progress
                                                </option>
                                                <option
                                                    value="canceled" {{ ($project->status =='canceled') ? 'selected':'' }}>
                                                    Canceled
                                                </option>
                                                <option
                                                    value="finished" {{ ($project->status =='finished') ? 'selected':'' }}>
                                                    Finished
                                                </option>
                                            </select>
                                        </div>


                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <button type="submit"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</x-app-layout>
