<?php

namespace lepiaf\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     * @param Request $request
     *
     * @return array
     */
    public function indexAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/admin")
     * @Template()
     * @param Request $request
     *
     * @return array
     */
    public function adminAction(Request $request)
    {
        return [];
    }
}
