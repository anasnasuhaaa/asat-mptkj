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
    <div
        class="w-full flex flex-col items-center bg-white border border-gray-200 rounded-lg  md:flex-row md:max-w-xl hover:bg-gray-100 shadow-md">
        <img class="object-cover rounded-t-lg h-96 md:h-auto md:w-60 md:rounded-none md:rounded-s-lg"
            src="{{ asset('images/' . $barang->gambar) }}" alt="">
        <div class="flex flex-col justify-between p-4 leading-normal  w-full">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{ $barang->nama }}</h5>
            <p class="mb-3 font-normal text-gray-700 ">{{ $barang->deskripsi }}</p>
            <div class="flex justify-start gap-4">
                <p>Harga: <span class="text-red-500 font-bold">Rp{{ number_format($barang->harga, 0, '.', '.') }}</span>
                </p>
                <p>Stok: <span class="text-red-500 font-bold">{{ $barang->stok }}</span></p>
            </div>

        </div>
    </div>


</body>

</html>
