<?php
namespace App\Repositories\Contracts;

interface CategoryRepositoryInterface
{
    public function getCategoriesByTenantuuid(string $uuid);
    public function getCategoriesByTenantId(int $idTenant);

}
