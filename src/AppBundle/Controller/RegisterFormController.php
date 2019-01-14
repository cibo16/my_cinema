<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use Symfony\Component\Form\Forms;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Form\UserType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class RegisterFormController extends Controller
{
    /**
     * @Route("/registerForm")
     */
    public function registerFormAction(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        $formRegister=$this->createForm(UserType::class, $user);
            $formRegister->handleRequest($request);

            if($formRegister->isSubmitted() && $formRegister->isValid()){

                //$encoder = $this->get('security.password_encoder');
                $password = $encoder->encodePassword($user, $user->getPassword());
                $user->setPassword($password);
                //$user->setRoles('ROLE_USER');
                $manager->persist($user);
                $manager->flush();
                return $this ->redirectToRoute('login');
            }
            return $this->render('@App/RegisterForm/register_form.html.twig', 
                            ['formRegister'=>$formRegister->createView()]);
    }
    /**
     * @Route("/login", name="login") 
     */
    public function login(Request $request, AuthenticationUtils $authUtils){
        // get the login error if there is one
        $error = $authUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authUtils->getLastUsername();

        return $this->render('@App/RegisterForm/login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }
    /**
     * @Route("/logout", name="logout") 
     */
    public function logout (){}
}
