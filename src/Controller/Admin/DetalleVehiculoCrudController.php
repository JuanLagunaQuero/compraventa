<?php

namespace App\Controller\Admin;

use App\Entity\DetalleVehiculo;
use PhpParser\Node\Expr\Cast\Double;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DetalleVehiculoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DetalleVehiculo::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('marca'),
            TextField::new('modelo'),
            IntegerField::new('caballos'),
            IntegerField::new('kilometros'),
            MoneyField::new('precio')->setCurrency('EUR'),

        ];
    }
}
