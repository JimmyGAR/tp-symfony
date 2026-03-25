<?php

namespace App\Repository;
use App\Model\Starship;
use Psr\Log\LoggerInterface;

class StarshipRepository
{
    public function __construct(private LoggerInterface $logger)
    {

    }

    public function findAll()
    {
        $this->logger->info('collection de vaisseaux spatiaux récupérée');
        $starships = [
            new Starship(
                1,
                'USS LeafyCruiser (NCC-0001)',
                'Garden',
                'Jean-Luc Pickles',
                'taken over by Q',
            ),
            new Starship(
                3,
                'USS Wanderlust (NCC-2024-W)',
                'Delta Tourist',
                'Kathryn Journeyway',
                'under construction',
            ),
            new Starship(
                2,
                'USS Espresso (NCC-1234-C)',
                'Latte',
                'James T. Quick!',
                'repaired',
            ),
        ];

        return $starships;
    }

    public function find(int $id): ?Starship
    {
        $starships = $this->findAll();
        foreach ($starships as $starship) {
            if ($starship->getId() == $id) {
                return $starship;
            }
        }

        return null;
    }
}