import './styles.css';
import { useNavigate } from 'react-router-dom';
import UserService from '../../services/UserService';

export default function NavBar(props) {
	const navigate = useNavigate();
	const handleLogout = async () => {
		try {
			await UserService.logout();
			alert("Usuário foi deslogado com sucesso!");
			navigate('/');
			window.location.reload();
		} catch (e) {
			alert("Não foi possível deslogar")
		}
	}
	return(
		<div className="navBar">
			
			<ul>
				<li onClick={() => navigate('/')}>Home</li>
				{
					!props.user && 
					<li onClick={() => navigate('/login')}>Login</li>
				}
				{
					props.user && 
					<div>
						<li onClick={() => navigate('/edit')}>Edit</li>
						<li onClick={handleLogout}>Logout</li>
					</div>
				}
			</ul>
		</div>
	)
}