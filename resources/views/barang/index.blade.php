<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body class="min-h-dvh flex justify-center items-center">
    <div class="relative overflow-x-auto shadow-sm p-4 md:p-0">
        <form class="py-4" method="GET" action="/barang/create">
            @csrf
            <button type="submit"
                class="text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 ">Tambahkan
                Barang</button>
        </form>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                <tr class="border-b border-t">
                    <th scope="col" class="px-6 py-3">
                        Gambar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Barang
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Deskripsi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga (Rupiah)
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Stok
                    </th>
                    <th scope="col" class="text-center px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($barang as $item)
                    <tr class="bg-white border-b-2 ">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            <img class="w-20 aspect-square object-contain" src="{{ asset('images/' . $item->gambar) }}"
                                alt="">
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $item->nama }}
                        </th>
                        <td class="px-6 py-4 text-gray-800">

                            {{ Str::limit($item->deskripsi, 20, '...') }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-800">
                            {{ number_format($item->harga, 0, ',', '.') }}
                            {{-- {{ $item->harga }} --}}
                        </td>
                        <td class="px-6 py-4 text-gray-800">
                            {{ $item->stok }}
                        </td>
                        <td class="px-6 py-4 text-gray-800">
                            <div class="flex">

                                <a href="/barang/{{ $item->id }}"
                                    class="text-white cursor-pointer bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 ">Detail
                                </a>

                                <a href="/barang/{{ $item->id }}/edit"
                                    class="cursor-pointer focus:outline-none text-white bg-green-600 hover:bg-green-700 focus:ring-2 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 ">Edit</a>

                                <form action="/barang/{{ $item->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="focus:outline-none text-white bg-red-600 hover:bg-red-700 focus:ring-2 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 ">Delete</button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @empty
                    Barang Masih Kosong
                @endforelse


            </tbody>
        </table>
    </div>


</body>

</html>
