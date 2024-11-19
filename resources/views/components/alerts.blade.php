@if (session()->has('success'))
    <div class='bg-blue-100 border border-green-400 text-green-700 px-4 py-3 rounded relative'>
        <span class='block sm:inline'>{{session('success') }}</span>
    </div>
@endif

@if (session()->has('message'))
    <div class='bg-blue-100 border border-green-400 text-green-700 px-4 py-3 rounded relative'>
        <span class='block sm:inline'>{{session('message') }}</span>
    </div>
@endif

@if (session()->has('error'))
    <div class='bg-red-100 border border-green-400 text-green-700 px-4 py-3 rounded relative'>
        <span class='block sm:inline'>{{session('error') }}</span>
    </div>
@endif

@if ($errors->any())
        <ul class='erros'>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
@endif
