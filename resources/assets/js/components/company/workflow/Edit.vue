<template>
	<div class="row">
	    <div class="col-lg-12">
	        <div class="ibox float-e-margins">
	            <div class="ibox-title">
	                <h5>All form elements <small>With custom checbox and radion elements.</small></h5>
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
	                <form method="post" enctype="multipart/form-data" v-on:submit="submitForm()" class="form-horizontal">
	                    <div class="form-group">
	                        <label class="col-sm-2 control-label">Workflow Name</label>
	                        <div class="col-sm-10">
	                            <input type="text" name="username" v-model="workflow.name" autocomplete="off" class="form-control">
	                        </div>
	                    </div>
	                    <div class="hr-line-dashed"></div>
	                    <div class="form-group">
	                        <label class="col-sm-2 control-label">Description</label>
	                        <div class="col-sm-10">
	                            <textarea name="description" rows="3" v-model="workflow.description"  class="form-control"></textarea>
	                        </div>
	                    </div>
	                    <div class="hr-line-dashed"></div>
	                    <div class="form-group">
	                        <label class="col-sm-2 control-label">Diagram</label>
	                        <div class="col-sm-10">
	                        	<input type="file" name="diagram" @change="processFile($event)">
	                        </div>
	                    </div>
	                    <div class="hr-line-dashed"></div>
	                    <div class="form-group">
	                        <label class="col-sm-2 control-label">Explanation</label>
	                        <div class="col-sm-10">
	                            <textarea name="explanation" rows="7" v-model="workflow.explanation"  class="form-control"></textarea>
	                        </div>
	                    </div>
	                    <div class="hr-line-dashed"></div>
	                    <div class="form-group">
	                        <div class="col-sm-4 col-sm-offset-2">
	                            <button class="btn btn-primary" type="submit">Edit</button>
	                        </div>
	                    </div>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>
</template>

<script>
	export default {
		mounted() {
			let id = this.$route.params.id;
			this.workflow_id = id;

			axios.get('/api/workflows/show/' + id)
			.then(response => {
				this.workflow = response.data.data;
			})
			.catch(error => {
				console.log(error);
				alert("Could not load workflow!")
			});
		},
		data: function() {
			return {
				workflow_id: null,
				workflow: {
					name: '',
					description: '',
					diagram: '',
					explanation: ''
				}
			}
		},
		methods: {
			processFile(event) {
			    this.workflow.diagram = event.target.files[0];
			},
			submitForm() {
				event.preventDefault();

				var newWorkflow =  new FormData();
					newWorkflow.append('name',this.workflow.name)
					newWorkflow.append('description',this.workflow.description)
					newWorkflow.append('diagram',this.workflow.diagram)
					newWorkflow.append('explanation',this.workflow.explanation)

				axios.post('/api/workflows/update/' + this.workflow_id, newWorkflow)
				.then(response => {
					this.$router.replace('/workflow');
				})
				.catch(error => {
					console.log(error);
					alert("Could not update workflow!");
				});
			}
		}
	}
</script>

<style>
	
</style>