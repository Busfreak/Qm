<?php

namespace Kanboard\Plugin\Qm\Schema;

const VERSION = 1;

function version_1($pdo)
{
    $pdo->exec('CREATE TABLE IF NOT EXISTS qm_tasks (
        `id` INT NOT NULL AUTO_INCREMENT,
        `task_id` INT NOT NULL,
        `rating` INT NOT NULL,
        `date` VARCHAR(10) NOT NULL,
        `comment` TEXT,
        FOREIGN KEY(task_id) REFERENCES tasks(id) ON DELETE CASCADE,
        PRIMARY KEY(id)
    ) ENGINE=InnoDB CHARSET=utf8');
}
