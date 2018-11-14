<template>
    <div>
        <router-view></router-view>
    </div>
</template>

<script>

import Login from '../components/auth/Login.vue'

export default {

	name: 'App',

	data () {
		return {

		}
	},

	components: {
		Login
	},

	methods: {
        show() {
          alert(1);           
        },
    },

};

</script>

<style>
	
</style>