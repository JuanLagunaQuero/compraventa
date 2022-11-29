<?php

namespace App\Controller\Admin;

use App\Entity\Oferta;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OfertaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Oferta::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('Usuario')->renderAsNativeWidget(),
            AssociationField::new('Vehiculo')->renderAsNativeWidget(),
            MoneyField::new('cantidad')->setCurrency('EUR'),
        ];
    }
}
