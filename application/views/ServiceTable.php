<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by Tankó Péter
 */
?>
<?php

if (isset($car) && $car instanceof CarModel) {
    ?>
    <table
            id="service-<?= isset($client_id) ? $client_id : ''; ?>"
            class="services-table"
            data-toggle="table">
        <thead>
        <tr>
            <th><?= lang('default.00013'); ?></th>
            <th><?= lang('default.00014'); ?></th>
            <th><?= lang('default.00015'); ?></th>
            <th><?= lang('default.00016'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php

        if (isset($services) && !empty($services)) {
            foreach ($services as $service) {
                if ($service instanceof ServiceModel) {
                    ?>
                    <tr class="services">
                        <td><?= $service->getLognumber(); ?></td>
                        <td><?= $service->getEvent(); ?></td>
                        <td><?= $service->getEvent() === 'regisztralt' ? $car->getRegistered() : $service->getEventtime(); ?></td>
                        <td><?= $service->getDocumentId(); ?></td>
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