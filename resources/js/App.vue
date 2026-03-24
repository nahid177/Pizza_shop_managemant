<template>
  <div>
    <h1>🚀 Laravel 12 + Blade + Vue + Vite + Sail</h1>
    <button @click="count++">Clicked {{ count }} times</button>
  </div>
</template>

<script setup>
import { ref } from 'vue'
const count = ref(0)
</script>