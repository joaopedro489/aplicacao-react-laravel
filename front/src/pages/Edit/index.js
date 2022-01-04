/* eslint-disable react-hooks/exhaustive-deps */
import NavBar from'../../components/NavBar';
import UserService from '../../services/UserService';
import { useNavigate } from 'react-router-dom';
import { useForm } from 'react-hook-form';
import { useEffect, useState } from 'react';

export default function Register(){
	const {register, handleSubmit} = useForm();
	const navigate = useNavigate();
	const [countries, setCountries] = useState();
	const [country, setCountry] = useState();
	const [states, setStates] = useState();
	const [user, setUser] = useState();
	const [loading, setLoading] = useState(true);
	useEffect(async()=>{
		
		const response = await UserService.getCountries();
		setCountries(response);
		await UserService.getUser().then(async res => {
			if(res !== undefined){
				setUser(res);
				setCountry(res.address.state.country_id);
				setLoading(false);	
			}
			else{
				setUser(res);
				localStorage.removeItem('token');
		}});		
	}, []);

	useEffect(async() => {
		if(country !== undefined || country !== "-1"){
			try{
				const response = await UserService.getStates(country);
				setStates(response);
			} catch(e){
				console.log(e);
			}
		}
	}, [country]);

	const removeEmptyFields = (data) => {
		Object.keys(data).forEach(key => {
		  if (data[key] === '' || data[key] == null) {
			delete data[key];
		  }
		});
	  }
	  

	const onSubmit = async data => {
		removeEmptyFields(data);
		try{
			await UserService.editProfile(data);
			alert('Atualizado com sucesso');
			navigate('/');
		} catch(e){
			alert('Não foi possível se editar.')
		}
	}
	const handleDelete = async () => {
		try {
			await UserService.deleteUser();
			alert("Usuário Deletado");
			window.location.reload();
			navigate('/');
		} catch (e) {
			alert('Não foi possível se deletar.')
		}
	}
	return(
		<div>
			{ loading &&
				<h1>Carregando...</h1>
			}
			{
				!loading &&
				<div>
					<NavBar
					user={user}
					/>
					<form className='loginForm' onSubmit={handleSubmit(onSubmit)}>
						<input {...register("name" , { required: false })} defaultValue={user.name} placeholder="Nome"
						/>
						<input {...register("email" , { required: false })} defaultValue={user.email} placeholder="Email"
						/>
						<input {...register("cpf", { required: false, maxLength: 11})} defaultValue={user.cpf}  placeholder="CPF"
						/>
						<input {...register("pis", {maxLength: 11})} defaultValue={user.pis} placeholder="PIS"
						/>
						<select defaultValue={user.address.state.country_id} onChange={(e) => setCountry(e.target.value)}>
							<option  value='-1'>Selecione o País</option>
							{ countries &&
								countries.map((country) => {
									return(
										<option key={country.id} value={country.id}>{country.name}</option>
									)
								})
							}	
						</select>
						<select {...register("state_id")}>
							<option defaultValue={user.address.state_id} value=''>Selecione o Estado</option>
							{ states &&
								states.map((state) => {
									return(
										<option key={state.id} value={state.id}>{state.name}</option>
		
									)
								})
							}	
						</select>
						<input defaultValue={user.address.municipality} {...register("municipality", { required: false })} placeholder="Municipio"
						/>
						<input defaultValue={user.address.cep} {...register("cep", { required: false, maxLength: 8 })} placeholder="CEP"
						/>
						<input defaultValue={user.address.street} {...register("street", { required: false })} placeholder="Rua"
						/>
						<input defaultValue={user.address.number} {...register("number", { required: false })} placeholder="Numero"
						/>
						<input defaultValue={user.address.complement} {...register("complement", { required: false })} placeholder="Complemento"
						/>
						<input type="password" {...register("password", { required: false })} placeholder="Senha"
						/>
						<div>
							<button className='loginPageButton' type="button" onClick={handleDelete}>Deletar User</button>
							<button className='loginPageButton' type="submit">Salvar</button>
						</div>
					</form>
				</div>
	
			}
		</div>
	);
}