import axios from 'axios';

const route = axios.create({
    baseURL: 'https://ponto-tel-desafio.herokuapp.com/api',
});

// eslint-disable-next-line import/no-anonymous-default-export
export default {
	async login(form){
		try{
			const response = await route.post('/login', form);
			return response.data;
		} catch(e){
			alert("Não foi possível realizar a ação anterior.");
		}
	},
	async getUser(){
		try{
			const response = await route.get('/user', {
                headers: { 'Authorization': 'Bearer ' + localStorage.getItem('token')}
            });
			return response.data;
		} catch(e){
			alert("Não foi possível realizar a ação anterior.");
		}
	},
	async registerUser(data){
		try{
			const response = await route.post('/user', data);
			return response.data;
		} catch(e){
			alert("Não foi possível realizar a ação anterior.");
		}
	},
	async getCountries(){
		try{
			const response = await route.get('/country');
			return response.data;
		} catch(e){
			alert("Não foi possível realizar a ação anterior.");
		}
	},
	async getStates(country){
		try{
			const response = await route.get('/states/' + country);
			return response.data;
		} catch(e){
			alert("Não foi possível realizar a ação anterior.");
		}
	},
	async editProfile(data){
		try{
			console.log(data);
			const response = await route.put('/user', data, {
                headers: { 'Authorization': 'Bearer ' + localStorage.getItem('token')}
            });
			return response.data;
		} catch(e) {
			alert("Não foi possível realizar a ação anterior.");	
		}
	},
	async logout(){
		try {
			const response = await route.get('/logout', {
                headers: { 'Authorization': 'Bearer ' + localStorage.getItem('token')}
            });
			localStorage.removeItem('token');
			return response.data;
		} catch (e) {
			alert("Não foi possível realizar a ação anterior.");
		}
	},
	async deleteUser(){
		try {
			const response = await route.delete('/user', {
                headers: { 'Authorization': 'Bearer ' + localStorage.getItem('token')}
            });
			localStorage.removeItem('token');
			return response.data;
		} catch (e) {
			alert("Não foi possível realizar a ação anterior.");
		}
	}
}