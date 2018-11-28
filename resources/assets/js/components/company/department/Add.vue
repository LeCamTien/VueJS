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
                <form method="post" v-on:submit="submitForm()" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Department Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" v-model="department.name" v-validate="'required'" class="form-control">
                            <h4 style="color: red"><span v-show="errors.has('name')">{{ errors.first('name') }}</span></h4>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                            <textarea name="description" v-model="department.descripton" v-validate="'required'" rows="3" class="form-control"></textarea>
                            <h4 style="color: red"><span v-show="errors.has('description')">{{ errors.first('description') }}</span></h4>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Active</label>
                        <div class="col-sm-10">
                            <input type="text" name="active" v-model="department.active" v-validate="'required|numeric'" class="form-control">
                            <h4 style="color: red"><span v-show="errors.has('active')">{{ errors.first('active') }}</span></h4>
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
        data: function () {
            return {
                department: {
                    name: '',
                    description: '',
                    active: '',
                }
            }
        },
        methods: {
            submitForm() {
                event.preventDefault();

                var newDepartment = this.department;
                
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        axios.post('/api/departments/store', newDepartment)
                        .then(response => {
                            this.$router.push({path: '/department'});
                        })
                        .catch(error => {
                            console.log(error);
                            alert("Could not create your company");
                        }); 
                    }
                })
                
            }
        }
	}
</script>

<style>
	
</style>