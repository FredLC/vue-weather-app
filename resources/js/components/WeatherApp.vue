<template>
    <div class="text-white mb-8">
        <div class="places-input text-gray-800">
            <input
                type="search"
                id="address"
                placeholder="Search a city"
                class="w-full h-10 rounded mb-2"
            />
            <p>Selected: <strong id="address-value">none</strong></p>
        </div>
        <div
            class="weather-container font-sans w-128 max-w-lg rounded-lg overflow-hidden bg-gray-900 shadow-lg mt-4"
        >
            <div
                class="current-weather flex items-center justify-between px-6 py-8"
            >
                <div class="flex items-center">
                    <div>
                        <div class="text-6xl font-semibold">
                            {{ currentTemperature.actual }}°C
                        </div>
                        <div>Feels like {{ currentTemperature.feels }}°C</div>
                    </div>
                    <div class="mx-5">
                        <div class="font-semibold">
                            {{ currentTemperature.summary }}
                        </div>
                        <div>{{ location.name }}</div>
                    </div>
                </div>
                <div>
                    <img :src="currentTemperature.icon" alt="weather icon" />
                </div>
            </div>

            <div
                class="weather-forecast text-sm bg-gray-800 px-6 py-8 overflow-hidden"
            >
                <div
                    class="flex items-center"
                    v-for="(day, index) in dailyFiveDays"
                    :key="day.time"
                    :class="{ 'mt-8': index > 0 }"
                >
                    <div class="w-1/6 text-lg text-gray-200">
                        {{ toDayOfWeek(day.dt) }}
                    </div>
                    <div class="w-4/6 px-4 flex items-center">
                        <div>
                            <img
                                :src="getWeatherIcon(day.weather[0].icon)"
                                alt="weather icon"
                            />
                        </div>
                        <div class="ml-3">{{ day.weather[0].description }}</div>
                    </div>
                    <div class="w-1/6 text-right">
                        <div>{{ Math.round(day.temp.max) }}°C</div>
                        <div>{{ Math.round(day.temp.min) }}°C</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        this.fetchData();
        this.fetchWeatherForecast();

        const placesAutocomplete = places({
            appId: "plP3ZLNMZ42G",
            apiKey: "1e760015286e36a4f212b640c79a20bd",
            container: document.querySelector("#address")
        }).configure({
            type: "city",
            aroundLatLngViaIP: false
        });
        const $address = document.querySelector("#address-value");
        placesAutocomplete.on("change", e => {
            $address.textContent = e.suggestion.value;
            this.location.name = `${e.suggestion.name}, ${e.suggestion.country}`;
            this.location.lat = e.suggestion.latlng.lat;
            this.location.lon = e.suggestion.latlng.lng;
        });
        placesAutocomplete.on("clear", function() {
            $address.textContent = "none";
        });
    },
    watch: {
        location: {
            handler(newValue, oldValue) {
                this.fetchData();
                this.fetchWeatherForecast();
            },
            deep: true
        }
    },
    computed: {
        dailyFiveDays() {
            return this.daily.filter((day, index) => index < 5);
        }
    },
    data() {
        return {
            daily: [],
            currentTemperature: {
                actual: "",
                feels: "",
                summary: "",
                icon: ""
            },
            location: {
                name: "Montreal, QC",
                lat: 45.5016,
                lon: -73.5672
            }
        };
    },
    methods: {
        fetchData() {
            fetch(
                `/api/weather?lat=${this.location.lat}&lon=${this.location.lon}`
            )
                .then(response => response.json())
                .then(data => {
                    this.currentTemperature.actual = Math.round(data.main.temp);
                    this.currentTemperature.feels = Math.round(
                        data.main.feels_like
                    );
                    this.currentTemperature.summary =
                        data.weather[0].description;
                    this.currentTemperature.icon = `http://openweathermap.org/img/w/${data.weather[0].icon}.png`;
                    console.log(data);
                });
        },
        fetchWeatherForecast() {
            fetch(
                `/api/weather-forecast?lat=${this.location.lat}&lon=${this.location.lon}`
            )
                .then(response => response.json())
                .then(data => {
                    this.daily = data.list;
                    console.log(data);
                });
        },
        toDayOfWeek(timestamp) {
            const newDate = new Date(timestamp * 1000);
            const days = ["SUN", "MON", "TUE", "WED", "THU", "FRI", "SAT"];

            return days[newDate.getDay()];
        },
        getWeatherIcon(iconId) {
            return `http://openweathermap.org/img/w/${iconId}.png`;
        }
    }
};
</script>
