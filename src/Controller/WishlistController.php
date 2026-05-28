<?php

namespace App\Controller;

use App\Entity\Wishlist;
use App\Repository\WishlistRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class WishlistController extends AbstractController
{
    #[Route('/wishlist', name: 'app_wishlist')]
    public function index(
        WishlistRepository $wishlistRepository
    ): Response {

        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $wishlist = $wishlistRepository->findBy([
            'user' => $this->getUser()
        ]);

        return $this->render('wishlist/index.html.twig', [
            'wishlist' => $wishlist
        ]);
    }

    #[Route('/wishlist/toggle/{id}', name: 'app_wishlist_toggle')]
    public function toggle(
        string $id,
        WishlistRepository $wishlistRepository,
        EntityManagerInterface $entityManager
    ): Response {

        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $user = $this->getUser();

        $existing = $wishlistRepository->findOneBy([
            'user' => $user,
            'destinationSlug' => $id
        ]);

        if ($existing) {
            $entityManager->remove($existing);
        } else {
            $wishlist = new Wishlist();
            $wishlist->setUser($user);
            $wishlist->setDestinationSlug($id);

            $entityManager->persist($wishlist);
        }

        $entityManager->flush();

        return $this->redirectToRoute('app_destinations');
    }
}
