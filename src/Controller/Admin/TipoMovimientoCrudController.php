<?php

namespace App\Controller\Admin;

use App\Entity\TipoMovimiento;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TipoMovimientoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TipoMovimiento::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('descripcion'),
        ];
    }
}
