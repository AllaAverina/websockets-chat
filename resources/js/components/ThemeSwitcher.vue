<template>
    <div>
        <label for="switcher" class="align-middle fs-4 bi"
            :class="(theme === 'light') ? 'bi-moon-fill text-info' : 'bi-sun-fill text-warning'"></label>
        <input type="checkbox" id="switcher" class="invisible" v-model="theme" true-value="dark" false-value="light"
            @change="themeSwitch">
    </div>
</template>

<script>
export default {
    data() {
        return {
            theme: localStorage.getItem('theme') ?? 'light',
        }
    },
    created() {
        document.documentElement.setAttribute('data-bs-theme', this.theme);
    },
    methods: {
        themeSwitch() {
            document.documentElement.setAttribute('data-bs-theme', this.theme);
            localStorage.setItem('theme', this.theme);
        }
    }
}
</script>