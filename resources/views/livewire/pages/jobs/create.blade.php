<div>
    <div class="container mx-auto py-4">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Create new job posting</h1>
        </div>
        {{-- TODO: Add form here --}}

        <!-- Section: Split screen -->
        <section class="my-10 mx-6">
            <!-- Grid -->
            <div class="grid grid-cols-2">
                <!-- First column -->
                <div class="bg-white-500">
                    <h2 class="text-black-500 mb-2">Job Details</h2>
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title:
                    </label>
                    <input type="text" id="title"
                        class="bg-gray-50 mb-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Job posting title" wire:model.defer="title" name="title" required />
                    <label for="description"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description:
                    </label>
                    <input type="text" id="description"
                        class="bg-gray-50 mb-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Job posting description" wire:model.defer="description" name="description"
                        required />
                    <div class="grid grid-cols-4">
                        <label for="experience"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Experience:
                        </label>
                        <input type="text" id="experience"
                            class="bg-gray-50 mb-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Eg 1-3 years" wire:model.defer="experience" name="experience" required />
                        <label for="salary"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Salary:
                        </label>
                        <input type="text" id="salary"
                            class="bg-gray-50 mb-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Eg 2.75-5 Lacs PA" wire:model.defer="salary" name="salary" required />
                    </div>
                    <div class="grid grid-cols-4">
                        <label for="location"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location:
                        </label>
                        <input type="text" id="location"
                            class="bg-gray-50 mb-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Eg. Remote / Pune" wire:model.defer="location" name="location" required />

                        <label for="extra" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Extra
                            Info:
                        </label>
                        <input type="text" id="extra"
                            class="bg-gray-50 mb-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Eg. Full Time, Urgent / Part Time, Flexible" wire:model.defer="extra"
                            name="extra" required />
                    </div>
                </div>
                <!-- First column -->

                <!-- Second column -->
                <div class="bg-white-500">
                    <h2 class="text-black-500 mx-2 my-1">Company Details</h2>
                    <label for="title"
                        class="block mx-2 mb-2 text-sm font-medium text-gray-900 dark:text-white">Name:
                    </label>
                    <input type="text" id="name"
                        class="bg-gray-50 mx-2 mb-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Company Name" wire:model.defer="company_name" name="company_name" required />
                    <label for="logo"
                        class="block mx-2 mb-2 text-sm font-medium text-gray-900 dark:text-white">Logo:
                    </label>
                    <input type="file" class="mx-2 mb-2" wire:model.defer="company_logo" name="company_logo">

                    <label for="skills"
                        class="block mx-5 py-5 mb-1 text-sm font-medium text-gray-900 dark:text-white">Skills
                    </label>
                    <select class="select mx-5" wire:model="skills" id="skills" multiple="multiple">
                        <option value="1">Trafalgra Law</option>
                        <option value="2">Bertram Schamberger</option>
                    </select>
                </div>
                <!-- Second column -->
            </div>
            <!-- Grid -->
        </section>
        <!-- Section: Split screen -->
    </div>
</div>
