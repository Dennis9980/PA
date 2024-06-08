<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Popup</title>
    <script src="https://kit.fontawesome.com/d2f94ceef2.js" crossorigin="anonymous"></script>

   
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#61876E] h-full">
    <div class="flex flex-col items-center justify-center lg:h-screen">
        <div class="bg-white p-4 rounded-2xl m-4 drop-shadow-2xl">
            <h1 class="text-xl font-bold mb-5 text-center mb-6">Makos</h1>
            <div class="flex flex-col gap-2 lg:flex-row lg:justify-between lg:gap-20">
                <div>
                    <h3 class="font-semibold text-lg flex">Pemesan</h3>
                    <p>{{ $data->nama }}</p>
                    <p>{{ $data->phone }}</p>
                    <p>{{ $data->email }}</p>
                </div>
                <div >
                    <h3 class="font-semibold text-lg flex lg:justify-end">Transacton Id</h3>
                    <p class="flex lg:justify-end">{{ $data->id }}</p>
                </div>
            </div>
            <div class="mt-5">
                <div class="lg:mx-24">
                    <div class="flex justify-between py-2 border-b font-bold bg-slate-300 px-2 rounded-t-lg">
                        <p>Item</p>
                        <p>Quantity</p>
                    </div>
                    <div class="flex justify-between py-2 border-b px-2">
                        <p>Kamar</p>
                        <p>{{ $data->tipe_kos }}</p>
                    </div>
                    <div class="flex justify-between py-2 border-b px-2">
                        <p>Tanngal Mulai</p>
                        <p>{{ $data->tanggal_mulai }}</p>
                    </div>
                    <div class="flex justify-between py-2 border-b px-2">
                        <p>Uang Muka</p>
                        <p>{{ $data->Dp }}</p>
                    </div>
                    <div class="flex justify-between py-2 border-b px-2">
                        <p class="font-bold">Total Harga</p>
                        <p>{{ $data->total_harga}}</p>
                    </div>
                    <div class="flex justify-between py-2 border-b px-2">
                        <p class="font-bold">Kekurangan</p>
                        <p>{{ $data->total_harga - $data->Dp}}</p>
                    </div>
                </div>
            </div>
            <div class="mt-6    ">
                <h2>More Information: <a href="">dennis10.havinanda@gmail.com</a></h2>
                <h3 class="text-center font-bold mt-5">Terimakasih <i class="fa-solid fa-face-smile" style="color: #FFD43B;"></i></h3>
            </div>
        </div>
    <a href="{{ route('landingPage') }}" class="z-10">
        <button class="btn btn-primary z-10 mb-5">Back To Makos</button>
    </a>
    </div>

</body>

</html>
