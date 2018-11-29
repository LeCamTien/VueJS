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
                        <label class="col-sm-2 control-label">Role Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" v-model="role.name" v-validate="'required'" class="form-control">
                            <h4 style="color: red"><span v-show="errors.has('name')">{{ errors.first('name') }}</span></h4>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                            <textarea name="description" v-model="role.description" v-validate="'required'" rows="3" class="form-control"></textarea>
                            <h4 style="color: red"><span v-show="errors.has('description')">{{ errors.first('description') }}</span></h4>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Active</label>
                        <div class="col-sm-10">
                            <input type="text" name="active" v-model="role.active" v-validate="'required|numeric'" class="form-control">
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
    import Vue from 'vue'
    import VeeValidate from 'vee-validate'

    Vue.use(VeeValidate)
	export default {
		data: function() {
			return {
				role: {
					name: '',
					description: '',
					active: ''
				}
			}
		},
		methods: {
			submitForm() {
    			event.preventDefault();

    			var newRole = this.role;
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        axios.post('/api/roles/store',  newRole)
                        .then(response => {
                            // this.bus.$emit('message', true)
                            this.$router.push('/role')
                        })
                        .catch(error => {
                            console.log(error);
                            alert("Could not create new role");
                        });
                    }
                });
				 
			}
		}
	}
</script>

<style>
	
</style>