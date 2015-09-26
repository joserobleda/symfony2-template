<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
	/**
     * @Route("/", name="index")
     */
    public function indexAction(Request $request)
    {
        $command = new \AppName\Domain\User\RegisterUserCommand();
        $this->get('command_bus')->handle($command);

        $redis = $this->container->get('snc_redis.default');
        $val = $redis->incr('foo:bar');

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }
}
