<template>
<div class="content">
	<div class="row wrapper border-bottom white-bg page-heading">
		<div class="col-lg-10">
			<h2>E-commerce product detail</h2>
			<ol class="breadcrumb">
				<li>
					<a href="index.html">Home</a>
				</li>
				<li>
					<a>E-commerce</a>
				</li>
				<li class="active">
					<strong>Product detail</strong>
				</li>
			</ol>
		</div>
		<div class="col-lg-2"></div>
	</div>
	<div class="wrapper wrapper-content animated fadeInRight">
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="ibox float-e-margins">
	                <div class="ibox-content text-center p-md">
	                    <h2><span class="text-navy">{{ workflow.name }}</span></h2>
	                    <p>{{ workflow.description }}</p>
	                    <img src="/storage/app/files/picture.jpg">
	                    <div>{{ workflow.explanation }}</div>
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
				workflow: {
					name: '',
					description: '',
					diagram: '',
					explanation: ''
				}
			}
		},
		mounted() {
			let id = this.$route.params.id;
			axios.get('/api/workflows/show/' + id)
			.then(response => {
				this.workflow = response.data.data;
				console.log(this.workflow)
			})
			.catch(error => {
				console.log(error);
				alert("Could not load detail workflow!")
			});
		}
	}
</script>

<style>
	
</style>