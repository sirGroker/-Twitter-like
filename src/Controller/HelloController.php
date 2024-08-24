<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HelloController
{
    private $message = [
        "hello", 'hi', 'bye!',
    ];

    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        return new Response(implode(',', $this->message));
    }

    #[Route('/message/{id}', name:'app_message')]
    public function showMessage($id)
    {
        try {
            return new Response($this->message[$id]);
        }
        /*catch (ExceptionInterface $exception) {
            return new Response($exception->getMessage());
        };*/
        catch (\Exception $e) {
            return new Response($e->getMessage());
        }
    }
}