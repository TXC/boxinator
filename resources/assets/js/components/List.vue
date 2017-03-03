<template>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <caption>Table caption is the descriptive title</caption>
            <thead>
            <tr>
                <th>Receiver</th>
                <th>Weight</th>
                <th>Color</th>
                <th>Cost</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="box of boxes">
                    <td>{{ box.name }}</td>
                    <td>{{ box.weight }} kg</td>
                    <td v-bind:style="{ backgroundColor: box.color }">&nbsp;</td>
                    <td>{{ box.cost }} SEK</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
    export default {
        name: 'List',
        data () {
            return {
                boxes: [],
                errors: []
            }
        },
        created() {
            return axios.get('/api/box')
                .then(response => this.boxes = response.data)
                .catch(e => {
                    this.errors.push(e)
            })
        }
    }
</script>
<style lang="scss">
    table {
        max-width: 330px;
        thead {

            th {
                font-weight: bold;
                font-size: 1.2em;
            }
            /*
            th:nth-child(1) {
                width: 130px;
            }
            th:nth-child(2) {
                width: 130px;
            }
            th:nth-child(3) {
                width: 30px;
            }
            */
            th:nth-child(4) {
                text-align: right;
            }
        }

        tbody {
            tr:nth-child(even) {
                background-color: #ccc;
            }
            tr:nth-child(even) {
                background-color: #eee;
            }
            td:nth-child(4) {
                text-align: right;
            }
        }
    }
</style>