<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use app\models\Name;
use app\models\City;
use app\models\Phone;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class SeedController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex()
    {
        $cities = [
            ['name' => 'Киев'],
            ['name' => 'Париж'],
            ['name' => 'Минск'],
            ['name' => 'Берлин'],
        ];
        $names = [
            ['fio' => 'Олег Поднебесный', 'city_id' => 1, 'country_id' => 0],
            ['fio' => 'Сергей Петренко', 'city_id' => 2, 'country_id' => 0],
            ['fio' => 'Макар Сидоренко', 'city_id' => 3, 'country_id' => 0],
            ['fio' => 'Петр Иванов', 'city_id' => 4, 'country_id' => 0],
            ['fio' => 'Максим Абраменко', 'city_id' => 3, 'country_id' => 0],
            ['fio' => 'Александр Вишня', 'city_id' => 2, 'country_id' => 0],
        ];
        $phones = [
            ['name_id' => 1, 'number' => '5454545488'],
            ['name_id' => 1, 'number' => '6845487484'],
            ['name_id' => 1, 'number' => '5545454565'],
            ['name_id' => 2, 'number' => '9445445454'],
            ['name_id' => 2, 'number' => '6255415452'],
            ['name_id' => 3, 'number' => '8745425454'],
            ['name_id' => 4, 'number' => '6845444595'],
            ['name_id' => 5, 'number' => '9844547454'],
            ['name_id' => 5, 'number' => '8545458455'],
            ['name_id' => 6, 'number' => '4484554521'],
            ['name_id' => 6, 'number' => '8974545554'],
        ];
        /*foreach ($cities as $city) {
            $newCity = new City();
            $newCity->attributes = $city;
            $newCity->save();
        }
        echo "Cities loaded! \n";*/
        foreach ($names as $name) {
            $newName = new Name();
            $city = City::findOne([
                'name' => $cities[$name['city_id']-1]['name'],
            ]);
            if ($city !== NULL) {
                echo "Find ".$city->name."\n";
                $name['city_id'] = $city->id;
                $name['country_id'] = $city->country_id;
                $newName->attributes = $name;
                $newName->save();
            }
        }
        echo "Names loaded! \n";
        foreach ($phones as $phone) {
            $newPhone = new Phone();
            $name = Name::findOne([
                'fio' => $names[$phone['name_id']-1]['fio'],
            ]);
            if ($name !== NULL) {
                echo "Find ".$name->fio."\n";
                $phone['name_id'] = $name->id;
                $newPhone->attributes = $phone;
                $newPhone->save();
            }
        }
        echo "Phones loaded! \n";
        echo "===  Done  === \n";
    }
}
