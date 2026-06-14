<x-app-layout>

<div class="min-h-screen 
            bg-gradient-to-br from-pink-500 via-purple-600 to-indigo-700 
            flex items-start justify-center py-10 px-4">

    <div class="max-w-6xl w-full text-white">

        <h1 class="text-3xl font-bold mb-8 text-center">
            Nuestro Equipo
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- ✅ JORGE -->
            <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl text-center">

                <h2 class="text-xl font-bold">Jorge Luis Rojas Jojot</h2>
                <p class="text-white/70 mb-4">Desarrollador Full Stack</p> 
                
                <a href="{{ route('cv.jorge') }}" target="_blank"
                   class="bg-pink-500 hover:bg-pink-600 px-4 py-2 rounded text-white font-bold w-full block">
                    Ver Curriculum
                </a>

            </div>

            <!-- ✅ JONATHAN -->
            <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl text-center">

                <h2 class="text-xl font-bold">Jonathan</h2>
                <p class="text-white/70 mb-4">Desarrollador</p>

                <a href="{{ route('cv.jonathan') }}" target="_blank"
                   class="bg-pink-500 hover:bg-pink-600 px-4 py-2 rounded text-white font-bold w-full block">
                    Ver Curriculum
                </a>

            </div>

            <!-- ✅ CRISTIAN -->
            <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl text-center">

                <h2 class="text-xl font-bold">Cristian</h2>
                <p class="text-white/70 mb-4">Desarrollador</p>

                <a href="{{ route('cv.cristian') }}" target="_blank"
                   class="bg-pink-500 hover:bg-pink-600 px-4 py-2 rounded text-white font-bold w-full block">
                    Ver Curriculum
                </a>

            </div>

        </div>

    </div>

</div>

</x-app-layout>