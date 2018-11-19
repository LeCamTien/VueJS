<template>
<div class="content">
	<div class="row wrapper border-bottom white-bg page-heading">
	    <div class="col-lg-10">
	        <h2>Grid Options - based on Bootstrap Grid system overview</h2>
	        <ol class="breadcrumb">
	            <li>
	                <router-link :to="{name:'departmentAdd'}"><a href="" class="btn btn-warning"><i class="fa fa-plus"></i>Add new department</a></router-link>
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
	                                
	                                <tr v-for="department, index in departments" >
	                                    <th>{{ department.department_id }}</th>
	                                    <td>{{ department.name }}</td>
	                                    <td>{{ department.description }}</td>
	                                    <td>{{ department.active }}</td>
	                                    <td>
	                                    	<router-link :to="{name:'departmentEdit', params: {id:department.department_id}}"><a href="" title="" class="btn btn-primary"><i class="fa fa-edit"></i> Sửa</a></router-link>
                                            <a href="#" title="" v-on:click="deleteItem(department.department_id, index)" class="btn btn-danger"><i class="fa fa-pencil"></i> Xóa</a>
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
                departments: []
            }
        },
        mounted() {
            
            axios.get('/api/departments/index')
                .then(response => {
                    this.departments = response.data.departments
                })
                .catch(error => {
                    console.log(error);
                    alert("Could not load user");
                });
        },
        methods: {
            deleteItem(department_id, index) {
                if (confirm("Do you really want to delete it?")) {
                    
                    axios.delete('/api/departments/delete/' + department_id)
                        .then(response => {
                            this.departments.splice(index,1)
                        })
                        .catch(error => {
                        	console.log(error);
                            alert("Could not delete company");
                        });
                }
            }
        }
	}
</script>

<style>
	
</style>