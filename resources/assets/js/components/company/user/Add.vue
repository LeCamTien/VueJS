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
                    <div class="form-group"><label class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10"><input type="text" v-model="user.username" class="form-control"></div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10"><input type="password" v-model="user.password" class="form-control"></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10"><input type="text" v-model="user.email" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Role</label>
                        <div class="col-sm-10"><input type="text" v-model="user.role_id" class="form-control" name="password"></div>
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
                user: {
                    username: '',
                    password: '',
                    email: '',
                    role_id: ''
                }
            }
        },
        methods: {
            submitForm() {
                event.preventDefault();

                var newUser = this.user;
console.log(newUser)
                axios.post('/api/users/store', newUser)
                .then(response => {
                    this.$router.replace('/user')
                })
                .catch(error => {
                    console.log(error)
                    alert("Could not create new User!")
                })
            }
        }
	}
</script>

<style>
	
</style>