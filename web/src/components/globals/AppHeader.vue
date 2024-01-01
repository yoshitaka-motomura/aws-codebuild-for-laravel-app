<template>
  <div>
    <v-navigation-drawer v-model="drawer">
      <v-list color="transparent" nav>
          <v-list-item prepend-icon="mdi-view-dashboard" title="Home" href="/" link></v-list-item>
          <v-list-item prepend-icon="mdi-account-box" title="About" href="/about" link></v-list-item>
          <v-list-item prepend-icon="mdi-dna" title="Demo" href="/demo"></v-list-item>
        </v-list>
    </v-navigation-drawer>

    <v-app-bar color="primary">
      <v-btn icon @click="toggleDrawer">
        <v-icon>mdi-menu</v-icon>
      </v-btn>
      <v-toolbar-title>Demo App</v-toolbar-title>
    </v-app-bar>
  </div>
</template>
<script setup lang="ts">
import { ref } from 'vue'
const drawer = ref(false)

const toggleDrawer = () => {
  drawer.value = !drawer.value
}
</script>
