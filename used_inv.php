<?php

include "head.php";
$page = "used_inv";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="used_inv_style.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <title>Lietots inventārs</title>
</head>

<body>
    <?php include "navigation.php"; ?>
    <h1>Lietots inventārs</h1>

    <div id="app">
        <div class="tickets">
            <div class="tickets__header">
                <items_table>
                    <items_header>
                        <!-- te komponentei pievieno klāt arī kolonnas -->
                        <table_columns v-for="th in inventory_titles" :column="th"></table_columns> <!-- cikls, lai komponente izsauktos vairākas reizes -->
                    </items_header>
                    <items_row v-for="item in inventory_list" :row="item"></items_row>
                </items_table>
            </div>
        </div>
        <button id="update-list" @click="requestApi('api.php')">Atjaunot sarakstu</button>
    </div>

    <script src="script.js"></script>
    <script>
        Vue.component('items_table', {
            template: `<table class="tickets__list">
            <slot></slot>
        </table>`
        });

        Vue.component('items_header', { //template priekš tabulas
            template: `
            <tr>
                <slot></slot>
            </tr>
        `
        });

        Vue.component('table_columns', {
            props: ["column"],
            template: '<th v-text="column"></th>'
        });

        Vue.component('items_row', {
            props: ['row'],
            template: `
        <tr>
            <td class="border-white">
                <img v-if="row.image_url" v-bind:src="row.image_url">
                <template v-if="!row.image_url">
                    <i>No image</i>
                </template>
            </td>
            <td class="border-white">
                <span>{{row.title}}</span>
            </td>
            <td class="border-white">
                {{row.description}}
            </td>
            <td>
                {{row.cena}}
            </td>
        </tr>`
        });

        let app = new Vue({
            el: "#app",
            data: {
                inventory_titles: ["Attēls", "Nosaukums", "Apraksts", "Cena (EUR)"], //uzdod kā masīvu visus tabulu virsrakstus
                inventory_list: []
            },
            methods: {
                requestApi: function(url) {
                    request(url, changeList);
                }
            }
        });

        function changeList(response) {
            app.inventory_list = JSON.parse(response);
        }

        request("api.php", changeList);
    </script>

</body>

</html>