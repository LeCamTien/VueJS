import Vue from 'vue'
import Router from 'vue-router'
import VeeValidate from 'vee-validate'
import VuexFlash from 'vuex-flash';
import Login from '../components/auth/Login.vue'
import Register from '../components/auth/Register.vue'
import Home from '../components/company/Home.vue'
import Department from '../components/company/department/Index.vue'
import DepartmentAdd from '../components/company/department/Add.vue'
import DepartmentEdit from '../components/company/department/Edit.vue'
import Role from '../components/company/role/Index.vue'
import RoleAdd from '../components/company/role/Add.vue'
import RoleEdit from '../components/company/role/Edit.vue'
import User from '../components/company/user/Index.vue'
import UserAdd from '../components/company/user/Add.vue'
import UserEdit from '../components/company/user/Edit.vue'
import Workflow from '../components/company/workflow/Index.vue'
import WorkflowAdd from '../components/company/workflow/Add.vue'
import WorkflowEdit from '../components/company/workflow/Edit.vue'
import WorkflowDetail from '../components/company/workflow/Detail.vue'

Vue.use(VuexFlash, { mixin: true });

Vue.use(Router)
Vue.use(VeeValidate)

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
	{
		path: '/role',
		name: 'role',
		component: Role
	},
	{
		path: '/role-add',
		name: 'roleAdd',
		component: RoleAdd
	},
	{
		path: '/role-edit/:id',
		name: 'roleEdit',
		component: RoleEdit
	},
	{
		path: '/user',
		name: 'user',
		component: User
	},
	{
		path: '/user-add',
		name: 'userAdd',
		component: UserAdd
	},
	{
		path: '/user-edit/:id',
		name: 'userEdit',
		component: UserEdit
	},
	{
		path: '/workflow',
		name: 'workflow',
		component: Workflow
	},
	{
		path: '/workflow-add',
		name: 'workflowAdd',
		component: WorkflowAdd
	},
	{
		path: '/workflow-edit/:id',
		name: 'workflowEdit',
		component: WorkflowEdit
	},
	{
		path: '/workflow-detail/:id',
		name: 'workflowDetail',
		component: WorkflowDetail
	}
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

// router.push('/');

export default router;