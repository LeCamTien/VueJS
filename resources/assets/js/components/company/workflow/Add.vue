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
	                            <input type="text" name="name" v-model="workflow.name" v-validate="'required'" autocomplete="off" class="form-control">
	                            <h4 style="color: red"><span v-show="errors.has('name')">{{ errors.first('name') }}</span></h4>
	                        </div>
	                    </div>
	                    <div class="hr-line-dashed"></div>
	                    <div class="form-group">
	                        <label class="col-sm-2 control-label">Description</label>
	                        <div class="col-sm-10">
	                            <textarea name="description" rows="3" v-model="workflow.description" v-validate="'required'" class="form-control"></textarea>
	                            <h4 style="color: red"><span v-show="errors.has('description')">{{ errors.first('description') }}</span></h4>
	                        </div>
	                    </div>
	                    <div class="hr-line-dashed"></div>
	                    <div class="form-group">
	                        <label class="col-sm-2 control-label">Diagram</label>
	                        <div class="col-sm-10">
	                        	<input type="file" name="diagram" @change="processFile($event)" v-validate="'required'">
	                            <h4 style="color: red"><span v-show="errors.has('diagram')">{{ errors.first('diagram') }}</span></h4>
	                        </div>
	                    </div>
	                    <div class="hr-line-dashed"></div>
	                    <div class="form-group">
	                        <label class="col-sm-2 control-label">Explanation</label>
	                        <div class="col-sm-10">
	                            <textarea name="explanation" rows="7" v-model="workflow.explanation" v-validate="'required'" class="form-control"></textarea>
	                            <h4 style="color: red"><span v-show="errors.has('explanation')">{{ errors.first('explanation') }}</span></h4>
	                        </div>
	                    </div>
	                    <div class="hr-line-dashed"></div>
	                    <div class="form-group">
	                        <div class="col-sm-4 col-sm-offset-2">
	                            <button class="btn btn-warning" type="reset">Reset</button>
	                            <button class="btn btn-primary" type="submit">Add</button>
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
		data: function() {
			return {
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
				
				var newWorkflow = new FormData();
				if (this.workflow.name) {
					newWorkflow.append("name",this.workflow.name)
				}
			    if (this.workflow.description) {
			    	newWorkflow.append("description",this.workflow.description)
			    }
			    if (this.workflow.diagram) {
			    	newWorkflow.append("diagram",this.workflow.diagram)
			    }
			    if (this.workflow.explanation) {
			    	newWorkflow.append("explanation",this.workflow.explanation)
			    }

				this.$validator.validateAll().then((result) => {
					if (result) {
						axios.post('/api/workflows/store', newWorkflow)
						.then(response => {
							this.$router.replace('/workflow')
						})
						.catch(error => {
							console.log(error);
							alert("Could not insert workflow!");
						});
					}
				});
			}
		}
	}
</script>

<style>
	
</style>