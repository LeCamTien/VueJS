<template>
	<div class="content">
		<div class="row wrapper border-bottom white-bg page-heading">
		    <div class="col-lg-10">
		        <h2>Workflow Management</h2>
		        <ol class="breadcrumb">
		            <li>
		                <router-link :to="{name:'workflowAdd'}"><a href="" class="btn btn-warning"><i class="fa fa-plus"></i>Add new workflow</a></router-link>
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
		                    <h5>Workflow</h5>
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
		                    <h4 v-if="message != ''" style="color: red">test</h4>
		                </div>
		                <div class="ibox-content">
		                    <div class="table-responsive">
		                        <table class="table table-bordered table-striped">
		                            <thead>
		                                <tr>
		                                    <th>ID</th>
		                                    <th>Name</th>
		                                    <th>Description</th>
		                                    <th>Diagram</th>
		                                    <th>Explanation</th>
		                                    <th width="100px">Function</th>
		                                </tr>
		                            </thead>
		                            <tbody>
		                                <tr v-for="workflow, index in workflows" >
		                                    <th>{{ workflow.workflow_id }}</th>
		                                    <td>{{ workflow.name }}</td>
		                                    <td>{{ workflow.description }}</td>
		                                    <td><img v-bind:src="'/storage/app/files/' + workflow.diagram" height="90px" width="150px"></td>
		                                    <td>{{ workflow.explanation }}</td>
		                                    <td>
		                                    	<router-link :to="{name:'workflowEdit', params: {id:workflow.workflow_id}}">
		                                    		<a href="" title="" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
		                                    	</router-link>
		                                    	<router-link :to="{name:'workflowDetail', params: {id:workflow.workflow_id}}">
		                                    		<a href="" title="" class="btn btn-success"><i class="fa fa-info-circle"></i> Detail</a>
		                                    	</router-link>
	                                            <a href="#" title="" v-on:click="deleteItem(workflow.workflow_id, index)" class="btn btn-danger"><i class="fa fa-trash"></i> Delete
	                                            </a>
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
				workflows:[],
				message: ''
			}
		},
		mounted() {
			axios.get('/api/workflows/index')
			.then(response => {
				this.workflows = response.data.data;
			})
			.catch(error => {
				console.log(error);
				alert("Could not load workflows data!")
			});

		},
		methods: {
			deleteItem(workflow_id, index) {
				if (confirm("Do you really want to delete it?")) {
					
					axios.delete('/api/workflows/delete/' + workflow_id)
					.then(response => {
						this.workflows.splice(index, 1);
					})
					.catch(error => {
						console.log(error);
						alert("Could not delete workflow");
					});
				}
			}
		}
	}
</script>

<style>
	
</style>