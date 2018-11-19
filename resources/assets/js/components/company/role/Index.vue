<template>
<div class="content">
	<div class="row wrapper border-bottom white-bg page-heading">
	    <div class="col-lg-10">
	        <h2>Grid Options - based on Bootstrap Grid system overview</h2>
	        <ol class="breadcrumb">
	            <li>
	                <router-link :to="{name:'roleAdd'}"><a href="" class="btn btn-warning"><i class="fa fa-plus"></i>Add new role</a></router-link>
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
	                    <h5>Role</h5>
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
	                </div>
	                <div class="ibox-content">
	                    <div class="table-responsive">
	                        <table class="table table-bordered table-striped">
	                            <thead>
	                                <tr>
	                                    <th>ID</th>
	                                    <th>Name</th>
	                                    <th>Description</th>
	                                    <th>Active</th>
	                                    <th>Function</th>
	                                </tr>
	                            </thead>
	                            <tbody>
	                                
	                                <tr v-for="role, index in roles" >
	                                    <th>{{ role.role_id }}</th>
	                                    <td>{{ role.name }}</td>
	                                    <td>{{ role.description }}</td>
	                                    <td>{{ role.active }}</td>
	                                    <td>
	                                    	<router-link :to="{name:'roleEdit', params: {id: role.role_id}}"><a href="" title="" class="btn btn-primary"><i class="fa fa-edit"></i> Sửa</a></router-link>
                                            <a href="#" title="" v-on:click="deleteItem(role.role_id, index)" class="btn btn-danger"><i class="fa fa-pencil"></i> Xóa</a>
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
		data: function () {
            return {
                roles: []
            }
        },
        mounted() {
            
            axios.get('/api/roles/index')
                .then(response => {
                    this.roles = response.data.roles
                    console.log(this.roles)
                })
                .catch(error => {
                    console.log(error);
                    alert("Could not load role");
                });
        },
        methods: {
            deleteItem(role_id, index) {
                if (confirm("Do you really want to delete it?")) {
                    
                    axios.delete('/api/roles/delete/' + role_id)
                        .then(response => {
                            this.roles.splice(index, 1)
                        })
                        .catch(error => {
                        	console.log(error);
                            alert("Could not delete role");
                        });
                }
            }
        }
	}
</script>

<style>
	
</style>