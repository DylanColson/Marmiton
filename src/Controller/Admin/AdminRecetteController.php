<?php 

namespace App\Controller\Admin;
use App\Entity\Recette;
use App\Form\RecetteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\RecetteRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\BrowserKit\Request as BrowserKitRequest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class AdminRecetteController extends AbstractController{

    private EntityManagerInterface $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/admin", name="admin_index")
     */
    public function index(RecetteRepository $recetteRepository): Response{
        
        $recettes = $recetteRepository->findAll();
        return $this->render('admin/index.html.twig', [
            'recettes' => $recettes,
            'menu' => 'admin'
        ]);
    }

    /**
     * @Route("/admin/create", name="admin_create")
     */

    public function create(Request $request){

        $recette = new Recette();
        $form = $this->createForm(RecetteType::class, $recette);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->em->persist($recette);
            $this->em->flush();
            $this->addFlash('success', "Votre recette a bien été enregistrer");
            return $this->redirectToRoute('admin_index', [], 301);
        }

        return $this->render('admin/create.html.twig', [
            'formRecette' => $form->createView(),
            'menu' => 'admin'
        ]);
    }

    /**
    * @Route("/admin{id}", name="admin_edit", methods="GET|POST")
    */    
    public function edit(Request $request, Recette $recette){
        
        $form = $this->createForm(RecetteType::class, $recette);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $this->em->flush();
            $this->addFlash('success', 'La recette a été modifié ');
            return $this->redirectToRoute('admin_index', [], 301);

        }
        return $this->render('admin/request/edit.html.twig', [
            'recette' => $recette,
            'form' => $form->createView()
        ]);

    }
    /**
     * @Route("/admin{id}", name="admin_delete", methods="DELETE")
     */
    public function delete(Recette $recette, Request $request){
        if($this->isCsrfTokenValid( 'token_id', $request->get('_token'))){

            $this->em->remove($recette);
            $this->em->flush();
        }
        return $this->redirectToRoute('admin_index', [], 301);
    }
}

?>