<div>
    <div class="container mx-auto py-4">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Skills</h1>
        </div>
        {{-- TODO: Add table here and a form to create a new skill --}}

    </div>

    <!-- Section: Split screen -->
    <section class="px-7">
        {{-- Alert component --}}
        <div class="my-2">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    {{ session('error') }}
                </div>
            @endif
        </div>
        <!-- Grid -->
        <div class="grid grid-cols-2">
            <!-- First column -->
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-10">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                NAME
                            </th>

                            <th scope="col" class="px-6 py-3">

                            </th>
                            <th scope="col" class="px-6 py-3">

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($skills as $skill)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $skill->name }}
                                </th>
                                <td class="px-1 py-1">
                                    <button wire:click="editSkill({{ $skill->id }})"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button>
                                </td>
                                <td class="px-1 py-1">
                                    <button wire:confirm="Are you sure, you want to delete?"
                                        wire:click="deleteSkill({{ $skill->id }})" type="button"
                                        class="text-red-600 dark:text-red-500">Delete</button>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
                {{ $skills->links() }}
            </div>
            <!-- First column -->

            <!-- Second column -->
            <div class="bg-white-500">

                <form wire:submit="saveSkill" class="max-w-sm mx-auto">
                    <h1 class="mx-1">Add new Skill</h1>
                    <div class="mb-5">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name:
                        </label>
                        <input type="text" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Enter Name" wire:model.defer="name" name="name" required />
                        @error('name')
                            <p class="text-danger">{{ $message }} </p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        @if ($isEdit)
                            Update
                        @else
                            Submit
                        @endif
                    </button>
                </form>

            </div>
            <!-- Second column -->
        </div>
        <!-- Grid -->
    </section>
    <!-- Section: Split screen -->
</div>
