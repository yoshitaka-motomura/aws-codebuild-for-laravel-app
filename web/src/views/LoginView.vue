<template>
    <div>
        <h1>login</h1>
        <section>
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" v-model="accountState.email" />
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" v-model="accountState.password" />
                </div>  
            <div>
                <button type="button" @click="onClickHandler">Login</button>
            </div>
        </section>
    </div>
</template>
<script setup lang="ts">
import { getCurrentInstance, onMounted, reactive } from 'vue';
import { requestClient } from '@/libs/client'

const app = getCurrentInstance();
const accountState = reactive({
    email: 'daniel.cameron@example.org',
    password: 'password',
});
const getCsrfToken = async () => {
    console.log('getCsrfToken')
    const url = app?.appContext.config.globalProperties.$config.endpoints['csrf-cookie'];
    await requestClient.get(url);
};
const onClickHandler = async () => {
    console.log(accountState);
    await getCsrfToken();
    const url = app?.appContext.config.globalProperties.$config.endpoints['login'];
    await requestClient.post(url, accountState).then((res)=>{
        console.log('success')
        console.log(res);
    }).catch((err)=>{
        console.log('error')
        console.log(err);
    });
};

</script>