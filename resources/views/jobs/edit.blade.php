<x-layout>
    <x-slot:heading>
        Edit Job: {{ $job->title }}
    </x-slot:heading>

    <form method="POST" action="/jobs/{{ $job->id }}">
        @csrf
        @method('PATCH')

        <div class="space-y-12">

            <div class="border-b border-white/10 pb-12">

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-2">
                        <label for="title" class="block text-sm/6 font-medium text-white">Title</label>
                        <div class="mt-2">
                            <input id="title" type="text" name="title" autocomplete="given-name"
                                value="{{ $job->title }}"
                                class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"
                                required />
                        </div>
                        @error('title')
                            <div class="text-red-500 mt-1 text-sm italic">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-2">
                        <label for="salary" class="block text-sm/6 font-medium text-white">Salary</label>
                        <div class="mt-2">
                            <input id="salary" type="text" name="salary" autocomplete="salary"
                                value="{{ $job->salary }}"
                                class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"
                                required />
                        </div>
                        @error('salary')
                            <div class="text-red-500 mt-1 text-sm italic">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- <div class="mt-10 ">
                    @if($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li class="text-red-500 italic">{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div> --}}
            </div>

        </div>

        <div class="mt-6 flex items-center justify-between gap-x-6">
            <div class="flex items-center gap-x-6">
                <button form="delete-form"
                    class="cursor-pointer rounded-md px-3 py-2 text-sm font-semibold text-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Delete</button>
            </div>
            <div class="flex items-center gap-x-6">
                <a href="/jobs/{{ $job->id }}" class="text-sm/6 font-semibold text-white">Cancel</a>
                <button type="submit"
                    class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Update</button>
            </div>
        </div>
    </form>

    <form method="POST" action="/jobs/{{ $job->id }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')

</x-layout>