<template>
  <div>
    <h1>My Demo View</h1>
    <p>My demo view is working!</p>
    <p>{{ state.message }}</p>
  </div>
</template>
<script lang="ts" setup>
import { reactive, onMounted } from 'vue'
import axios from 'axios'

const state = reactive({
  message: 'hello world'
})

onMounted(async()=>{
  const result = await axios.get('/api/message').then((res)=>{
    return res.data
  })
  state.message = result.message
})
</script>
