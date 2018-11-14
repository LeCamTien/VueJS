import Vue from 'vue'
import Router from 'vue-router'
import Login from '../components/auth/Login.vue'
import Register from '../components/auth/Register.vue'
import Home from '../components/company/Home.vue'
import Department from '../components/company/department/Index.vue'
import DepartmentAdd from '../components/company/department/Add.vue'
import DepartmentEdit from '../components/company/department/Edit.vue'

Vue.use(Router)

var routers = [
	{
		path: '/login',
		name: 'login', 
		component: Login, 
	},
	{
		path: '/resigter',
		name: 'register',
		component: Register,
	},
	{
		path: '/',
		name: 'home',
		component: Home,
	},
	{
		path: '/department',
		name: 'department',
		component: Department
	},
	{
		path: '/department-add',
		name: 'departmentAdd',
		component: DepartmentAdd
	},
	{
		path: '/department-edit/:id',
		name: 'departmentEdit',
		component: DepartmentEdit
	},
	// {
	// 	path: '*',
	// 	redirect: '/login1'
	// }
];

var router = new Router({
	//mode: 'history',
	routes: routers
});

router.beforeEach((to, from, next) => {

	next();
});

router.push('/department');

export default router;