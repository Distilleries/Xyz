<template>
    <div class="view view--home">
        <top-menu view="Home"></top-menu>

        <div class="main">
            Home Component<br>
            Count users: {{ usersCount }}
        </div>

        <teaser></teaser>

        <h3>Test store feature</h3>
        <input type="email" v-model="email"><br>
        <button @click="addUser($event)">Add user to store</button>
    </div>
</template>

<script src="./Home.js"></script>