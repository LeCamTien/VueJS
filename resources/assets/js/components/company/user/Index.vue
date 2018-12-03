<template>
	<div class="content">
		<div class="row wrapper border-bottom white-bg page-heading">
		    <div class="col-lg-10">
		        <h2>User Management</h2>
		        <ol class="breadcrumb">
		            <li>
		                <router-link :to="{name:'userAdd'}"><a href="" class="btn btn-warning"><i class="fa fa-plus"></i>Add new user</a></router-link>
		            </li>
		        </ol>
		    </div>
		    <div class="col-lg-2">
		    </div>
		</div>
		<div class="wrapper wrapper-content">
		    <div class="row">
		        <div class="col-lg-12">
		            <div class="ibox float-e-margins">
		                <div class="ibox-title">
		                    <h5>User</h5>
		                    <div class="ibox-tools">
		                        <a class="collapse-link">
		                            <i class="fa fa-chevron-up"></i>
		                        </a>
		                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
		                            <i class="fa fa-wrench"></i>
		                        </a>
		                        <ul class="dropdown-menu dropdown-user">
		                            <li><a href="#">Config option 1</a>
		                            </li>
		                            <li><a href="#">Config option 2</a>
		                            </li>
		                        </ul>
		                        <a class="close-link">
		                            <i class="fa fa-times"></i>
		                        </a>
		                    </div>
		                    <h4 style="color: red">{{ message }}</h4>
		                </div>
		                <div class="ibox-content">
		                    <div class="table-responsive">
		                        <table class="table table-bordered table-striped">
		                            <thead>
		                                <tr>
		                                    <th>ID</th>
		                                    <th>Username</th>
		                                    <th>Email</th>
		                                    <th>Role</th>
		                                    <th width="180px">Function</th>
		                                </tr>
		                            </thead>
		                            <tbody>
		                                <tr v-for="user, index in users" >
		                                    <th>{{ user.user_id }}</th>
		                                    <td>{{ user.username }}</td>
		                                    <td>{{ user.email }}</td>
		                                    <td v-if="user.role_id == 1">Admin</td>
		                                    <td v-if="user.role_id == 2">User</td>
		                                    <td>
		                                    	<router-link :to="{name:'userEdit', params: {id:user.user_id}}"><a href="" title="" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a></router-link>
	                                            <a href="#" title="" v-on:click="deleteItem(user.user_id, index)" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
		                                    </td>
		                                </tr>
		                            </tbody>
		                        </table>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	</div>	
</template>

<script>
	export default {
		data: function() {
			return {
				users: [],
				message: ''
			}
		},
		mounted() {
			axios.get('api/users/index')
			.then(response => {
				this.users = response.data.users
			})
			.catch(error => {
				console.log(error)
				alert("Could not get User!")
			});

			if (this.$route.query.message) {
				this.message = this.$route.query.message;
			}

			this.$events.$on('message-event', response => {
				this.message = response;
			})
		},
		methods: {
			deleteItem(user_id, index) {
				if (confirm("Do you really want to delete it?")) {
					axios.delete('/api/users/delete/' + user_id)
					.then(response => {
						this.$events.$emit('message-event', response.data.message)
						this.users.splice(index,1)
					})
					.catch(error => {
						console.log(error)
						alert("Could not delete User!")
					});
				}
			}
		}
	}
</script>

<style>
	
</style>