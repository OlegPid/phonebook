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
            ['name' => 'Kiev'],
            ['name' => 'Kropivnitskij'],
            ['name' => 'Kharkov'],
            ['name' => 'Dnepr'],
        ];
        $names = [
            ['fio' => 'Pid O.A.', 'city_id' => 1],
            ['fio' => 'Retly J.F.', 'city_id' => 2],
            ['fio' => 'Harny L.P.', 'city_id' => 3],
            ['fio' => 'Larry K.L.', 'city_id' => 4],
            ['fio' => 'Guffy M.G.', 'city_id' => 3],
            ['fio' => 'Dolly B.F.', 'city_id' => 2],
        ];
        $phones = [
            ['name_id' => 1, 'number' => '54-54-5454'],
            ['name_id' => 1, 'number' => '684-54-874'],
            ['name_id' => 1, 'number' => '554-5454-5'],
            ['name_id' => 2, 'number' => '94-454-454'],
            ['name_id' => 2, 'number' => '625541-545'],
            ['name_id' => 3, 'number' => '874-542-54'],
            ['name_id' => 4, 'number' => '684-544-45'],
            ['name_id' => 5, 'number' => '984-4547-4'],
            ['name_id' => 5, 'number' => '85454-5845'],
            ['name_id' => 6, 'number' => '44-845-545'],
            ['name_id' => 6, 'number' => '8974-545-5'],
        ];
        foreach ($cities as $city) {
            $newCity = new City();
            $newCity->attributes = $city;
            $newCity->save();
        }
        echo "Cities loaded! \n";
        foreach ($names as $name) {
            $newName = new Name();
            $newName->attributes = $name;
            $newName->save();
        }
        echo "Names loaded! \n";
        foreach ($phones as $phone) {
            $newPhone = new Phone();
            $newPhone->attributes = $phone;
            $newPhone->save();
        }
        echo "Phones loaded! \n";
        echo "===  Done  === \n";
    }
}
