<template>
  <div>
    <h1>My Demo View</h1>
    <p>My demo view is working!</p>
    <p>{{ state.message }}</p>
  </div>
</template>
<script lang="ts" setup>
import { reactive } from 'vue'
const state = reactive({
  message: 'hello world'
})
</script>
