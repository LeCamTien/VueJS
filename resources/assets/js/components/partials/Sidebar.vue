<template>
	<nav class="navbar-default navbar-static-side" role="navigation">	
		<div class="sidebar-collapse">
		    <ul class="nav metismenu" id="side-menu">
		        <li class="nav-header">
		            <div class="dropdown profile-element"> <span>
		                    <img alt="image" class="img-circle" height="50" width="60" src="/resources/assets/templates/images/ocean.jpg" />
		                </span>
		                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
		                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Admin</strong>
		                        </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
		                <ul class="dropdown-menu animated fadeInRight m-t-xs">
		                    <li><a href="profile.html">Profile</a></li>
		                    <li><a href="contacts.html">Contacts</a></li>
		                    <li><a href="mailbox.html">Mailbox</a></li>
		                    <li class="divider"></li>
		                    <li><a href="login.html">Logout</a></li>
		                </ul>
		            </div>
		            <div class="logo-element">
		                IN+
		            </div>
		        </li>
		        <li class="special_link">
		            <router-link :to="{name:'home'}"><a href=""><i class="fa fa-diamond"></i><span class="nav-label">Home</span></a></router-link>
		        </li>
		        <li>
		            <router-link :to="{name:'department'}"><a href=""><i class="fa fa-pie-chart"></i> <span class="nav-label">Department</span></a></router-link>
		        </li>
		        <li>
		            <router-link :to="{name:'role'}"><a href=""><i class="fa fa-flask"></i><span class="nav-label">Role</span></a></router-link>
		        </li>
		        <li>
		            <router-link :to="{name:'user'}"><a href=""><i class="fa fa-magic"></i><span class="nav-label">User </span><span class="label label-info pull-right">{{ count }}</span></a></router-link>
		        </li>
		        <li>
		            <router-link :to="{name:'workflow'}"><a href=""><i class="fa fa-database"></i> <span class="nav-label">Workflow</span></a></router-link>
		        </li>
		    </ul>
		</div> 
	</nav>	 
</template>

<script>
	export default {
		data: function() {
			return {
				count: ''
			}
		},
		mounted() {
			axios.get('/api/users/getCountUser')
			.then(response=> {
				this.count = response.data.data
			})
			.catch(error => {
				console.log(error);
				alert("Could not load count User!")
			});
		}
	}
</script>

<style>
	
</style>