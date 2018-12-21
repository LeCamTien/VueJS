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
                    <div class="form-group"><label class="col-sm-2 control-label">Role Name</label>
                        <div class="col-sm-10"><input type="text" v-model="role.name" class="form-control"></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10"><textarea v-model="role.description" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Active</label>
                        <div class="col-sm-10"><input type="text" v-model="role.active" class="form-control" name="password"></div>
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
            let id= this.$route.params.id;
            this.role_id = id;
            console.log(id);

            axios.get('/api/roles/show/'+ id)
            .then(response => {
                this.role = response.data.role
            })
            .catch(error => {
                console.log(error)
                alert("Could not load role to edit!")
            });
        },
        data: function() {
            return {
                role_id: null,
                role: {
                    name: '',
                    description: '',
                    active: ''
                },
                message: ''
            }
        },
        methods: {
            submitForm() {
                event.preventDefault();
                
                var newRole = this.role;

                axios.put('/api/roles/update/' + this.role_id, newRole)
                .then(response => {
                    this.message = response.data.message;
                    setTimeout(() => {
                        this.$events.$emit('message-event', this.message);
                    }, 1000)
                    this.$router.replace('/role')
                })
                .catch(error => {
                    console.log(error)
                    alert("Could not update role!")
                });
            }
        }
    }
</script>

<style>
    
</style>