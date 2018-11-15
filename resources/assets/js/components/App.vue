<template>
    <div>
    	<sidebar></sidebar>
    	<div id="page-wrapper" class="gray-bg">
	    	<headbar></headbar>
	        <router-view></router-view>
	        <footbar></footbar>
	    </div>    
    </div>
</template>

<script>

import Login from '../components/auth/Login.vue'
import Sidebar from '../components/partials/Sidebar.vue'
import Headbar from '../components/partials/Header.vue'
import Footbar from '../components/partials/Footer.vue'

export default {

	name: 'App',

	data () {
		return {

		}
	},

	components: {
		Login,
		Sidebar,
		Headbar,
		Footbar
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