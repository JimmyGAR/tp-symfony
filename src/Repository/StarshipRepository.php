<?php

namespace App\Repository;
use App\Model\Starship;
use Psr\Log\LoggerInterface;
use App\Model\StarshipStatusEnum;

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
                StarshipStatusEnum::IN_PROGRESS,
            ),
            new Starship(
                3,
                'USS Wanderlust (NCC-2024-W)',
                'Delta Tourist',
                'Kathryn Journeyway',
                StarshipStatusEnum::COMPLETED,
            ),
            new Starship(
                2,
                'USS Espresso (NCC-1234-C)',
                'Latte',
                'James T. Quick!',
                StarshipStatusEnum::WAITING,
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