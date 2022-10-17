<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="/app.css">
    <title>Index</title>
</head>

<body>
    {{-- Gap from top and max width --}}
    <div class="max-w-4xl mx-auto mt-10">

        {{-- Left right gap --}}
        <div class="px-4 sm:px-6 lg:px-8">

            {{-- Text --}}
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Characters</h1>
                    <p class="mt-2 text-sm text-gray-700">A list of all characters</p>
                </div>

                {{-- Add character --}}
                <a href="/characters/create"
                    class="mt-4 inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                    Add character
                </a>
            </div>

            {{-- Table names --}}
            <table class="mt-8 min-w-full shadow ring-1 ring-black ring-opacity-20 ">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="py-4 pl-4 text-left text-xs font-medium uppercase text-gray-500 ">
                            ID
                        </th>
                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500">
                            In game name
                        </th>
                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500">
                            Class
                        </th>
                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500">
                            Level
                        </th>
                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500">
                            Created at
                        </th>
                        <th scope="col" class="px-4 py-4 text-left text-xs font-medium uppercase text-gray-500">
                            Updated At
                        </th>
                        <th scope="col" class="px-4 py-4 text-left text-xs font-medium uppercase text-gray-500">
                            Edit
                        </th>
                        <th scope="col" class="px-4 py-4 text-left text-xs font-medium uppercase text-gray-500">
                            Delete
                        </th>
                    </tr>
                </thead>

                {{-- Index characters --}}
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach ($character as $characters)
                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                {{ $characters->id }}
                            </td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                <a href="{{ url('/characters', $characters->id) }}">{{ $characters->in_game_name }}</a>
                            </td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                {{ $characters->class }}
                            </td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                {{ $characters->level }}
                            </td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                {{ $characters->created_at }}
                            </td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                {{ $characters->updated_at }}
                            </td>

                            {{-- Edit --}}
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium">
                                <a href="/characters/{{ $characters->id }}/edit"
                                    class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>

                            {{-- Delete --}}
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium">
                                <form action="{{ route('character.destroy', $characters->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
