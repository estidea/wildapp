<?php

namespace App\Controller;

use App\Entity\Category;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index()
    {
        return $this->render('main/index.html.twig', [
            'key' => 'index',
        ]);
    }

    /**
     * @Route("/{category_name}", name="category")
     */
    public function category($category_name)
    {
    	$category = $this->getDoctrine()
    		->getRepository(Category::class)
    		->findOneBy(['slug' => $category_name]);

    	$articles = $category->getArticles(); 

    	// Shows all courses of one category
        return $this->render('main/category.html.twig', [
            'category' => $category,
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/{category_name}/{slug}", name="article")
     */
    public function article($category_name, $slug)
    {

    	// Shows all courses of one category
        return $this->render('main/article.html.twig', [
            'category' => $category_name,
            'slug' => $slug
        ]);
    }


}
