<?php 
namespace AppBundle\Security;

use Symfony\Component\HttpFoundation\{Request,Response,RedirectResponse};
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\{UserInterface,UserProviderInterface};
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use Symfony\Component\Security\Core\Exception\{CustomUserMessageAuthenticationException,AuthenticationException};

/**
* Login Authentication for user login security
*/
class LoginAuthenticator extends AbstractFormLoginAuthenticator
{
  /**
   * @var \Symfony\Component\Routing\RouterInterface
   */
  private $router;

  /**
   * @var \Symfony\Component\Encoder\UserPasswordEncoderInterface
   */
  private $encoder;

  /**
   * Creates a new instance of Login Form Authenticator
   */
  public function __construct(RouterInterface $router, UserPasswordEncoderInterface $encoder) {
    $this->router = $router;
    $this->encoder = $encoder;
  }

  /**
   * {@inheritdoc}
   */
  public function getCredentials(Request $request)
  {
    //check if theres route login_check
    if ($request->getPathInfo() != '/login_check') {
      return;
    }

    $username = $request->request->get('username'); //get username input data

    //get username as last username used
    $request->getSession()->set(Security::LAST_USERNAME, $username);

    $password = $request->request->get('password'); //get password input data

    //return username and password
    return [
      'username' => $username,
      'password' => $password,
      ];
  }

  /**
   * fetch username in user tables (database) and return
   */
  public function getUser($credentials, UserProviderInterface $userProvider)
  {
      return $userProvider->loadUserByUsername($credentials['username']);
      throw new CustomUserMessageAuthenticationException('Invalid username or password. Please try again.');
  }

  /**
   *verify if user has password
   *if yes check authentication if valid
   */
  public function checkCredentials($credentials, UserInterface $user)
  {
    if ($this->encoder->isPasswordValid($user,$credentials['password'])) {
      return true;
    }
    throw new CustomUserMessageAuthenticationException('Invalid username or password. Please try again.');
  }

  /**
   * redirect page if authentication is success
   */
  public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
  {
    $url = $this->router->generate('homepage');

    return new RedirectResponse($url);
  }

  /**
   * redirect page if authentication fails
   */
  public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
  {
    $request->getSession()->set(Security::AUTHENTICATION_ERROR, $exception);

    $url = $this->router->generate('login');

    return new RedirectResponse($url);
  }

  /**
   * get login route
   */
  protected function getLoginurl()
  {
    return $this->router->generate('login');
  }

  /**
   * if login supports remember me
   */
  public function supportsRememberMe()
  {
    return false;
  }

  /**
   * start authentication
   */
  public function start(Request $request, AuthenticationException $authException = null)
  {
        $url = $this->getLoginUrl('login');

        return new RedirectResponse($url);
  }
}
?>