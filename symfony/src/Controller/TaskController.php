<?php
// php bin/console make:controller TaskController
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Task;

class TaskController extends AbstractController
{
    #[Route('/task', name: 'app_task')]
    public function index(): Response
    {
        //Prueba de entidades y relaciones
        $em = $this->getDoctrine()->getManager();
        $taks_repo=$this->getDoctrine()->getRepository(Task::class);

        $tasks = $taks_repo->findAll();

        foreach ($tasks as $task) {
            echo $task->getTitle()."<br/>";
        }
        return $this->render('task/index.html.twig', [
            'controller_name' => 'TaskController',
        ]);
    }
}
