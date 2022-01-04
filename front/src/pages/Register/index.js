/* eslint-disable react-hooks/exhaustive-deps */
import NavBar from'../../components/NavBar';
import UserService from '../../services/UserService';
import { useNavigate } from 'react-router-dom';
import { useForm } from 'react-hook-form';
import { useEffect, useState } from 'react';

export default function Register(){
	const {register, handleSubmit, getValues} = useForm();
	const navigate = useNavigate();
	const [countries, setCountries] = useState();
	const [country, setCountry] = useState();
	const [states, setStates] = useState();
	const [state, setState] = useState();
	useEffect(async()=>{
		const response = await UserService.getCountries();
		setCountries(response);
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

	const onSubmit = async data => {
		const form = getValues();
		form.state_id = state;
		try{
			await UserService.registerUser(form);
			alert('Usuário criado com sucesso');
			navigate('/login');
		} catch(e){
			alert('Não foi possível se registrar.')
		}
	}

	return(
		<div>
			<NavBar ></NavBar>
			<form className='loginForm' onSubmit={handleSubmit(onSubmit)}>
				<input {...register("name" , { required: true })} placeholder="Nome"
				/>
				<input {...register("email" , { required: true })} placeholder="Email"
				/>
				<input {...register("cpf", { required: true, maxLength: 11})} placeholder="CPF"
				/>
				<input {...register("pis", {maxLength: 11})} placeholder="PIS"
				/>
				<select onChange={(e) => setCountry(e.target.value)}>
					<option value='-1'>Selecione o País</option>
					{ countries &&
						countries.map((country) => {
							return(
								<option key={country.id} value={country.id}>{country.name}</option>
							)
						})
					}	
				</select>
				<select onChange={(e) => setState(e.target.value)}>
					<option value=''>Selecione o Estado</option>
					{ states &&
						states.map((state) => {
							return(
								<option key={state.id} value={state.id}>{state.name}</option>

							)
						})
					}	
				</select>
				<input {...register("municipality", { required: true })} placeholder="Municipio"
				/>
				<input {...register("cep", { required: true, maxLength: 8 })} placeholder="CEP"
				/>
				<input {...register("street", { required: true })} placeholder="Rua"
				/>
				<input {...register("number", { required: true })} placeholder="Numero"
				/>
				<input {...register("complement", { required: false })} placeholder="Complemento"
				/>
				<input type="password" {...register("password", { required: true })} placeholder="Senha"
				/>
				<div>
					<button className='loginPageButton' type="submit">Registro</button>
				</div>
			</form>
		</div>
	);
}