<?php

namespace App\Controller\Admin;

use App\Entity\Vehiculo;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class VehiculoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vehiculo::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('matricula'),
            AssociationField::new('estado')->renderAsNativeWidget(),
            AssociationField::new('detalle')->renderAsNativeWidget(),
        ];
    }
}
