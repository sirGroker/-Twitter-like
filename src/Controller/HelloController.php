<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HelloController extends AbstractController
{
    private $message = [
        "hello", 'hi', 'bye!',
    ];

    #[Route('/{limit<\d+>?3}', name: 'app_index')]
    public function index(int $limit): Response
    {
        return  $this->render('/hello/index.html.twig', [
            'messages' =>  $this->message,
            'limit' => $limit
        ]);
//            new Response(
//            implode(',', array_slice($this->message, 0, $limit))
//        );
    }

    #[Route('/message/{id<\d+>}', name:'app_message', methods: ['GET'])]
    public function showMessage($id): Response
    {
        try {
            return $this->render('/hello/show_message.html.twig', ['message' => $this->message[$id]]);
//            return new Response($this->message[$id]);
        }
        /*catch (ExceptionInterface $exception) {
            return new Response($exception->getMessage());
        };*/
        catch (\Exception $e) {
            return new Response($e->getMessage());
        }
    }
}