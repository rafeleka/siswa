<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Student
        </h2>
    </x-slot>

    <x-content>
        <a href="{{ route('student.create') }}">
            <x-secondary-button class="mb-2">Tambah</x-secondary-button>
        </a> <a href="{{ route('student.export') }}">
            <x-secondary-button class="mb-2">Export</x-secondary-button>
        </a>
        <x-table>
            <x-slot:thead>
                <tr>
                    <th class="p-3">No</th>
                    <th class="p-3">NIS</th>
                    <th class="p-3">Nama Siswa</th>
                    <th class="p-3">Jenis Kelamin</th>
                    <th class="p-3">Kelas</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </x-slot>
            @foreach($students as $student)
                <tr class="border-b">
                    <td class="p-3">{{ $loop->iteration }}</td>
                    <td class="p-3">{{ $student->nis }}</td>
                    <td class="p-3">{{ $student->name }}</td>
                    <td class="p-3">{{ $student->gender=='B' ? 'Laki-laki' : 'Perempuan' }}</td>
                    <td class="p-3">{{ $student->rombel_id }}</td>
                    <td class="p-3">
                        <a href="{{ route('student.edit', $student->id) }}">
                            <x-secondary-button class="mb-2">Edit</x-secondary-button>
                        </a>
                        <form method="post" action="{{ route('student.destroy', $student->id) }}"
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
