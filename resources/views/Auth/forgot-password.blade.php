<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>UMN Radio | Forgot Password</title>
</head>

<body>
    <div>
        <video autoplay loop muted
            class="fixed -z-10 w-auto lg:w-full md:min-w-full md:min-h-full max-w-fit object-cover" loading="lazy">
            <source src="/images/BACKGROUND_DESKTOP.webm" type="video/webm">
        </video>
    </div>
    <div class=>
        <form action="{{ route('password.email') }}" method="post">
            <div
                class="class=flex flex-col border pb-16 p-8 bg-black absolute top-2/4 left-2/4 mt-5 w-full max-w-[24rem] -translate-y-2/4 -translate-x-2/4">
                <div class="mt-4 mb-8 flex flex-col gap-5">
                    @if ($errors->any())
                        <ul class="text-red-500 text-center">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p class="block antialiased text-center tracking-normal text-l font-taruno leading-snug text-white">Please enter your email for password reset request.</p>
                    @endif
                </div>
                <div class="mt-4 flex flex-col gap-4">
                    @csrf
                    <div class="relative w-full min-w-[300px] mb-3 h-11">
                        <input name="email" type="email" placeholder="Email"
                        class="mt-1 px-3 py-2  h-12 border shadow-sm placeholder-white font-pathway focus:outline-none focus:border-[#FFF000] block w-full sm:text-sm focus:ring-1">
                    </div>
                    <div class="relative w-full text-center min-w-[300px] h-7 mb-5">
                        <button type="submit" class="bg-[#0E0EC0] text-white text-center w-80 border-white p-3 font-taruno text-2xs md:text-sm font-bold border-2 hover:bg-[#FFF000] hover:text-[#0E0EC0]">Send Reset Link</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>
</body>

</html>
