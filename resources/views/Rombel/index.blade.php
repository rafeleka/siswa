<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Rombel
        </h2>
    </x-slot>

    <x-content>
        <a href="{{ route('rombel.create') }}">
            <x-secondary-button class="mb-2">Tambah</x-secondary-button>
        </a>
        <x-table>
            <x-slot:thead>
                <tr>
                    <th class="p-3">No</th>
                    <th class="p-3">Nama Kelas</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </x-slot>
            @foreach($rombels as $rombel)
                <tr class="border-b">
                    <td class="p-3">{{ $loop->iteration }}</td>
                    <td class="p-3">{{ $rombel->name }}</td>
                    <td class="p-3">
                        <a href="{{ route('rombel.edit', $rombel->id) }}">
                            <x-secondary-button class="mb-2">Edit</x-secondary-button>
                        </a>
                        <form method="post" action="{{ route('rombel.destroy', $rombel->id) }}"
                            class="ms-2 inline">
                            @csrf
                            @method('DELETE')

                            <x-primary-button>Hapus</x-primary-button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </x-table>

    </x-content>
</x-app-layout>
