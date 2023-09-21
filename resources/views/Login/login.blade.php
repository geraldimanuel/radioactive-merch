<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>UMN RadioActive 2023 | Login</title>
</head>

<body class="overflow-x-hidden bg-black h-full">
    <div>
        <video autoplay loop muted
            class="fixed -z-10 w-auto lg:w-full md:min-w-full md:min-h-full max-w-fit object-cover" loading="lazy">
            <source src="/images/BACKGROUND_DESKTOP.webm" type="video/webm">
        </video>
    </div>
    <div>
        <form action="/login" method="POST">
            <div class="class=flex flex-col border pb-16 p-8 bg-black absolute top-2/4 left-2/4 mt-5 w-full max-w-[24rem] -translate-y-2/4 -translate-x-2/4">
                <div
                    class="">
                    <h3 class="block antialiased text-center tracking-normal text-xl font-taruno leading-snug text-white">
                        LOGIN</h3>
                </div>
                <div class="mt-4 flex flex-col gap-4">
                    @csrf
                    <div class="relative w-full min-w-[300px] h-11">
                        <input name="email" type="email" placeholder="Email"
                            class="mt-1 px-3 py-2  border shadow-sm font-pathway focus:outline-none focus:border-[#FFF000] block w-full sm:text-sm focus:ring-1">
                    </div>
                    <div class="relative w-full min-w-[300px] h-11">
                        <input name="password" type="password" placeholder="Password"
                            class="mt-1 px-3 py-2  border shadow-sm font-pathway focus:outline-none focus:border-[#FFF000] block w-full sm:text-sm focus:ring-1">
                    </div>
                    <div class="relative w-full min-w-[100px] text-right">
                        <a class="text-white text-s hover:text-[#FFF000]" href="{{ route('password.request') }}">Forgot
                            Password?</a>
                    </div>
                    <div class="relative w-full text-center min-w-[300px] h-7 mb-5">
                        <button type="submit" class="bg-[#0E0EC0] text-white text-center w-80 border-white p-3 font-taruno text-2xs md:text-sm font-bold border-2 hover:bg-[#FFF000] hover:text-[#0E0EC0]">Login</button>
                        <a href="/signup" class="flex mt-3 justify-center py-1 text-white text-s hover:text-[#FFF000]">Don't have an account yet? Register here!</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</body>

</html>
