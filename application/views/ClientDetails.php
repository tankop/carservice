<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by Tankó Péter
 */
if (isset($client) && !empty($client)) {
    if (count($client) == 1) {
        $client = $client[0];
        if ($client instanceof ClientModel) {
            ?>
            <div class="col-md-8 mx-auto">
                <p><?= lang('default.00001') . ': ' . $client->getId(); ?></p>
                <p><?= lang('default.00017') . ': ' . $client->getName(); ?></p>
                <p><?= lang('default.00018') . ': ' . $client->getIdcard(); ?></p>
                <p><?= lang('default.00027') . ': ' . $client->getCountCars(); ?></p>
                <p><?= lang('default.00028') . ': ' . $client->getCountService(); ?></p>
                <button type="button" class="btn btn-success" onclick="carservice.getClientData()"><?=lang('default.00029');?></button>
            </div>
            <?php

        }
    }
}
