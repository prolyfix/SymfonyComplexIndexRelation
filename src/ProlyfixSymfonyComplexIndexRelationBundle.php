<?php
namespace Prolyfix\SymfonyComplexIndexRelationBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ProlyfixSymfonyComplexIndexRelationBundle extends Bundle
{
      public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
