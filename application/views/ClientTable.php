<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by Tankó Péter
 */
?>
<table
    id="client-table"
    data-toggle="table"
    data-detail-view="true"
    data-detail-view-icon="false"
    data-pagination="true">
    <thead>
    <tr>
        <th><?= lang('default.00001'); ?></th>
        <th><?= lang('default.00002'); ?></th>
        <th><?= lang('default.00003'); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php

    if (isset($clients) && !empty($clients)) {
        foreach ($clients as $i => $client) {
            if ($client instanceof ClientModel) {
                ?>
                <tr class="client">
                    <td><?= $client->getId(); ?></td>
                    <td><?= $client->getName(); ?></td>
                    <td><?= $client->getIdcard(); ?></td>
                </tr>
                <?php

            }
        }
    }
    ?>
    </tbody>
</table>