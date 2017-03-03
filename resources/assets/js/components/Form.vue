<template>
    <div>

        <form class="ui form loginForm" action="/api/box" method="post">
            <h2>Add boxes</h2>

            <ul v-if="errors && errors.length">
                <li v-for="error of errors">
                    {{error.message}}
                </li>
            </ul>
            <div v-if=response class="text-red">
                <p v-for="message of response">{{message}}</p>
            </div>


            <label for="name" class="sr-only">Name</label>
            <input
                    type="text"
                    id="name"
                    name="name"
                    value=""
                    placeholder="Name"
                    class="form-control"
                    required
                    maxlength="10"
                    v-model="name"
            />

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

            <label for="destination" class="sr-only">Destination</label>
            <select id="destination" name="destination" class="form-control" v-model="destination">
                <optgroup label="Destination">
                    <option value="sweden">Sweden</option>
                    <option value="china">China</option>
                    <option value="brazil">Brazil</option>
                    <option value="australia">Australia</option>
                </optgroup>
            </select>

            <button class="btn btn-lg btn-primary btn-block" @click.prevent="onSubmit" type="button">Save</button>

        </form>
    </div>
</template>

<script>
    export default {
        name: 'Form',

        data: () => ({
            response: [],
            name: '',
            weight: '',
            color: '',
            destination: '',
            errors: []
        }),

        // Pushes posts to the server when called.
        methods: {
            onSubmit() {
                axios.post('/api/box', {
                    name: this.name,
                    weight: this.weight,
                    color: this.color,
                    destination: this.destination,
                })
                    .then(response => this.response = response.data)
                    .catch(e => {
                        this.errors.push(e)
                    })
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