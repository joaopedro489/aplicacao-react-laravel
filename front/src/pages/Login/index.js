import NavBar from'../../components/NavBar';
import UserService from '../../services/UserService';
import { useNavigate } from 'react-router-dom';
import { useForm } from 'react-hook-form';

export default function Login(){
	const {register, handleSubmit, errors} = useForm();
	const navigate = useNavigate();
	const onSubmit = async data => {
        try{
            const response = await UserService.login(data);
			console.log(response);
            localStorage.setItem('token', response.token);
            navigate('/');
        }catch(err){
            alert('Erro, não foi possível logar.');
        }
    };


	return(
		<div className="loginPage">
			<NavBar></NavBar>
			<form className='loginForm' onSubmit={handleSubmit(onSubmit)}>
				<input {...register("login")} placeholder="Login"
				/>

				<input  {...register("password")} type="password" placeholder="Senha"
				/>
				<div>
					<button className='loginPageButton' onClick={() => navigate('/register')} type='button'>
						Registro
					</button>
					<button className='loginPageButton' type="submit">Login</button>
				</div>
			</form>

		</div>
	)
}