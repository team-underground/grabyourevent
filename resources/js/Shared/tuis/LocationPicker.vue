<template>
    <div class="map_container">
        <div id="map"></div>
        <input type="text" class="controls" id="pac-input" />
    </div>
</template>

<script>
export default {
    props: {
        options: {
            type: Object,
            required: false,
            default() {
                return {
                    map: {
                        /** other map options **/
                    },
                    marker: {
                        /** marker options **/
                    },
                    autocomplete: {
                        /** autocomplete options **/
                    }
                };
            }
        },
        value: {
            type: Object,
            required: false,
            default() {
                return { lat: 41.0082376, lng: 28.97835889999999 };
            }
        }
    },
    data() {
        return {
            map: null,
            marker: null,
            autocomplete: null,
            val: { lat: 41.0082376, lng: 28.97835889999999 },
            addressBox: {
                sublocality_level_2: "long_name",
                sublocality_level_1: "long_name",
                locality: "long_name",
                postal_code: "short_name",
                administrative_area_level_1: "long_name",
                country: "long_name"
            },
            address: {}
        };
    },
    components: {},
    methods: {
        geocodeLocation(e) {
            this.val = {
                lat: this.marker.getPosition().lat(),
                lng: this.marker.getPosition().lng()
            };
            this.map.setCenter(this.val);
            this.map.panTo(this.val);
            this.$emit("input", { location: this.val, address: this.address });
        },
        moveMarker() {
            document.getElementById("pac-input").value = "";
            let place = this.autocomplete.getPlace();

            if (!place.geometry) {
                // User entered the name of a Place that was not suggested and
                // pressed the Enter key, or the Place Details request failed.
                window.alert(
                    "No details available for input: '" + place.name + "'"
                );
                return;
            }

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                this.map.fitBounds(place.geometry.viewport);
            } else {
                this.map.setCenter(place.geometry.location);
                this.map.setZoom(17); // Why 17? Because it looks good.
            }

            this.marker.setPosition(place.geometry.location);
            this.marker.setVisible(true);
            // Get each component of the address from the place details,
            // and then fill-in the corresponding field on the form.
            this.addressBox = {
                sublocality_level_2: "long_name",
                sublocality_level_1: "long_name",
                locality: "long_name",
                postal_code: "short_name",
                administrative_area_level_1: "long_name",
                country: "long_name"
            };
            this.address = {};
            if (place.address_components.length > 0) {
                for (var i = 0; i < place.address_components.length; i++) {
                    var addressType = place.address_components[i].types[0];

                    if (this.addressBox[addressType]) {
                        this.address[addressType] =
                            place.address_components[i][
                                this.addressBox[addressType]
                            ];
                    }
                }

                Object.assign(this.address, {
                    place_name: place.name
                });
            }

            this.val = {
                lat: place.geometry.location.lat(),
                lng: place.geometry.location.lng()
            };
            this.$emit("change", { location: this.val, address: this.address });
        }
    },
    watch: {
        value(newValue) {
            if (
                newValue != undefined &&
                typeof newValue == "object" &&
                newValue.lat &&
                newValue.lng
            ) {
                this.val = newValue;
                this.map.setCenter(this.val);
                this.map.setZoom(14);
                this.marker.setPosition(this.val);
                this.$emit("input", this.val);
            }
        }
    },
    mounted() {
        if (
            !(
                this.value == undefined ||
                typeof this.value != "object" ||
                (typeof this.value == "object" &&
                    (!this.value.lat || !this.value.lng))
            )
        ) {
            this.val = this.value;
        }
        if (!this.options.map) this.options.map = {};
        if (!this.options.marker) this.options.marker = {};
        if (!this.options.autocomplete) this.options.autocomplete = {};
        this.$emit("input", { location: this.val, address: this.address });
        this.options.map.center = this.val;
        let input = document.getElementById("pac-input");
        this.map = new google.maps.Map(
            document.getElementById("map"),
            Object.assign(
                {
                    center: { lat: 0, lng: 0 },
                    zoom: 15
                },
                this.options.map
            )
        );
        this.marker = new google.maps.Marker(
            Object.assign(
                {
                    map: this.map,
                    position: this.map.getCenter()
                    // draggable: true
                },
                this.options.marker
            )
        );

        this.autocomplete = new google.maps.places.Autocomplete(
            input,
            this.options.autocomplete
        );
        // Set initial restrict to the greater list of countries.
        this.autocomplete.setComponentRestrictions({
            country: ["in"]
        });

        // Specify only the data fields that are needed.
        this.autocomplete.setFields(["address_components", "geometry", "name"]);
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        // events
        this.marker.addListener("dragend", this.geocodeLocation);
        this.autocomplete.addListener("place_changed", this.moveMarker);
    }
};
</script>
