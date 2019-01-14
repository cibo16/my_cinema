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

class AdminController extends Controller
{
    /**
     * @Route("admin/mainAdmin", name="admin")
     */
    public function mainAdminAction()
    {
        return $this->render('AppBundle:Admin:main_admin.html.twig', array(
            // ...
        ));
    }
    /**
     * @Route("/admin/addUser", name="addUser")
     */
    public function addUserAction(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        $addUser=$this->createForm(UserType::class, $user);
            $addUser->handleRequest($request);

            if($addUser->isSubmitted() && $addUser->isValid()){

                //$encoder = $this->get('security.password_encoder');
                $password = $encoder->encodePassword($user, $user->getPassword());
                $user->setPassword($password); 
                $manager->persist($user);
                $manager->flush();
                return $this ->redirectToRoute('admin');
            }
            return $this->render('@App/Admin/addUser.html.twig', 
                            ['addUser'=>$addUser->createView()]);
    }

}
