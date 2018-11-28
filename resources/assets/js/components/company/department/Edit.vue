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
                <form method="POST" v-on:submit="submitForm()" class="form-horizontal">
                    <div class="form-group"><label class="col-sm-2 control-label">Department Name</label>
                        <div class="col-sm-10"><input type="text" v-model="department.name" class="form-control"></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                            <textarea v-model="department.description" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Active</label>
                        <div class="col-sm-10"><input type="text" v-model="department.active" class="form-control" name="password"></div>
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
            let app = this;
            let id = app.$route.params.id;
            app.department_id = id;

            axios.get('/api/departments/show/' + id)
                .then( response => {
                    this.department = response.data.department
                })
                .catch(function () {
                    alert("Could not load your company")
                });
        },
        data: function () {
            return {
                department_id: null,
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
                console.log(this.department_id);

                axios.put('/api/departments/update/' + this.department_id, newDepartment)
                    .then(response => {
                        this.$router.replace('/department');
                    })
                    .catch(error => {
                        console.log(error);
                        alert("Could not update your company");
                    });
            }
        }
	}
</script>

<style>
	
</style>