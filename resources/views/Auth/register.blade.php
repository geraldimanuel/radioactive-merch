<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>UMN RadioActive 2023 | Login</title>
</head>

<body>
    <div>
        <video autoplay loop muted
            class="fixed -z-10 w-auto lg:w-full md:min-w-full md:min-h-full max-w-fit object-cover" loading="lazy">
            <source src="/images/BACKGROUND_DESKTOP.webm" type="video/webm">
        </video>
    </div>
    <div class="class=container mx-auto p-4">
        <form action="/signup" method="POST">
            <div
                class="class=flex flex-col border pb-20 pt-4 p-8 bg-black absolute top-2/4 left-2/4 mt-5 w-full max-w-[24rem] -translate-y-2/4 -translate-x-2/4">
                <div class="mt-4 flex flex-col gap-4">
                    <div
                        class="">
                        <h3 class="block font-bold antialiased text-center tracking-normal text-xl font-taruno leading-snug text-white pb-2">
                            REGISTER</h3>
                    </div>
                    @csrf
                    <div class="relative w-full min-w-[300px] h-11">
                        <input name="name" type="name" placeholder="Name"
                            class="mt-1 px-3 py-3  border shadow-sm placeholder-white font-pathway focus:outline-none focus:border-[#FFF000] block w-full sm:text-sm focus:ring-1" style="color: white;">
                    </div>
                    <div class="relative w-full min-w-[300px] h-11">
                        <input name="email" type="email" placeholder="Email"
                            class="mt-1 px-3 py-3  border shadow-sm placeholder-white font-pathway focus:outline-none focus:border-[#FFF000] block w-full sm:text-sm focus:ring-1" style="color: white;">
                    </div>
                    <div class="relative w-full min-w-[300px] h-11">
                        <input name="password" type="password" placeholder="Password"
                            class="mt-1 px-3 py-3  border shadow-sm placeholder-white font-pathway focus:outline-none focus:border-[#FFF000] block w-full sm:text-sm focus:ring-1" style="color: white;">
                    </div>
                    <div class="relative w-full pt-4 min-w-[200px] h-11 mb-3">
                        <button type="submit"
                            class="bg-[#0E0EC0] text-white text-center w-80 border-white p-3 font-taruno text-2xs md:text-sm font-bold border-2 hover:bg-[#FFF000] hover:text-[#0E0EC0]">
                            Register now!
                        </button>
                        <a href="/login" class="flex mt-3 justify-center  text-white text-s hover:text-[#FFF000]">Have an account? Log in here!</a>
                        
                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>
</body>

</html>
