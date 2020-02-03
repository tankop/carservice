<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by Tankó Péter
 */
?>
<?php

if (isset($client) && $client instanceof ClientModel) {
    ?>
    <table
            id="cars-<?= $client->getId(); ?>"
            class="cars-table"
            data-toggle="table"
            data-detail-view="true"
            data-detail-view-icon="false">
        <thead>
        <tr>
            <th><?= lang('default.00004'); ?></th>
            <th><?= lang('default.00005'); ?></th>
            <th><?= lang('default.00006'); ?></th>
            <th><?= lang('default.00007'); ?></th>
            <th><?= lang('default.00008'); ?></th>
            <th><?= lang('default.00009'); ?></th>
            <th><?= lang('default.00010'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php

        if (isset($cars) && !empty($cars)) {
            foreach ($cars as $car) {
                if ($car instanceof CarModel) {
                    ?>
                    <tr class="cars" data-client_id="<?= $client->getId(); ?>">
                        <td><?= $car->getCarId(); ?></td>
                        <td><?= $car->getType(); ?></td>
                        <td><?= $car->getRegistered(); ?></td>
                        <td><?= $car->getOwnbrand() == 1 ? lang('default.00011') : lang('default.00012'); ?></td>
                        <td><?= $car->getAccident(); ?></td>
                        <td><?= $car->getLastServiceEvent(); ?></td>
                        <td><?= $car->getLastServiceEventTime(); ?></td>
                    </tr>
                    <?php

                }
            }
        }
        ?>
        </tbody>
    </table>
    <?php

}
?>