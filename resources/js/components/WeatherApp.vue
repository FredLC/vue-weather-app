<template>
    <div class="text-white mb-8">
        <div class="places-input text-gray-800">
            <input type="text" class="w-full" />
        </div>
        <div
            class="weather-container font-sans w-128 max-w-lg rounded-lg overflow-hidden bg-gray-900 shadow-lg mt-4"
        >
            <div
                class="current-weather flex items-center justify-between px-6 py-8"
            >
                <div class="flex items-center">
                    <div>
                        <div class="text-6xl font-semibold">24°C</div>
                        <div>Feels like 29°C</div>
                    </div>
                    <div class="mx-5">
                        <div class="font-semibold">Cloudy</div>
                        <div>Gatineau, Quebec</div>
                    </div>
                </div>
                <div>Icon</div>
            </div>

            <div
                class="weather-forecast text-sm bg-gray-800 px-6 py-8 overflow-hidden"
            >
                <div class="flex items-center">
                    <div class="w-1/6 text-lg text-gray-200">MON</div>
                    <div class="w-4/6 px-4 flex items-center">
                        <div>Icon</div>
                        <div class="ml-3">Cloudy with a chance of showers</div>
                    </div>
                    <div class="w-1/6 text-right">
                        <div>30°C</div>
                        <div>22°C</div>
                    </div>
                </div>
                <div class="flex items-center mt-8">
                    <div class="w-1/6 text-lg text-gray-200">MON</div>
                    <div class="w-4/6 px-4 flex items-center">
                        <div>Icon</div>
                        <div class="ml-3">Cloudy with a chance of showers</div>
                    </div>
                    <div class="w-1/6 text-right">
                        <div>30°C</div>
                        <div>22°C</div>
                    </div>
                </div>
                <div class="flex items-center mt-8">
                    <div class="w-1/6 text-lg text-gray-200">MON</div>
                    <div class="w-4/6 px-4 flex items-center">
                        <div>Icon</div>
                        <div class="ml-3">Cloudy with a chance of showers</div>
                    </div>
                    <div class="w-1/6 text-right">
                        <div>30°C</div>
                        <div>22°C</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {};
</script>
