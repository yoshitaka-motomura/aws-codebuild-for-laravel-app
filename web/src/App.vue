<script setup lang="ts">
import { RouterView } from 'vue-router'
import  AppHeader from './components/globals/AppHeader.vue'
</script>

<template>
  <v-app>
    <app-header />
  <v-main>
    <v-container class="h-screen">
      <RouterView />
    </v-container>
  </v-main>
</v-app>
</template>
