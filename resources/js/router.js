import Vue from 'vue';
import Vuerouter from 'vue-router';

Vue.use(Vuerouter);

export default new Vuerouter({
	routes: [
		{
			path: '/', component: ExampleComponent
		}
	] ,
	mode: 'history' //remove it for older browser
})