<?php

namespace Database\Seeders;

use App\Models\DrinkType;
use Illuminate\Database\Seeder;

class DrinkTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        new DrinkType([
            'name' => 'Tea',
            'description' => 'Tea is a popular beverage made by steeping dried leaves from the Camellia sinensis plant in hot water. It comes in various types, including black, green, white, and oolong, each offering distinct flavors and health benefits. Tea is enjoyed worldwide and is often consumed for its soothing properties, rich antioxidants, and versatile flavors, making it a comforting and cultural staple in many societies.'
        ])->save();

        new DrinkType([
            'name' => 'Coffee',
            'description' => 'Coffee is a brewed beverage made from roasted coffee beans, the seeds of the Coffea plant. Known for its rich flavor and stimulating effects due to caffeine, coffee is one of the most widely consumed drinks globally. It can be enjoyed in many forms, such as espresso, drip coffee, cappuccino, and latte, with variations depending on preparation methods and regional preferences. Coffee is often associated with energizing effects and is a favorite part of daily routines for many people.'
        ])->save();

        new DrinkType([
            'name' => 'Chai',
            'description' => 'Chai is a traditional spiced tea from India, made by brewing black tea leaves with a mixture of aromatic spices and herbs. The blend typically includes cardamom, cinnamon, ginger, cloves, and black pepper, along with milk and sweetener. The result is a rich, flavorful, and warming beverage that is both comforting and invigorating. Chai is enjoyed in various forms around the world, with many people adapting the spice mix to suit their tastes.'
        ])->save();

        new DrinkType([
            'name' => 'Hot Chocolate',
            'description' => 'Hot chocolate is a warm, comforting drink made by dissolving cocoa powder or melted chocolate in milk or water, often sweetened to taste. Its typically enjoyed as a cozy treat, especially in colder months. The rich, creamy texture and sweet, chocolatey flavor make it a favorite among both children and adults. Hot chocolate can be customized with toppings like whipped cream, marshmallows, or a sprinkle of cocoa powder, and can even be spiced with ingredients like cinnamon or chili for added flavour',
        ])->save();
    }
}
