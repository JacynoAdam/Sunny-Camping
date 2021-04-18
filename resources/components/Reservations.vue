<template>
    <div>
        <select class="form-control" type="text" v-model="current">
            <option v-for="(room, key) in rooms" :value="key">{{ room }}</option>
        </select>
        <h1>{{ rooms[current] }}</h1>
    </div>
</template>

<script>
export default {
    props: ['rooms', 'current'],
    data() {
        return {

        }
    },
}
</script>
