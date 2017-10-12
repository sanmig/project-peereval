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
* 
*/
class LoginAuthenticator extends AbstractFormLoginAuthenticator
{
  /**
   * @var \Symfony\Component\Routing\RouterInterface
   */
  private $router;
  private $encoder;

  /**
   * Creates a new instance of FormAuthenticator
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
    if ($request->getPathInfo() != '/login_check') {
      return;
    }

    $username = $request->request->get('username');
    $request->getSession()->set(Security::LAST_USERNAME, $username);
    $password = $request->request->get('password');

    return [
      'username' => $username,
      'password' => $password,
      ];
  }

  /**
   * {@inheritdoc}
   */
  public function getUser($credentials, UserProviderInterface $userProvider)
  {
    $username = $credentials['username'];
    try {
      return $userProvider->loadUserByUsername($username);
    } catch (Exception $e){
      throw new CustomUserMessageAuthenticationException('Invalid username or password. Please try again.');
    }
  }

  /**
   * {@inheritdoc}
   */
  public function checkCredentials($credentials, UserInterface $user)
  {
    $plainPassword = $credentials['password'];
    if ($this->encoder->isPasswordValid($user,$plainPassword)) {
      return true;
    }
    throw new CustomUserMessageAuthenticationException('Invalid username or password. Please try again.');
  }

  /**
   * {@inheritdoc}
   */
  public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
  {
    $url = $this->router->generate('homepage');

    return new RedirectResponse($url);
  }

  /**
   * {@inheritdoc}
   */
  public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
  {
    $request->getSession()->set(Security::AUTHENTICATION_ERROR, $exception);

    $url = $this->router->generate('login');

    return new RedirectResponse($url);
  }

  /**
   * {@inheritdoc}
   */
  protected function getLoginurl()
  {
    return $this->router->generate('login');
  }

  /**
   * {@inheritdoc}
   */
  public function supportsRememberMe()
  {
    return false;
  }

  public function start(Request $request, AuthenticationException $authException = null)
  {
        $url = $this->getLoginUrl('login');

        return new RedirectResponse($url);
  }
}
?>