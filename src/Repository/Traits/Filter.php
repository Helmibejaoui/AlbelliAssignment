<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Repository\Traits;

use Doctrine\ORM\QueryBuilder;

trait Filter
{
    public function filterQueryBuilder(QueryBuilder $queryBuilder, array $filterMap, ?array $filters = []): QueryBuilder
    {
        if (!empty($filters)) {
            foreach ($filterMap as $fmKey => $fmOptions) {
                if (isset($filters[$fmOptions['alias'] ?? $fmKey]) && '' !== ($filters[$fmOptions['alias'] ?? $fmKey])) {
                    $queryBuilder->andWhere($fmKey.' '.$fmOptions['operator'].' '.('IN' === $fmOptions['operator'] ? '(' : '').':'.$fmOptions['placeholder'].''.('IN' === $fmOptions['operator'] ? ')' : ''));
                    $queryBuilder->setParameter($fmOptions['placeholder'], $filters[$fmOptions['alias'] ?? $fmKey]);
                }
            }
        }

        return $queryBuilder;
    }
}
