import NavBar from'../../components/NavBar';
import { useState, useEffect } from 'react';
import UserService from '../../services/UserService';

export default function Home() {
	const [user, setUser] = useState(undefined);
	const [loading, setLoading] = useState(false);

	useEffect(async() => {
        if(localStorage.getItem('token') != null){
			setLoading(true);
			await UserService.getUser().then(res => {
				if(res !== undefined){
					setUser(res);
					setLoading(false);
				}
				else{
					setUser(res);
					localStorage.removeItem('token');
				}});
		}
	}, []);
	return(
		<div>
		{
			loading &&
			<h1>Carregando...</h1>
		}
		{
			!loading &&
			<div>
			<NavBar
			user={user}
			/>
			{
				!user && 
				<h1>Olá Visitante</h1>
			}
			{
				user &&
				<h1>Olá {user.name}</h1>
			}
			</div>

		}

		</div>
	)
}