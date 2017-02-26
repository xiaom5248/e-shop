<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\Type\ContactType;
use AppBundle\Entity\Contact;

class ContactController extends Controller
{
    /**
     * @Route("/contact", name="contact")
     */
    public function newAction(Request $request)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        return $this->render('contact/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
