<?php

class Test
{
    public function getUniqueIdFromTwoIds(int $id1 , int $id2): int
    {
        if ($id2 < $id1) {
            [$id1, $id2] = [$id2, $id1];
        }

        $firstIdLength = strlen((string) $id1);

        return (int) ($id1. $id2. $firstIdLength);
    }


    public function getTwoIdsFromUniqueId(int $id): array
    {
        $firstIdLength = (int) substr($id, -1);
        $secondIdOffset = $firstIdLength;

        $firstId = (int) substr($id,  0, $firstIdLength);
        $secondId = (int) substr($id,  $secondIdOffset, -1);

        return [
            'firstId'  => $firstId,
            'secondId' => $secondId
        ];
    }
}


$id1 = 123456789;
$id2 = 22;

$id = (new Test())->getUniqueIdFromTwoIds($id1, $id2);
$ids = (new Test())->getTwoIdsFromUniqueId($id);

var_dump($id);
var_dump($ids);