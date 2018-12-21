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
                    <div class="form-group"><label class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10"><input type="text" v-model="user.username" readonly="" class="form-control"></div>
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
            let id = this.$route.params.id
            this.user_id = id

            axios.get('/api/users/show/' + id)
            .then(response => {
                this.user = response.data.user
            })
            .catch(error => {
                console.log(error)
                alert('Could not load user!')
            })
        },
        data: function() {
            return {
                user_id: null,
                user: {
                    username: '',
                    email: '',
                    role_id: ''
                },
                message: ''
            }
        },
        methods: {
            submitForm() {
                event.preventDefault()

                var newUser = this.user
                axios.put('/api/users/update/' + this.user_id, newUser)
                .then(response => {
                    this.message = response.data.message
                    this.$router.push({
                        path: '/user',
                        query: {
                            message: this.message
                        }
                    })
                })
                .catch(error => {
                    console.log(error)
                    alert("Could not update User!")
                });
            }
        }
    }
</script>

<style>
    
</style>