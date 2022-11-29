<?php

namespace App\Controller\Admin;

use App\Entity\Movimiento;
use App\Entity\TipoMovimiento;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MovimientoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Movimiento::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('tipo')->renderAsNativeWidget(),
            AssociationField::new('Oferta')->renderAsNativeWidget(),
        ];
    }
}
