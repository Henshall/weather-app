<template>
<!--    &lt;!&ndash; Open Weather Map &ndash;&gt;-->
    <vue-weather
        v-if="!this.gettingLocation"
        api-key="29a8e20ba2d67c56116e6dc90173f72d"
        units="auto"
        :latitude="location.latitude"
        :longitude="location.longitude"
    />

<!--    &lt;!&ndash; Dark Sky API &ndash;&gt;-->
<!--    <vue-weather-->
<!--        use-dark-sky-api-->
<!--        api-key="<your-dark-sky-api-key>"-->
<!--        units="uk"-->
<!--        latitude="24.8864"-->
<!--        longitude="91.8807"-->
<!--    />-->
</template>

<script>
import VueWeather from "vue-weather-widget";

export default {
    components: {
        VueWeather,
    },
    data() {
        return {
            location:null,
            gettingLocation: true,
            errorStr:null
        }
    },
    created() {
        //do we support geolocation
        if(!("geolocation" in navigator)) {
            this.errorStr = 'Geolocation is not available.';
            return;
        }

        this.gettingLocation = true;
        // get position
        navigator.geolocation.getCurrentPosition(pos => {
            this.gettingLocation = false;
            this.location = pos?.coords;
        }, err => {
            this.gettingLocation = false;
            this.errorStr = err.message;
        })
    }
};
</script>
