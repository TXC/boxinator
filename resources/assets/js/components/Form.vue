<template>
    <div>

        <form class="ui form loginForm" action="/api/box" method="post" @submit.prevent="onSubmit" >
            <h2>Add boxes</h2>

            <div class="alert alert-success" v-if="submitted">
                Post created!
            </div>

            <div v-bind:class="[ response.name ? 'has-error' : '']">
                <label for="name" class="sr-only">Name</label>
                <input
                        type="text"
                        id="name"
                        name="name"
                        value=""
                        placeholder="Name"
                        class="form-control"
                        required
                        maxlength="255"
                        v-model="name"
                />
                <form-error v-if="response.name" v-for="error of response.name" :response="response">
                    {{ error }}
                </form-error>
            </div>

            <div v-bind:class="[ response.weight ? 'has-error' : '']">
                <label for="weight" class="sr-only">Weight (in kilograms)</label>
                <input
                        type="number"
                        id="weight"
                        name="weight"
                        value=""
                        placeholder="Weight (in kilograms)"
                        class="form-control"
                        required
                        step="0.01"
                        v-model="weight"
                />
                <form-error v-if="response.weight" v-for="error of response.weight" :response="response">
                    {{ error }}
                </form-error>
            </div>

            <div v-bind:class="[ response.color ? 'has-error' : '']">
                <label for="color" class="sr-only">Color</label>
                <input
                        type="color"
                        id="color"
                        name="color"
                        value=""
                        placeholder="Color"
                        class="form-control"
                        required
                        maxlength="10"
                        v-model="color"
                />
            <form-error v-if="response.color" v-for="error of response.color" :response="response">
                {{ error }}
            </form-error>
            </div>

            <div v-bind:class="[ response.destination ? 'has-error' : '']">
                <label for="destination" class="sr-only">Destination</label>
                <select id="destination" name="destination" class="form-control" v-model="destination">
                    <optgroup label="Destination">
                        <option value="sweden">Sweden</option>
                        <option value="china">China</option>
                        <option value="brazil">Brazil</option>
                        <option value="australia">Australia</option>
                    </optgroup>
                </select>
                <form-error v-if="response.destination" v-for="error of response.destination" :response="response">
                    {{ error }}
                </form-error>
            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Save</button>

        </form>
    </div>
</template>

<script>
    export default {
        name: 'Form',

        data: () => ({
            submitted: false,
            response: [],

            name: '',
            weight: '',
            color: '',
            destination: ''
        }),
        // Pushes posts to the server when called.
        methods: {
            onSubmit() {
                let self = this;
                //var a = ['name','weight','color','destination'];
                axios.post('/api/box', {
                    name: this.name,
                    weight: this.weight,
                    color: this.color,
                    destination: this.destination,
                })
                .then(function (response) {
                    self.submitted = true;
                    self.response = response.data;
                })
                .catch(function (e) {
                    console.log(e);
                    self.submitted = false;
                    self.response = e.response.data;
                });
            }
        }
    }
</script>
<style lang="scss">
    $text-color: #636b6f;
    $brand-primary: #3097D1;

    $input-border: lighten($text-color, 40%);
    $input-border-focus: lighten($brand-primary, 25%);
    $input-color-placeholder: lighten($text-color, 30%);

    $font-size-base: 14px;

    form {
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;

        h2 {
            margin-bottom: 10px;
        }

        .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: $font-size-base;
            margin: 10px 0;
        }

        .form-control:focus {
            z-index: 2;
        }

        .form-control::-webkit-input-placeholder { /* Chrome/Opera/Safari */
            color: $input-color-placeholder;
        }
        .form-control::-moz-placeholder { /* Firefox 19+ */
            color: $input-color-placeholder;
        }
        .form-control:-ms-input-placeholder { /* IE 10+ */
            color: $input-color-placeholder;
        }
        .form-control:-moz-placeholder { /* Firefox 18- */
            color: $input-color-placeholder;
        }

        input[type="text"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        input[type="color"] {
            padding: 0;
            height: 36px;
        }


        input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        select {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    }
</style>