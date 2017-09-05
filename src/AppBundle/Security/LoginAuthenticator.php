<?php 
namespace AppBundle\Security;

use Symfony\Component\HttpFoundation\{Request,Response,RedirectResponse};
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Csrf\{CsrfToken,CsrfTokenManagerInterface};
use Symfony\Component\Security\Core\User\{UserInterface,UserProviderInterface};
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use Symfony\Component\Security\Core\Exception\{AuthenticationException,InvalidCsrfTokenException,UsernameNotFoundException};
/**
* 
*/
class LoginAuthenticator extends AbstractFormLoginAuthenticator
{
	private $router;
	private $csrTokenManager;
	
	function __construct(RouterInterface $router,CsrfTokenManagerInterface $csrfTokenManager)
	{
		$this->router = $router;
		$this->csrfTokenManager = $csrfTokenManager;
	}

	public function getCredentials(Request $request){
		$csrfToken = $request->request->get('_csrf_token');

		if (false === $this->csrfTokenManager->isTokenValid(new CsrfToken('authenticate',$csrfToken))){
			throw new InvalidCsrfTokenException('Invalid CSRF token.');
		}
	}

	public function getUser($credentials, UserProviderInterface $userProvider){
		$username = $credentials['username'];

		try{
			return $userProvider->loadUserByUsername($username);
		} catch (UsernameNotFoundException $e){
			echo $e;
		}
	}

	public function checkCredentials($credentials, UserInterface $user){

	}

	public function onAuthenticationSucess(Request $request, TokenInterface $token, $providerKey){
		$url = $this->router->generate('home');
		return new RedirectResponse($url);
	}

	public function onAuthenticationFailure(Request $request, AuthenticationException $exception){
		$request->getSession()->set(Security::AUTHENTICATION_ERROR,$exception);
		$url = $this->router->generate('login');
		return new RedirectResponse($url);
	}

	public function start(Request $request, AuthenticationException $authexception = null){
		$url = $this->router->generate('login');
		return new RedirectResponse($url);
	}

	protected function getLoginUrl(){
		return $this->router->generate('login');
	}

	public function supportsRememberMe(){
		return false;
	}
}
?>